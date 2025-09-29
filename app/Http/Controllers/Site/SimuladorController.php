<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Arma;
use App\Models\Associado;

class SimuladorController extends Controller
{

    public function show($id)
    {
        if(session()->has('associado')){
        $arma = Arma::find($id);
        //$associado = Associado::where('cpf', session()->get('cpf'));

        return view('site.simulador', ['armas'=>$arma]);

    }else{
        return redirect()->route('site.index');
    }
    }
}
