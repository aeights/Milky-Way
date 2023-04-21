@extends('layouts.dashboard')
@section('content')
    <div class="pl-72 pt-36">
        <div class="mb-6">
            <a class="bg-[#B2A4FF] p-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/barang/tambah">Tambah</a>
        </div>
        <table class="table-fixed border w-[1050px] drop-shadow-xl text-sm z-0">
            <thead class="border">
                <tr>
                    <th class="bg-slate-200 w-10">No</th>
                    <th class="bg-slate-100 w-36">Gambar</th>
                    <th class="bg-slate-200 w-44">Nama</th>
                    <th class="bg-slate-100 w-28">Harga</th>
                    <th class="bg-slate-200 w-14">Berat</th>
                    <th class="bg-slate-100 w-32">Kategori</th>
                    <th class="bg-slate-200 w-14">Stok</th>
                    <th class="bg-slate-100">Deskripsi</th>
                    <th class="bg-slate-200 w-24">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($barang as $no => $hasil)  
                    <tr class="bg-slate-50">
                        <td class="bg-slate-200">{{$no+1}}</td>
                        <td class="bg-slate-100">
                            <img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                        </td>
                        <td class="bg-slate-200">{{$hasil->nama}}</td>
                        <td class="bg-slate-100">{{'Rp. '.$hasil->harga}}</td>
                        <td class="bg-slate-200">{{$hasil->berat}}</td>
                        <td class="bg-slate-100">{{$hasil->kategori}}</td>
                        <td class="bg-slate-200">{{$hasil->stok}}</td>
                        <td class="bg-slate-100 overflow-hidden whitespace-nowrap">{{$hasil->detail_produk}}</td>
                        <td class="bg-slate-200">
                            <form action="{{url('/hapusBarang/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus barang ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/barang/edit/'.$hasil->id)}}">Edit</a>
                                <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection