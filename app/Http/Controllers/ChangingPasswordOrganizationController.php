<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangingPasswordOrganizationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
        ]);

        $user->update(
            [
                'password' =>  Hash::make($request->password)
            ]
        );

        alert()->success('Password Changed Successfully!');

        return redirect()->route('users.index');
    }
}
