@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex flex-col justify-center">
        <div class="mb-4">
            <a class="bg-[#B2A4FF] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/alamat/tambah">Tambah</a>
        </div>
        <table class="table-fixed border text-sm overflow-y-scroll block h-[340px]">
            <thead>
                <tr class="">
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
                    <tr>
                        <td>{{$no+1}}</td>
                        <td><img src="{{asset('barang/'.$hasil->barang['gambar'])}}" alt=""></td>
                        <td>{{$hasil->barang['nama']}}</td>
                        <td>{{$hasil->penjual['nama_toko']}}</td>
                        <td>{{$hasil->alamat}}</td>
                        <td>Rp. {{$hasil->barang['harga']}}</td>
                        <td>{{$hasil->jumlah}}</td>
                        <td>Rp. {{$hasil->total_harga}}</td>
                        <td>{{$hasil->metode_pembayaran}}</td>
                        <td>{{$hasil->status_transaksi}}</td>
                        <td class="bg-slate-200 w-24">
                            <form action="" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus alamat ini?')">
                                @csrf
                                <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/alamat/edit/'.$hasil->id)}}">Edit</a>
                                <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection