<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Formulario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class FormularioController extends Controller
{
    public function show()
    {
        $formulario = Formulario::where('user_id',Auth::user()->id)->first(); 
        return view('form.show', ['formulario' => $formulario]);
    }

    public function list()
    {
        $formularios = Formulario::where('user_id',Auth::user()->id)->get();
        return view('form.listform', ['formularios' => $formularios]);
    }
   
    public function formularioMed()
    {   
        return view('form.formulario');
    }

    public function formularioPac(User $user)
    {   
        $user = User::get();
        return view('form.formularioPac', ['user' => $user]);
    }

    public function storeMed(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.Formulario::class],
            'mom_name' => ['required', 'string', 'max:255', 'unique:'.Formulario::class],
            'birthdate' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
            'comorbidades' => ['required', 'string', 'max:255'],
            'anamnese' => ['required', 'string', 'max:255'],
        ]);

        $formulario = Formulario::create([
            'name' => $request->name,
            'mom_name' => $request->mom_name,
            'birthdate' => $request->birthdate,
            'date' => $request->date,
            'comorbidades' => $request->comorbidades,
            'anamnese' => $request->anamnese,
            'user_id' => Auth::user()->id
        ]);
        
        $formulario->save();

        return redirect(RouteServiceProvider::HOME);
    }
    
    public function storePac(Request $request): RedirectResponse
    {


        $request->validate([
            'mom_name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'max:255'],
            'comorbidades' => ['required', 'string', 'max:255'],
            'anamnese' => ['required', 'string', 'max:255'],
        ]);

        $formulario = Formulario::create([
            'mom_name' => $request->mom_name,
            'date' => $request->date,
            'comorbidades' => $request->comorbidades,
            'anamnese' => $request->anamnese,
            'user_id' => Auth::user()->id
        ]);
        
        $formulario->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
