<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Conversation;
use App\Models\General;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\ChatMessageMail;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usertype = Auth::user()->usertype;
        $username = Auth::user()->name;
        $userprofile = Auth::user()->Profile_img;
        $logoquery = General::where('id', 1)->first();
        $Logo = $logoquery->G_logo;
        $Web_name = $logoquery->G_name;
        $categories = Category::all();
        
        $conversations = Conversation::with(['sender', 'receiver', 'messages', 'horse', 'realestate', 'service'])
            ->where('sender_id', Auth::id())
            ->orWhere('receiver_id', Auth::id())
            ->orderBy('updated_at', 'desc')
            ->get();
        // dd($conversations);
        $activeConversationId = $request->query('conversation_id');
        $activeConversation = null;
        if ($activeConversationId) {
            $activeConversation = Conversation::with(['sender', 'receiver', 'messages'])
                ->where('id', $activeConversationId)
                ->where(function($q) {
                    $q->where('sender_id', Auth::id())
                      ->orWhere('receiver_id', Auth::id());
                })
                ->first();
        }

        return view('front.chat', compact('username', 'usertype', 'userprofile', 'Logo', 'Web_name', 'categories', 'activeConversation', 'conversations'));
    }

    public function startConversation(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'product_id' => 'required',
            'product_type' => 'required|string',
        ]);

        if ($request->receiver_id == Auth::id()) {
            return back()->with('error', 'You cannot chat with yourself.');
        }

        $conversation = Conversation::where(function($query) use ($request) {
                $query->where(function($q) use ($request) {
                    $q->where('sender_id', Auth::id())
                      ->where('receiver_id', $request->receiver_id);
                })
                ->orWhere(function($q) use ($request) {
                    $q->where('sender_id', $request->receiver_id)
                      ->where('receiver_id', Auth::id());
                });
            })
            ->where('product_id', $request->product_id)
            ->where('product_type', $request->product_type)
            ->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $request->receiver_id,
                'product_id' => $request->product_id,
                'product_type' => $request->product_type,
            ]);
        }

        return redirect()->route('chat', ['conversation_id' => $conversation->id]);
    }

    public function getConversations()
    {
        $userId = Auth::id();
        $conversations = Conversation::with(['sender', 'receiver', 'messages' => function($q) {
                $q->latest()->limit(1);
            }])
            ->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get()
            ->map(function($conversation) use ($userId) {
                $otherUser = $conversation->sender_id == $userId ? $conversation->receiver : $conversation->sender;
                $lastMessage = $conversation->messages->first();
                
                return [
                    'id' => $conversation->id,
                    'other_user_name' => $otherUser->name,
                    'other_user_profile' => $otherUser->Profile_img ?? 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . $otherUser->id,
                    'last_message' => $lastMessage ? $lastMessage->message : 'No messages yet',
                    'last_message_time' => $lastMessage ? $lastMessage->created_at->diffForHumans() : '',
                    'unread_count' => $conversation->messages()->where('user_id', '!=', $userId)->where('is_read', false)->count(),
                ];
            });

        return response()->json($conversations);
    }

    public function getMessages($id)
    {
        $conversation = Conversation::where('id', $id)
            ->where(function($q) {
                $q->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());
            })
            ->firstOrFail();

        // Mark messages as read
        Message::where('conversation_id', $id)
            ->where('user_id', '!=', Auth::id())
            ->update(['is_read' => true]);

        $messages = $conversation->messages()->with('user')->orderBy('created_at', 'asc')->get();

        return response()->json([
            'messages' => $messages,
            'current_user_id' => Auth::id()
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'message' => 'required|string',
        ]);

        $conversation = Conversation::findOrFail($request->conversation_id);
        
        $message = Message::create([
            'conversation_id' => $request->conversation_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        // Update conversation's updated_at timestamp
        $conversation->touch();

        // Send Email Notification in background (non-blocking)
        try {
            $sender = Auth::user();
            $receiver = $conversation->sender_id == $sender->id ? $conversation->receiver : $conversation->sender;
            $senderName = $sender->name;
            $msgCopy = $message;
            
            if ($receiver && $receiver->email) {
                $receiverEmail = $receiver->email;
                dispatch(function() use ($msgCopy, $receiver, $receiverEmail, $senderName) {
                    Mail::to($receiverEmail)->send(new ChatMessageMail($msgCopy, $receiver, $senderName));
                })->afterResponse();
            }
        } catch (\Throwable $e) {
            \Log::error('Chat Email Notification Failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => $message->load('user')
        ]);
    }
}
