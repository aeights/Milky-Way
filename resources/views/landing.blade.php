@extends('layouts.main')
@section('content-left')
<div class="flex flex-col">
    <div class="text-[20px] mx-10 mt-20 text-center">
        <p>Milky Way adalah sistem yang menaungi usaha susu</p>
        <p>di Indonesia berjenis susu sapi dan susu kedelai yang berkualitas</p>
    </div>
    <div class="flex flex-col items-center mt-10">
        <button onclick="clickModalLogin()" data-modal-target="popup-modal-login" data-modal-toggle="popup-modal-login" class="bg-[#B2A4FF] hover:bg-[#A092EC] hover:shadow-slate-700/90 py-2 my-2 w-36 rounded shadow-md shadow-slate-700/40" >Login</button>

        <button onclick="clickModalDaftar()" data-modal-target="popup-modal-daftar" data-modal-toggle="popup-modal-daftar" class="bg-[#B2A4FF] hover:bg-[#A092EC] hover:shadow-slate-700/90 py-2 my-2 w-36 rounded shadow-md shadow-slate-700/40">Daftar</button>
    </div>
</div>
@endsection

@section('content-right')
<div class="flex justify-center">
    <img class="w-80" src="{{ asset('assets/sapi.png')}}" alt="sapi">
</div>
@endsection

@section('modal')
    <div id="popup-modal-login" tabindex="-1" class="fixed hidden justify-center items-center top-0 left-0 right-0 bottom-0 bg-black/30 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-sm md:h-auto">
            <div class="relative bg-white rounded-xl shadow p-5 flex flex-col items-center">
                <h1 class="text-[18px] my-2">Login Sebagai</h1>
                <div class="flex flex-col text-center">
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/pembeli">Pembeli</a>
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/penjual">Penjual</a>
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/login/partner">Partner</a>
                </div>
            </div>
            <div class="absolute top-0 right-3 text-lg">
                <button onclick="clickModalLogin()">
                    <img class="w-3" src="{{asset('assets/close.svg')}}" alt="close">
                </button>
            </div>
        </div>
    </div>

    <div id="popup-modal-daftar" tabindex="-1" class="fixed hidden justify-center items-center top-0 left-0 right-0 bottom-0 bg-black/30 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-sm md:h-auto">
            <div class="relative bg-white rounded-xl shadow p-5 flex flex-col items-center">
                <h1 class="text-[18px] my-2">Daftar Sebagai</h1>
                <div class="flex flex-col text-center">
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/register/pembeli">Pembeli</a>
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/register/penjual">Penjual</a>
                    <a class="bg-[#B2A4FF] my-2 px-5 py-2 rounded-[10px] hover:bg-[#A092EC] hover:shadow-slate-700/90 shadow-md shadow-slate-700/70" href="/register/partner">Partner</a>
                </div>
            </div>
            <div class="absolute top-0 right-3 text-lg">
                <button onclick="clickModalDaftar()">
                    <img class="w-3" src="{{asset('assets/close.svg')}}" alt="close">
                </button>
            </div>
        </div>
    </div>

    <script>
        function clickModalLogin(){
            var popup = document.querySelector("#popup-modal-login")
            popup.classList.toggle('flex')
            popup.classList.toggle('hidden')
        }
        function clickModalDaftar(){
            var popup = document.querySelector("#popup-modal-daftar")
            popup.classList.toggle('flex')
            popup.classList.toggle('hidden')
        }
    </script>
@endsection