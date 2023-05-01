@extends('layouts.dashboard')
@section('content')
    <div class="pl-72 pt-36">
        <form class="flex flex-row" action="/tambahBarang" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="toko_id">
            <div class="mr-16">
                <div class="mb-2">
                    <p>Nama</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Nama Barang" type="text" name="nama">
                </div>
                <div class="mb-2">
                    <p>Harga</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Harga Barang (Rp)" type="number" name="harga">
                </div>
                <div class="mb-2">
                    <p>Berat</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Berat Barang (Kg)" type="number" name="berat">
                </div>
                <div class="mb-2">
                    <p>Kategori</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="test" type="Kategori Barang" name="kategori">
                </div>
                <div class="mb-2">
                    <p>Stok</p>
                    <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Jumlah Stok" type="number" name="stok">
                </div>
                <button class="bg-[#B2A4FF] mt-2 mr-4 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg">Tambah</button>
                <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/batalBarang">Batal</a>
            </div>
            <div>
                <div>
                    <p>Gambar</p>
                    <input class="p-2 text-sm drop-shadow-md" type="file" name="gambar">
                </div>
                <div>
                    <p>Deskripsi Produk</p>
                    <textarea class="p-2 w-80 drop-shadow-md text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" placeholder="Deskripsi Produk" name="deskripsi"></textarea>
                </div>
            </div>
            <div class="ml-8">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </form>
    </div>
@endsection