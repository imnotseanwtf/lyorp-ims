<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    public function show(User $user): JsonResponse | View
    {
        return response()->json($user);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        alert()->success('Organization Deleted Sucessfully!');

        return redirect()->route('users.index');
    }
}
