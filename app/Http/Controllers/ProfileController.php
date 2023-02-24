<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Formulario;
use App\Models\User;

class ProfileController extends Controller
{

    public function dashboard()
    {
        $formulario = Formulario::where('user_id', Auth::user()->id)->first();

        return view('dashboard', ['formulario' => $formulario]);
    }

    public function index()
    {
        $users = User::where('id', '<>', 1)->get();

        return view('admin.index', ['users' => $users]);
    }

    public function desativar($id)
    {
        $user = User::find($id);
        $user->deactivate();

        return Redirect::route('index');
    }

    public function ativar($id)
    {
        $user = User::find($id);
        $user->activate();

        return Redirect::route('index');
    }

    public function inactive()
    {
        session()->invalidate();

        return view('inactive');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
