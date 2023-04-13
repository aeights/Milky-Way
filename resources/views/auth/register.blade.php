@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center pt-10">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Sudah Punya Akun?, Login Disini!</p>
        <a class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="">Login</a>
    </div>
@endsection

@section('content-right')
    <div class="flex flex-col items-center">
        <p class="bg-[#B2A4FF] py-2 px-10 rounded-lg">{{ucfirst($type)}}</p>
        <form class="mt-2" action="post">
            <div>
                <p>Nama Lengkap</p>
                <input type="text" name="nama">
            </div>
            <div>
                <p>Email</p>
                <input type="text" name="email">
            </div>
            <div>
                <p>No. Telepon</p>
                <input type="text" name="telepon">
            </div>
            <div>
                <p>Alamat</p>
                <input type="text" name="alamat">
            </div>
            <div class="flex">
                <div>
                    <p>Tanggal Lahir</p>
                    <input type="text" name="tanggal_lahir">
                </div>
                <div>
                    <p>Jenis Kelamin</p>
                    <input type="text" name="gender">
                </div>
            </div>
            <div class="flex">
                <div>
                    <p>Username</p>
                    <input type="text" name="username">
                </div>
                <div>
                    <p>Kata Sandi</p>
                    <input type="text" name="password">
                </div>
            </div>

        </form>

    </div>
@endsection