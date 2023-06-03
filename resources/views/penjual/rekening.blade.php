@extends('layouts.dashboardSeller')
@section('content')
<div class="pl-72 pt-32 mb-4">
    <a class="bg-[#B2A4FF] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/penarikan/tambah">Tambah</a>
</div>
<div id="tabel" class="pl-72 flex flex-col justify-center">
    <table class="w-[97%] table-fixed border text-sm overflow-y-scroll block h-[400px]">
        <thead class="">
            <tr class="">
                <th class="bg-slate-200 p-2">No</th>
                <th class="bg-slate-200 p-2">Nama</th>
                <th class="bg-slate-200 p-2">Jenis Bank</th>
                <th class="bg-slate-200 p-2">No. Rekening</th>
                <th class="bg-slate-200 p-2">Opsi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($rekening as $no => $hasil)
                <tr>
                    <td class="w-10">{{$no+1}}</td>
                    <td>{{$hasil->nama}}</td>
                    <td>{{$hasil->jenis_bank}}</td>
                    <td>{{$hasil->no_rekening}}</td>
                    <td class="bg-slate-200">
                        <form class="flex" action="{{'/hapusRekening/'.$hasil->id}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus rekening ini?')">
                            @csrf
                            <a class="bg-green-500 text-[12px] p-1 m-1 text-white rounded-sm" href="{{url('/dashboardPenjual/penarikan/edit/'.$hasil->id)}}">Edit</a>
                            <button class="text-[12px] p-1 m-1 bg-red-500 text-white rounded-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection