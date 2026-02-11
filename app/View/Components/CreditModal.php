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
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->credits = DB::table('user_credits')
            ->where('user_id', Auth::id())
            ->first() ?? (object)['credits_balance' => 0];

            // dd($this->credits);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.credit-modal');
    }
}
