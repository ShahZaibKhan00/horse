<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CreditModal extends Component
{
    public $credits;
    public $remainingToken;
    public $totalCredits;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->credits = DB::table('user_credits')
            ->where('user_id', Auth::id())
            ->first() ?? (object)['credits_balance' => 0];

        $plans = DB::table('subscriptions')
            ->join('subscribed', 'subscriptions.id', '=', 'subscribed.subscription_id')
            ->where('subscriptions.useer_id', Auth::id())
            ->select('subscriptions.*', 'subscribed.*')
            ->orderBy('subscriptions.created_at', 'desc')
            ->get();
            $this->remainingToken = $plans[0]->remaining_token ?? 0;
            $this->totalCredits = $plans[0]->package_usage ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.credit-modal');
    }
}
