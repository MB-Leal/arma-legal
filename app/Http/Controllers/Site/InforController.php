<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

class InforController extends Controller
{

    public function infor(){
        if(session()->has('associado')){
        return view('site.infor');
    }else{
        return redirect()->route('site.index');
    }
    }
}
