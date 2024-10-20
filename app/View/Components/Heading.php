<?php

namespace App\View\Components;

use App\Models\Account;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    public function render(): View
    {
        $user = User::whereEmail('johndoe@example.com')->first();
        $account = $user->account;

        return view('components.heading', compact('account', 'user'));
    }
}
