<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login($type)
    {
        return view('auth.login',
        [
            'type'=>$type,
            'title'=>'login'
        ]);
    }

    public function register($type)
    {
        return view('auth.register',
            [
                'type'=>$type,
                'title'=>'register'
            ]);
        
    }

    public function proses_register(Request $req){
        // tambah data ke database

        /*
        $user = User::create([
            'name' => 'keffuir'
            ....
            ....
            ....
        ]);

        $user->id;
        return redirect('/detail-owner/'.$user->id);
        */
        return redirect('/detail-owner/1');
    }

    public function detailPenjual($id)
    {
        return view('auth.detail-penjual',
            [
                'id'=>$id,
                'title'=>'Detail Owner'
            ]);
    }
    
    public function detailPartner($id)
    {
        return view('auth.detail-partner',
            [
                'id'=>$id,
                'title'=>'Detail Partner'
            ]);
    }
}
