<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use Illuminate\Http\Request;
use App\Models\Requerimento;
//use Barryvdh\DomPDF\Facade\Pdf;


class RequerimentoController extends Controller
{

    public function index()
    {
        if (session()->has('associado')) {
            return view('site.autorizacao');
        } else {
            return redirect()->route('site.index');
        }
    }

}
