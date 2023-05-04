@extends('layouts.dashboardSeller')
@section('content')
<div class="pl-72 pt-36">
    <form class="flex flex-row" action="{{url('/konfirmasiTransaksi/'.$transaksi->id)}}" method="post" onsubmit="return confirm('Konfirmasi Pesanan Ini?')">
        @csrf
        <div class="mr-16">
            <div class="mb-2">
                <p>Nama Pembeli</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->nama_pembeli}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Alamat</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->alamat}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Nama Barang</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->nama_barang}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Harga</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->harga}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Jumlah</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->jumlah}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Total Harga</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->total_harga}}" type="text" name="nama_pembeli">
            </div>
            <div class="mb-2">
                <p>Status Transaksi</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" value="{{$transaksi->status_transaksi}}" type="text" name="nama_pembeli">
            </div>
            <button class="bg-[#B2A4FF] p-2 mt-2 mr-4 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" type="submit">Konfirmasi</button>
            <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/dashboardPenjual/pengiriman">Batal</a>
        </div>
        <div class="mr-9">
            <div>
                <img class="h-80" src="{{asset('barang/'.$transaksi->gambar)}}" alt="Gambar Produk">
            </div>
        </div>
    </form>
</div>
@endsection