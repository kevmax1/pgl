<?php

namespace App\Http\Controllers\UTilities;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangueController extends Controller
{
    public function setLocale(Request $request){
        $request->session()->put('lang',$request->get('l'));
        return redirect()->back();
    }
}
