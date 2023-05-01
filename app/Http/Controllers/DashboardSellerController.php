<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjual;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardSellerController extends Controller
{
    public function dashboardPenjual()
    {
        return view('penjual.dashboardPenjual',
        [
            'title'=>'Dashboard Penjual'
        ]);
    }

    public function barang()
    {
        // dd(Barang::all());
        $toko_id = DetailPenjual::where('penjual');
        return view('penjual.barang',
        [
            'title'=>'Barang',
            'barang'=>Barang::where('penjual_id','=',Auth::user()->id)->get()
        ]);
    }

    public function tambah()
    {
        return view('penjual.tambahBarang',
        [
            'title'=>'Tambah Barang'
        ]);
    }

    public function tambahBarang(Request $req)
    {
        $validated = $req->validate([
            'nama'=>'required|min:3',
            'harga'=>'required',
            'gambar'=>'required',
            'berat'=>'required',
            'kategori'=>'required',
            'stok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validated) {
            if ($req->hasFile('gambar')) {
                $barang = new Barang();
                $req->file('gambar')->move('barang/',$req->file('gambar')->getClientOriginalName());
                $barang->penjual_id=$req->toko_id;
                $barang->nama=$req->nama;
                $barang->harga=$req->harga;
                $barang->gambar=$req->file('gambar')->getClientOriginalName();
                $barang->berat=$req->berat;
                $barang->kategori=$req->kategori;
                $barang->stok=$req->stok;
                $barang->detail_produk=$req->deskripsi;
                $barang->save();
                return to_route('barang');
            }
        }
    }

    public function edit($id)
    {
        return view('penjual.editBarang',
        [
            'title'=> 'Edit Barang',
            'barang'=>Barang::find($id)
        ]);
    }

    public function editBarang(Request $req,$id)
    {
        $validated = $req->validate([
            'nama'=>'required|min:3',
            'harga'=>'required',
            'gambar'=>'required',
            'berat'=>'required',
            'kategori'=>'required',
            'stok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validated) {
            if ($req->hasFile('gambar')) {
                $barang = Barang::find($id);
                $req->file('gambar')->move('barang/',$req->file('gambar')->getClientOriginalName());
                $barang->nama=$req->nama;
                $barang->harga=$req->harga;
                $barang->gambar=$req->file('gambar')->getClientOriginalName();
                $barang->berat=$req->berat;
                $barang->kategori=$req->kategori;
                $barang->stok=$req->stok;
                $barang->detail_produk=$req->deskripsi;
                $barang->save();
                return to_route('barang');
            }
        }
    }

    public function hapusBarang($id)
    {
        $barang = Barang::find($id);
        unlink("barang/".$barang->gambar);
        $barang->delete();
        return back();
    }

    public function resetPassword()
    {
        return view('penjual.resetPassword',
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
                return back()->with('message','Password berhasil direset, silahkan login kembali');
        }
        else {
            return back();
        }
    }

    public function profile()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.profilePenjual',
    [
        'title' => 'Profile',
        'toko' => $toko
    ]);
    }

    public function editProfile()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.editProfilePenjual',
        [
            'title' => 'Edit Profile',
            'toko' => $toko
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $current_toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],

            'nama_toko' => ['required', 'unique:detail_penjuals,nama_toko,'.$current_toko->id],
            'alamat_toko' => ['required'],
            'deskripsi_toko' => ['required'],

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
            
            DetailPenjual::where('id',$current_toko->id)
                        ->update(
                            [
                                'nama_toko' => $req->nama_toko,
                                'alamat_toko' => $req->alamat_toko,
                                'deskripsi_toko' => $req->deskripsi_toko
                            ]);

            return redirect('/profilePenjual');
        }
        else {
            return back();
        }
    }

    public function batalBarang()
    {
        return to_route('barang');
    }

    public function batalProfile()
    {
        return redirect('/profilePenjual');
    }

    public function pengiriman()
    {
        return view('penjual.pengirimanBarang',
    [
        'title' => 'Pengiriman',
    ]);
    }

    public function tambahMetode()
    {
        return view('penjual.tambahMetode',
        [
            'title' => 'Tambah Metode Pengiriman',
        ]);
    }
}
