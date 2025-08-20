<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        // Solo admin puede ver el listado
        Gate::authorize('viewAny', User::class);
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        Gate::authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }
}
