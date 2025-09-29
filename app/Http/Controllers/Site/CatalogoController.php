<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Arma;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('associado')){
            $pistolaTaurus = Arma::where('fabricante', 'Taurus')
            ->where('tipo', 'Pistola')
            ->where('situacao', 'A')
            ->where('quantidade', '>', 0)
            ->get();
            $revolverTaurus = Arma::where('fabricante', 'Taurus')
            ->where('tipo', 'Revolver')
            ->where('situacao', 'A')
            ->where('quantidade', '>', 0)
            ->get();
            $longasTaurus = Arma::where('fabricante', 'Taurus')
            ->where('tipo', 'Arma Longa')
            ->where('situacao', 'A')
            ->where('quantidade', '>', 0)
            ->get();
            $longasCBC = Arma::where('fabricante', 'CBC')
            ->where('tipo', 'Arma Longa')
            ->where('situacao', 'A')
            ->where('quantidade', '>', 0)
            ->get();

            $pistolaGlock = Arma::where('fabricante', 'Glock')
            ->where('tipo', 'Pistola')
            ->where('situacao', 'A')
            ->where('quantidade', '>', 0)
            ->get();


        return view('site.catalogo', [
            'pistolaTaurus'=> $pistolaTaurus,
            'revolverTaurus'=> $revolverTaurus,
            'longasTaurus'=> $longasTaurus,

            'longasCBC'=> $longasCBC,

            'pistolaGlock'=> $pistolaGlock
        ]);

        }else{
            return redirect()->route('site.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
