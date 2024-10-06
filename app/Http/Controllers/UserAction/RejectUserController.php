<?php

namespace App\Http\Controllers\UserAction;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RejectUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): RedirectResponse
    {
        $user->update(
            [
                'status' => false
            ]
        );

        alert()->success('User Activated Successfully!');

        return redirect()->route('users.index');
    }
}
