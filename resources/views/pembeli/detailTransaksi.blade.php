@extends('layouts.buyer')
@section('content')
    <div class="pt-28 flex">
        <form class="flex flex-row mx-auto" action="{{url('/bayar/'.$transaksi->id)}}" method="post" onsubmit="return confirm('Note: Pastikan nominal transfer sudah benar')" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$transaksi->id}}" name="id">
            <div class="bg-slate-600 w-[300px] h-[300px] rounded-lg m-4 drop-shadow-lg">
                <img class="object-cover h-[300px] w-[300px] rounded-lg" src="{{asset('barang/'.$transaksi->barang['gambar'])}}" alt="">
            </div>
            <div class="w-[400px]">
                <p class="font-semibold mb-2">Detail Pesanan</p>
                <div class="mr-16 border rounded-md p-4 shadow">
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Pembeli</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->pembeli['nama_lengkap']}}" disabled name="nama_pembeli">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Alamat</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->alamat}}" disabled name="alamat">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Harga Per-barang</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->harga}}" disabled name="harga">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Jumlah</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->jumlah}}" disabled name="jumlah">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Total Harga</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                    </div>
                </div>
            </div>
            <div class="">
                <p class="font-semibold mb-2">Detail Barang</p>
                <div class="mr-16 border rounded-md p-4 shadow">
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Toko</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->harga}}" disabled name="harga">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama Barang</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['nama']}}" disabled name="jumlah">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Kategori</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['kategori']}}" disabled name="kategori">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Berat Barang</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$transaksi->barang['berat']}} Kg" disabled name="berat">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Harga</p>
                        <input class="mb-2shadow bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->total_harga}}" disabled name="total_harga">
                    </div>
                </div>
            </div>
            <div class="">
                <p class="font-semibold mb-2">Pembayaran</p>
                <div class="mr-16 border rounded-md p-4 shadow">
                    <div class="mb-2">
                        <p class="text-sm mb-1">Metode Pembayaran</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$transaksi->metode_pembayaran}}" disabled name="metode_pembayaran">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Nama</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="A/n {{$rekening->nama}}" disabled name="nama_rekening">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">No. Rekening</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="{{$rekening->no_rekening}}" disabled name="no_rekening">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Total Bayar</p>
                        <input class="mb-2 bg-white appearance-none text-sm border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" value="Rp. {{$total_transfer}}" disabled name="total">
                    </div>
                    <div class="mb-2">
                        <p class="text-sm mb-1">Bukti Pembayaran</p>
                        <input class="p-2 text-sm drop-shadow-md" type="file" name="bukti_pembayaran">
                        @error('bukti_pembayaran')
                            <div class="text-sm text-red-600">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <button class="bg-[#B2A4FF] mt-2 mr-4 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" type="submit">Bayar</button>
                <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/transaksi">Kembali</a>
            </div>
        </form>
    </div>
@endsection