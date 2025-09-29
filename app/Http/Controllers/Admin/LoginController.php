<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }
        return redirect()->back()->withErrors([
            'error' => 'Verifique os dados digitados, não encontramos em nossa base de dados.'
        ]);
        return redirect()->route('admin.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.usuarioList')->with('success','Usuário cadastrado com sucesso!');
    }

    public function logout() {
       Auth::logout();

       session()->remove('associado');
       session()->remove('matricula');
       session()->remove('cpf');
       session()->remove('perfil');
       session()->remove('danger');
       session()->remove('success');
       session()->remove('error');

        return redirect()->route('admin.login');
    }
}
