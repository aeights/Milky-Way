@extends('layouts.main')
@section('content-left')
    <div class="flex flex-col items-center mt-10">
        <p class="text-[30px] font-bold">Selamat Datang Kembali!</p>
        <div class="">
            <form class="flex flex-col" action="" method="post">
                <p class="mt-2">Username</p>
                <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm" type="text" placeholder="Username" name="username">
                <p class="mt-2">Password</p>
                <input class="my-1 py-1 px-2 rounded-lg placeholder:text-sm" type="text" placeholder="Password" name="password">
                <button class="bg-[#B2A4FF] mt-4 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection

@section('content-right')
    <div class="flex flex-col items-center pt-12">
        <img class="w-[300px]" src="{{asset('assets/logo.png')}}" alt="logo">
        <p class="pt-10 font-bold text-lg">Daftar Jika Kamu Belum Punya Akun</p>
        <a class="bg-[#B2A4FF] mt-5 py-2 px-10 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70"" href="/register/{{$type}}">Daftar</a>
    </div>
@endsection