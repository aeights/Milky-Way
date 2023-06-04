@extends('layouts.dashboardAdmin')
@section('content')
    <div class="pl-72 pt-32">
        <div class="mb-4">
            <a class="bg-[#B2A4FF] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardAdmin/pembayaran/tambah">Tambah</a>
        </div>
        <div class="flex flex-row">
            <div class="bg-[#B2A4FF] text-center text-sm py-2 w-10">No</div>
            <div class="bg-[#B2A4FF] text-center text-sm py-2">Nama</div>
            <div class="bg-[#B2A4FF] text-center text-sm py-2">Jenis Bank</div>
            <div class="bg-[#B2A4FF] text-center text-sm py-2">No. Rekening</div>
            <div class="bg-[#B2A4FF] text-center text-sm py-2">Opsi</div>
        </div>
        <div class="w-[1050px] h-[400px] overflow-y-scroll flex flex-col items-center shadow-md border">
            <table class="table-fixed border w-[1031px] text-sm p-4">
                <tbody class="text-center">
                    @foreach ($pembayaran as $no => $hasil)  
                        <tr class="bg-slate-50 border-b-2">
                            <td class="bg-slate-100 w-10">{{$no+1}}</td>
                            <td class="">{{$hasil->nama}}</td>
                            <td class="">{{$hasil->jenis_bank}}</td>
                            <td class="">{{$hasil->no_rekening}}</td>
                            <td class="bg-slate-100">
                                <form action="{{url('/hapusPembayaran/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus pembayaran ini?')">
                                    @csrf
                                    <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardAdmin/pembayaran/edit/'.$hasil->id)}}">Edit</a>
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