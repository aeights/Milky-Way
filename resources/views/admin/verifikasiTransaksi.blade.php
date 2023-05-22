@extends('layouts.dashboardAdmin')
@section('content')
    <div class="pl-72 pt-32">
        <div class="flex flex-row">
            <div class="bg-slate-300 text-center text-sm font-semibold py-1 w-10">No</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Penjual</div>
            <div class="bg-slate-300 text-center text-sm font-semibold py-1">Toko</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Pembeli</div>
            <div class="bg-slate-300 text-center text-sm font-semibold py-1">Nama Barang</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Gambar</div>
            <div class="bg-slate-300 text-center text-sm font-semibold py-1">Harga</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Jumlah</div>
            <div class="bg-slate-300 text-center text-sm font-semibold py-1">Total Harga</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Pembayaran</div>
            <div class="bg-slate-300 text-center text-sm font-semibold py-1">Bukti Transfer</div>
            <div class="bg-slate-200 text-center text-sm font-semibold py-1">Status Transaksi</div>
        </div>
        <div class="w-[1050px] h-[400px] overflow-y-scroll flex flex-col items-center shadow-md border">
            <table class="table-fixed border w-[1031px] text-sm p-4">
                <tbody class="text-center">
                    @foreach ($transaksi as $no => $hasil)  
                        <tr class="bg-slate-50">
                            <td class="bg-slate-200 w-10">{{$no+1}}</td>
                            <td class="bg-slate-200">{{$hasil->nama}}</td>
                            <td class="bg-slate-100">{{'Rp. '.$hasil->harga}}</td>
                            <td class="bg-slate-200">{{$hasil->berat}}</td>
                            <td class="bg-slate-100">{{$hasil->kategori}}</td>
                            <td class="bg-slate-200">{{$hasil->stok}}</td>
                            <td class="bg-slate-100">{{$hasil->detail_produk}}</td>
                            <td class="bg-slate-200">
                            <td class="bg-slate-100">
                                <img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                            </td>
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
    </div>
@endsection