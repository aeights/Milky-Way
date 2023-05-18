@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex flex-row">
        <div class="bg-slate-600 w-[400px] h-[400px] rounded-lg m-4 drop-shadow-lg">
            <img class="object-cover h-[400px] w-[400px] rounded-lg" src="{{asset('barang/'.$data->gambar)}}" alt="">
        </div>
        <div class="w-[35%] mr-4 bg-slate-50 py-2 px-4 rounded-lg drop-shadow-lg">
            <p class="text-2xl font-semibold">{{$data->nama}}</p>
            <p class="text-blue-500 text-3xl">Rp. {{$data->harga}}</p>
            <p class="p-2 border-b-4 border-opacity-80 text-center hover:text-lg duration-300 border-blue-500">Detail</p>
            <div class="mt-2 ml-2">
                <p class="text-sm opacity-80">Berat: {{$data->berat}}Kg</p>
                <p class="text-sm opacity-80">Kategori: {{$data->kategori}}</p>
                <p class="text-sm opacity-80">Stok: {{$data->stok}}</p>
            </div>
            <p class="opacity-80 mt-2">Deskripsi:</p>
            <p>{{$data->detail_produk}}</p>
        </div>
        <div class="w-[30%] h-[400px] border border-slate-800 bg-slate-50 py-2 px-4 rounded-lg drop-shadow-lg">
            <p class="text-xl text-center mb-2 font-semibold">Beli</p>
            <div class="flex mb-2">
                <div class="w-[50px] h-[50px] rounded-lg mr-2">
                    <img class="object-cover w-[50px] h-[50px] rounded-lg" src="{{asset('barang/'.$data->gambar)}}" alt="">
                </div>
                <p class="text-lg">{{$data->nama}}</p>
            </div>
            <form action="" method="post">
                @csrf
                <p class="text-lg text-blue-500">Rp. {{$data->harga}}</p>
                <div class="flex justify-center items-center">
                    <input class="text-center mr-4 outline-none border border-black rounded-full p-2 w-24" min="0" max="{{$data->stok}}" type="number" value="1" name="jumlah">
                    <p>Stok {{$data->stok}}</p>
                </div>
                <div class="mb-2 ml-4">
                    <p>Nama</p>
                    <input class="p-2 shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" name="nama">
                </div>
                <div class="mb-2 ml-4">
                    <p>Alamat</p>
                    <input class="p-2 shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" name="alamat">
                </div>
                <div class="mb-2 ml-4">
                    <p>Metode Pembayaran</p>
                    <select required class="rounded-md py-1 px-2 text-[12px] shadow-md outline-none border border-black" name="metode_pembayaran">
                        <option>Pilih Metode Pembayaran</option>
                        <option value="BRI">BRI</option>
                        <option value="Dana">Dana</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@endsection