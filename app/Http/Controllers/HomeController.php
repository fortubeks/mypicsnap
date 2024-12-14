<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //dd(session()->get('uidd'));
        return redirect('event/' . session()->get('uidd'));
    }
}
