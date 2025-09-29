<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Arma;

class ArmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if (session()->has('associado')) {
        $arma = Arma::find($id);
        return view('site.detalhesArma', ['armas'=> $arma]);
    } else {
        return redirect()->route('site.index');
    }

    }

}
