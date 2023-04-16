<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function prosesRegister(Request $req){
        // proses tambah user
        $validated = $req->validate([
            'email' => 'required|unique:users',
            'username' => 'required|unique:users|min:4',
            'nomor_telepon' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validated) {
            // tambah data ke database
            $user = new User();
            $user->nama_lengkap=$req->nama;
            $user->email=$req->email;
            $user->username=$req->username;
            $user->password= Hash::make($req->password);
            $user->nomor_telepon=$req->nomor_telepon;
            $user->alamat=$req->alamat;
            $user->tanggal_lahir=$req->tanggal_lahir;
            $user->jenis_kelamin=$req->jenis_kelamin;
            $user->save();
            if ($req->type=='penjual') {
                return redirect('/detail-penjual/'.$user->id);
            }else if ($req->type=='partner') {
                return redirect('/detail-partner/'.$user->id);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/register');
        }
    }

    public function proseslogin(Request $req)
    {
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if($credentials){
            if(Auth::attempt($credentials)){
                $user = User::where('username', $req->username)->get();
                // $penjual = TokoPenjual::where('user_id', $user->id)->get();
                // $partner = TokoPartner::where('user_id', $user->id)->get();
                if($req->type == 'penjual'){
                    return redirect('penjual');
                }else if($req->type == 'partner'){
                }else{
                    return redirect('home');
                }
            }
        }
    }

    public function prosesLogout()
    {
        Auth::logout();
        return redirect()->route('landing');
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
