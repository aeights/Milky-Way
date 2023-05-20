@extends('layouts.buyer')
@section('content')
    <div class="pt-32 flex flex-col justify-center">
        <div class="mb-4">
            <a class="bg-[#B2A4FF] p-2 mr-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/alamat/tambah">Tambah</a>
        </div>
        <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
            <thead>
                <tr class="">
                    <th class="bg-slate-300 p-2">No</th>
                    <th class="bg-slate-200 p-2">Alamat</th>
                    <th class="bg-slate-200 p-2">Opsi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($alamat as $no => $hasil)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$hasil->alamat}}</td>
                        <td class="bg-slate-200 w-24">
                            <form action="{{url('/alamat/hapus/'.$hasil->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus alamat ini?')">
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