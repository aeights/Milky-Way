@extends('layouts.buyer')
@section('content')
    <div class="pl-72 pt-36">
        <p class="mb-4 font-semibold">Tambah Alamat</p>
        <form action="/alamat/edit/proses" method="post">
            @csrf
            <input type="hidden" value="{{$alamat->id}}" name="id">
            <div class="mb-2">
                <p class="mb-1">Alamat</p>
                <input class="p-2 drop-shadow-md w-60 text-sm border border-slate-300 rounded-md outline-[#B2A4FF]" type="text" placeholder="Jl. xxx xxx" value="{{$alamat->alamat}}" name="alamat">
            </div>
            <div>
                <button class="bg-[#B2A4FF] mt-2 mr-4 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" type="submit">Edit</button>
                <a class="bg-[#B2A4FF] mt-2 p-2 rounded-md hover:bg-slate-500 duration-200 drop-shadow-lg" href="/alamat">Batal</a>
            </div>
        </form>
    </div>
@endsection