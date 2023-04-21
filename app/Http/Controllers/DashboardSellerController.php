<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSellerController extends Controller
{
    public function dashboardPenjual()
    {
        return view('dashboardPenjual',
        [
            'title'=>'Dashboard Penjual'
        ]);
    }

    public function barang()
    {
        // dd(Barang::all());
        return view('barang',
        [
            'title'=>'Barang',
            'barang'=>Barang::where('penjual_id','=',Auth::user()->id)->get()
        ]);
    }

    public function tambah()
    {
        return view('tambahBarang',
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
        return view('editBarang',
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
}
