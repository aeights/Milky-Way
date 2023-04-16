@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-28">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Sudah Punya Akun?, Login Disini!</p>
        <a class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/{{$type}}">Login</a>
    </div>
@endsection

@section('content-right')
    <div class="flex flex-col items-center">
        <p class="bg-[#B2A4FF] py-2 px-10 rounded-lg">{{ucfirst($type)}}</p>
        <form class="mt-2 flex flex-col items-center" action="/prosesRegister" method="post">
            @csrf
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <input type="hidden" value="{{$type}}" name="type">
            <div class="my-1">
                <p>Nama Lengkap</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Milky Way" type="text" name="nama">
            </div>
            <div class="my-1">
                <p>Email</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="email@mail.com" type="email" name="email">
            </div>
            <div class="my-1">
                <p>No. Telepon</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="085xxxxxxxxx" type="text" name="nomor_telepon">
            </div>
            <div class="my-1">
                <p>Alamat</p>
                <input required class="w-[400px] rounded-md py-1 px-2 text-sm" placeholder="Jl. xxx xxx xxx" type="text" name="alamat">
            </div>
            <div class="flex my-1">
                <div class="">
                    <p>Tanggal Lahir</p>
                    <input required class="w-[190px] rounded-md py-1 px-2 mr-5 text-sm" placeholder="dd/mm/yyyy" type="date" name="tanggal_lahir">
                </div>
                <div class="">
                    <p>Jenis Kelamin</p>
                    <select required class="w-[190px] rounded-md py-1 px-2 text-[12px]" id="" name="jenis_kelamin">
                        <option>Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="flex items-start">
                <div class="">
                    <p>Username</p>
                    <input required class="w-[190px] mr-5 rounded-md py-1 px-2 text-sm" placeholder="Username" type="text" name="username">
                </div>
                <div class="">
                    <p>Kata Sandi</p>
                    <input required class="w-[190px] rounded-md py-1 px-2 text-sm" placeholder="Password" type="text" name="password">
                </div>
            </div>
            <button class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">
            @if ($type === 'pembeli')
                Daftar
            @else
                Selanjutnya
            @endif
            </button>
        </form>

    </div>
@endsection