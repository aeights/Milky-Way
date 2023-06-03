@extends('layouts.dashboardAdmin')
@section('content')
<div class="pl-72 pt-32 flex flex-col justify-center">
    <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
        <thead>
            <tr class="">
                <th class="bg-slate-300 p-2">No</th>
                <th class="bg-slate-200 p-2">Nama Pembeli</th>
                <th class="bg-slate-300 p-2">Alamat</th>
                <th class="bg-slate-200 p-2">Gambar</th>
                <th class="bg-slate-300 p-2">Nama Barang</th>
                <th class="bg-slate-200 p-2">Harga</th>
                <th class="bg-slate-300 p-2">Jumlah</th>
                <th class="bg-slate-200 p-2">Total Harga</th>
                <th class="bg-slate-300 p-2">Status Transaksi</th>
                <th class="bg-slate-200 p-2">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($transaksi as $no => $hasil)
                <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$hasil->nama_pembeli}}</td>
                    <td>{{$hasil->alamat}}</td>
                    <td>
                        <img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                    </td>
                    <td>{{$hasil->nama_barang}}</td>
                    <td>{{$hasil->harga}}</td>
                    <td>{{$hasil->jumlah}}</td>
                    <td>{{$hasil->total_harga}}</td>
                    <td>{{$hasil->status_transaksi}}</td>
                    <td>
                        <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/transaksi/detail/'.$hasil->id)}}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection