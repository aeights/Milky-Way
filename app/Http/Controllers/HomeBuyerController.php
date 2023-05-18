<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeBuyerController extends Controller
{
    public function home()
    {
        return view('pembeli.home',
        [
            'title' => 'Beranda',
            'data' => DB::table('barang')
                    ->select('*','barang.id AS barang_id','detail_penjual.id AS toko_id')
                    ->join('detail_penjual','detail_penjual.id','=','barang.penjual_id')->get()
        ]);
    }

    public function profile()
    {
        return view('pembeli.profilePembeli',
        [
            'title' => 'Profile',
        ]);
    }

    public function editProfile()
    {
        return view('pembeli.editProfilePembeli',
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
            return redirect('/profilePembeli');
        }
        else {
            return back();
        }
    }

    public function resetPassword()
    {
        return view('pembeli.resetPassword',
        [
            'title' => 'Reset Password'
        ]);
    }

    public function prosesReset(Request $req)
    {
        $validated = $req->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);
        if ($validated and $req->password == $req->new_password) {
            User::where('id', Auth::user()->id)
                ->update(['password' => Hash::make($req->new_password)]);
                return back()->with('message','Password berhasil direset');
        }
        else {
            return back();
        }
    }

    // Pembelian
    public function cariBarang(Request $req)
    {
        $validated = $req->validate([
            'search' => 'required'
        ]);

        $searched_product = $req->search;

        if ($validated) {
            $product = Barang::where('nama','LIKE','%'.$searched_product.'%')->get();
            if ($product) {
                return view('pembeli.cariBarang',
                [
                    'title' => 'Beranda',
                    'data' => $product
                ]);
            }else{
                return back()->with('message','Barang yang anda cari tidak ada');
            }
        } else{
            return back()->with('message','Ketikkan barang yang ingin anda cari');
        }
    }

    public function detailBarang($id)
    {
        return view('pembeli.detailBarang',
        [
            'title' => 'Detail Barang',
            'data' => Barang::where('id',$id)->first()
        ]);
    }
}
