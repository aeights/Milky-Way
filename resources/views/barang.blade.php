@extends('layouts.dashboard')
@section('content')
    <div class="pl-72 pt-36">
        <div class="mb-4">
            <a class="bg-[#B2A4FF] p-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/barang/tambah">Tambah</a>
        </div>
        <table class="table-fixed border">
            <thead class="">
                <tr>
                    <th class="w-10 bg-slate-200">No</th>
                    <th class="w-24 bg-slate-100">Gambar</th>
                    <th class="w-32 bg-slate-200">Nama</th>
                    <th class="w-20 bg-slate-100">Harga</th>
                    <th class="w-20 bg-slate-200">Berat</th>
                    <th class="w-20 bg-slate-100">Kategori</th>
                    <th class="w-20 bg-slate-200">Stok</th>
                    <th class="w-60 bg-slate-100">Deskripsi</th>
                    <th class="w-24 bg-slate-200">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($barang as $no => $hasil)  
                    <tr class="bg-slate-50">
                        <td class="bg-slate-200">{{$no+1}}</td>
                        <td class="bg-slate-100">
                            <img src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                        </td>
                        <td class="bg-slate-200">{{$hasil->nama}}</td>
                        <td class="bg-slate-100">{{$hasil->harga}}</td>
                        <td class="bg-slate-200">{{$hasil->berat}}</td>
                        <td class="bg-slate-100">{{$hasil->kategori}}</td>
                        <td class="bg-slate-200">{{$hasil->stok}}</td>
                        <td class="bg-slate-100">{{$hasil->detail_produk}}</td>
                        <td class="bg-slate-200">
                            <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/barang/edit', $hasil)}}">Edit</a>
                            <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection