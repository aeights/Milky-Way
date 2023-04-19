<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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
        return view('barang',
        [
            'title'=>'Barang',
            'barang'=>Barang::all()
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
                $barang->nama=$req->nama;
                $barang->harga=$req->harga;
                $barang->gambar=$req->file('gambar')->getClientOriginalName();
                $barang->berat=$req->berat;
                $barang->kategori=$req->kategori;
                $barang->stok=$req->stok;
                $barang->detail_produk=$req->deskripsi;
                $barang->save();
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

    public function editBarang(Request $req)
    {
        
    }
}
