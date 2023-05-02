@extends('layouts.dashboard')
@section('content')
<div class="pl-72 pt-36">
    <form class="flex flex-row" action="{{url('/editBarang/'.$barang->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="toko_id">
        <div class="mr-16">
            <div class="mb-2">
                <p>Nama</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->nama}}" type="text" name="nama">
            </div>
            <div class="mb-2">
                <p>Harga</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->harga}}" type="text" name="harga">
            </div>
            <div class="mb-2">
                <p>Berat</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->berat}}" type="number" name="berat">
            </div>
            <div class="mb-2">
                <p>Kategori</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->kategori}}" type="text" name="kategori">
            </div>
            <div class="mb-2">
                <p>Stok</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$barang->stok}}" type="number" name="stok">
            </div>
            <button class="bg-[#B2A4FF] p-2 mt-2 mr-4 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" type="submit">Simpan</button>
            <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/batalBarang">Batal</a>
        </div>
        <div class="mr-9">
            <div>
                <p>Gambar</p>
                <input class="p-2 text-sm drop-shadow-md" value="{{$barang->gambar}}" type="file" name="gambar">
            </div>
            <div>
                <img class="h-80" src="{{asset('barang/'.$barang->gambar)}}" alt="Gambar Produk">
            </div>
        </div>
        <div>
            <p>Deskripsi Produk</p>
            <textarea class="p-2 w-80 drop-shadow-md text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" name="deskripsi">{{$barang->detail_produk}}</textarea>
        </div>
        <div class="ml-8">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </form>
</div>
@endsection