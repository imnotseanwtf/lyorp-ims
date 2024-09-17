<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'organization');
        })->paginate();
    

        return view('users.index', compact('users'));
    }
}
