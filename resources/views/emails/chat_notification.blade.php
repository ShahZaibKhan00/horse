<!DOCTYPE html>
<html>
<head>
    <title>New Chat Message</title>
</head>
<body>
    <h1>Hello {{ $receiver->name }},</h1>
    <p>You have received a new message from {{ Auth::user()->name }}:</p>
    <p style="background: #f4f4f4; padding: 15px; border-left: 4px solid #b69455;">
        "{{ $chatMessage->message }}"
    </p>
    <p>
        <a href="{{ route('chat', ['conversation_id' => $chatMessage->conversation_id]) }}" style="background: #b69455; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Reply to Message
        </a>
    </p>
</body>
</html>
