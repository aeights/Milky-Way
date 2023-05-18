<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboardAdmin',
        [
            'title' => 'Dashboard Admin'
        ]);
    }

    public function profile()
    {
        return view('admin.profileAdmin',
        [
            'title' => 'Profile',
        ]);
    }

    public function editProfile()
    {
        return view('admin.editProfileAdmin',
        [
            'title' => 'Edit Profile',
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
        ]);

        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->nama_lengkap=$req->nama;
            $user->tanggal_lahir=$req->tanggal_lahir;
            $user->jenis_kelamin=$req->jenis_kelamin;
            $user->alamat=$req->alamat;
            $user->username=$req->username;
            $user->email=$req->email;
            $user->nomor_telepon=$req->nomor_telepon;
            $user->save();
            return redirect('/profileAdmin');
        }
        else {
            return back();
        }
    }

    // Transaksi
    public function transaksi()
    {
        return view('admin.verifikasiTransaksi',
    [
        'title' => 'Transakis'
    ]);
    }
}
