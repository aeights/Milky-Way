@extends('layouts.dashboardSeller')
@section('content')
    <div class="pt-32 flex flex-col justify-center ml-[20%]">
        <div class="mb-4">
            <a class="bg-[#B2A4FF] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/pencatatan/tambah">Tambah</a>
        </div>
        <table class="table-fixed border text-sm overflow-y-scroll block h-[400px]">
            <thead>
                <tr class="fixed">
                    <th class="bg-slate-200 p-2">No</th>
                    <th class="bg-slate-200 w-20 p-2">Gambar</th>
                    <th class="bg-slate-200 p-2">Nama Barang</th>
                    <th class="bg-slate-200 p-2">Terjual</th>
                    <th class="bg-slate-200 p-2">Penghasilan</th>
                    <th class="bg-slate-200 p-2">Tanggal</th>
                    <th class="bg-slate-200 p-2">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($catatan as $no => $hasil)
                    <tr>
                        <td class="w-10">{{$no+1}}</td>
                        <td><img class="h-20" src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                        <td>{{$hasil->barang['nama']}}</td>
                        <td>{{$hasil->stok_terjual}}</td>
                        <td>Rp. {{$hasil->penghasilan}}</td>
                        <td>{{$hasil->tanggal}}</td>
                        <td class="bg-slate-200">
                            <form class="flex" action="{{'/hapusCatatan'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin membatalkan transaksi ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/pencatatan/edit/'.$hasil->id)}}">Edit</a>
                                <a onclick="return confirm('Apakah barang sudah kamu terima?')" class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/transaksi/selesai/'.$hasil->id)}}">Selesai</a>
                                <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection