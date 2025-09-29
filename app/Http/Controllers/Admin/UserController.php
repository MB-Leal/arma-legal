<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){

        if($request->pesquisa != ''){
            $result = User::where('name', 'like', '%'.$request->pesquisa.'%')
            ->orderBy('name')
            ->get();

            if($result){
                return view('admin.usuario', ['resultado' => $result]);
            }else{
                $result = 'Usuário não localizada!';
            return view('admin.usuario', ['resultado' => $result]);
            }

        }else{
            $result = null;
            return view('admin.usuario', ['resultado' => $result]);
        }
    }

    public function editar(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.usuarioList')->with('success','Usuário atualizado com sucesso!');
    }

    public function show($id){
        $user = User::find($id);
        return view('admin.editUsuario', ['usuario'=> $user]);
    }

    public function delete($id){
        if(Auth::id() == $id){
            return redirect()->back()->with('error', 'Você não pode se excluir do sistema');
        }else{
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.usuarioList')->with('success', 'Usuário excluído com sucesso');
        }
    }
    public function listUser(){
        $usuarios = User::all();
        return view('admin.usuarioList',['resultado'=> $usuarios]);
    }
}
