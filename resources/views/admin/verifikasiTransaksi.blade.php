@extends('layouts.dashboardAdmin')
@section('content')
    <div class="pl-72 pt-32">
        <table class="table-fixed border text-sm overflow-y-scroll block h-[400px]">
            <thead>
                <tr>
                    <th class="bg-slate-300 p-2">No</th>
                    <th class="bg-slate-300 w-20 p-2">Gambar</th>
                    <th class="bg-slate-200 p-2">Nama Barang</th>
                    <th class="bg-slate-200 p-2">Nama Toko</th>
                    <th class="bg-slate-200 p-2">Alamat</th>
                    <th class="bg-slate-200 p-2">Harga</th>
                    <th class="bg-slate-200 p-2">Jumlah</th>
                    <th class="bg-slate-200 p-2">Total Harga</th>
                    <th class="bg-slate-200 p-2">Metode Pembayaran</th>
                    <th class="bg-slate-200 p-2">Status Transaksi</th>
                    <th class="bg-slate-200 p-2">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($transaksi as $no => $hasil)
                    <tr class="border-b-2">
                        <td class="w-10">{{$no+1}}</td>
                        <td><img class="h-10" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                        <td>{{$hasil->barang['nama']}}</td>
                        <td>{{$hasil->penjual['nama_toko']}}</td>
                        <td>{{$hasil->alamat}}</td>
                        <td>Rp. {{$hasil->barang['harga']}}</td>
                        <td>{{$hasil->jumlah}}</td>
                        <td>Rp. {{$hasil->total_harga}}</td>
                        <td>{{$hasil->metode_pembayaran}}</td>
                        <td>{{$hasil->status_transaksi}}</td>
                        <td class="bg-slate-200">
                            <form class="flex" action="{{'/transaksi/batalkan/'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin membatalkan transaksi ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardAdmin/transaksi/'.$hasil->id)}}">Detail</a>
                                <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection