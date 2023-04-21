@extends('layouts.dashboard')
@section('content')
<div class="pl-72 pt-36">
    <form action="{{url('/editBarang/'.$barang->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <input type="hidden" name="toko_id">
        <div>
            <p>Nama</p>
            <input value="{{$barang->nama}}" type="text" name="nama">
        </div>
        <div>
            <p>Harga</p>
            <input value="{{$barang->harga}}" type="text" name="harga">
        </div>
        <div>
            <p>Gambar</p>
            <input value="{{$barang->gambar}}" type="file" name="gambar">
        </div>
        <div>
            <p>Berat</p>
            <input value="{{$barang->berat}}" type="number" name="berat">
        </div>
        <div>
            <p>Kategori</p>
            <input value="{{$barang->kategori}}" type="text" name="kategori">
        </div>
        <div>
            <p>Stok</p>
            <input value="{{$barang->stok}}" type="number" name="stok">
        </div>
        <div>
            <p>Deskripsi Produk</p>
            <input value="{{$barang->detail_produk}}" type="text" name="deskripsi">
        </div>
        <button class="bg-[#B2A4FF] p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg">Simpan</button>
    </form>
</div>
@endsection