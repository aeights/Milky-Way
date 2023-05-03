<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeBuyerController extends Controller
{
    public function home()
    {
        return view('pembeli.home',
        [
            'title' => 'Beranda'
        ]);
    }
}
