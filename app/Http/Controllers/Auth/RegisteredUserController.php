<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Controllers\EstadoController;
use App\Models\Estado;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function precreate(): View
    {
        return view('auth.preregister');
    }

    public function createMed(): View
    {
        $estados=Estado::all();
        return view('auth.registerMed', ['estados' => $estados]);
    }

    public function createPac(): View
    {   $estados=Estado::all();
        return view('auth.registerPac', ['estados' => $estados]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeMed(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'max:255', 'unique:'.User::class],
            'crm' => ['required', 'string', 'max:255'],
            'atuacao' => ['string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'tel' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'crm' => $request->crm,
            'atuacao' => $request->atuacao,
            'state' => $request->state,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
            'role' => 'medico'
        ]);

       // $user->assignRole('medico');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storePac(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'max:255', 'unique:'.User::class],
            'date' => ['max:255'],
            'state' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'tel' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'date' => $request->date,
            'state' => $request->state,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
             'role' => 'paciente',
        ]);

        //$user->assignRole('paciente');        

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
