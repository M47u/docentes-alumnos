<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Mostrar el perfil del usuario autenticado.
     */
    public function show(): View
    {
        $user = Auth::user();
        \Illuminate\Support\Facades\Gate::authorize('view', $user);
        return view('profile.show', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
        \Illuminate\Support\Facades\Gate::authorize('update', $user);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = \App\Models\User::find(Auth::id());
        \Illuminate\Support\Facades\Gate::authorize('update', $user);
        $data = $request->validated();

        // Manejo de foto de perfil
        if ($request->hasFile('photo_path')) {
            $file = $request->file('photo_path');
            $path = $file->store('profile-photos', 'public');
            $data['photo_path'] = '/storage/' . $path;
        }

        $user->update($data);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
