@extends('layouts.dashboard')
@section('content')
    <div class="pl-72 pt-36">
        <form action="/tambahBarang" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <input type="hidden" name="toko_id">
            <div>
                <p>Nama</p>
                <input type="text" name="nama">
            </div>
            <div>
                <p>Harga</p>
                <input type="text" name="harga">
            </div>
            <div>
                <p>Gambar</p>
                <input type="file" name="gambar">
            </div>
            <div>
                <p>Berat</p>
                <input type="number" name="berat">
            </div>
            <div>
                <p>Kategori</p>
                <input type="text" name="kategori">
            </div>
            <div>
                <p>Stok</p>
                <input type="number" name="stok">
            </div>
            <div>
                <p>Deskripsi Produk</p>
                <input type="text" name="deskripsi">
            </div>
            <button class="bg-[#B2A4FF] p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg">Tambah</button>
        </form>
    </div>
@endsection