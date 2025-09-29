<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SistemaController extends Controller
{
    public function adminparaassoc(){
        Auth::logout();
        session()->remove('cpf');
        session()->remove('matricula');
        session()->remove('associado');
        session()->remove('perfil');
        session()->remove('danger');
        session()->remove('success');

        return redirect()->route('site.index');
        }
}
