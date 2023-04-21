<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$title}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="">
    <nav class="flex flex-row items-center bg-[#B2A4FF] py-8 pr-5 place-content-end rounded-b-[10px] shadow-lg fixed w-[100vw]">
        <p class="right-5 mx-4">{{'Halo, '.$user = Auth::user()->nama_lengkap;}}</p>
        <div class="action">
            <div class="profile" onclick="showMenu()">
                <img class="w-[40px] mx-2" src="{{asset('/assets/profile.png')}}" alt="Profile">
            </div>
            <div id="profileMenu" class="menu hidden absolute bg-white right-7 p-2 rounded-md mt-2 drop-shadow-lg">
                <ul class="flex flex-col text-sm">
                    <li class="my-1 hover:font-semibold"><a href="">Profile</a></li>
                    <hr>
                    <li class="my-1 hover:font-semibold"><a href="">Reset Password</a></li>
                    <hr>
                    <li class="my-1 hover:font-semibold"><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="fixed bg-[#E4E5EA] h-[100vh] w-[250px] flex flex-col items-center">
        <a class="bg-slate-200 rounded-lg py-4 px-14 mt-5 drop-shadow-lg font-bold" href="/dashboardPenjual">Dashboard</a>
        <input class="mt-10 rounded-md h-10 drop-shadow w-52 pl-5 focus:outline-none" placeholder="Search" type="text" name="" id="">
        <ul class="">
            <li class="my-5 bg-[#B2A4FF] hover:bg-[#B2A4FF] duration-200 px-14 py-4 rounded-lg drop-shadow-lg">
                <a class="" href="/dashboardPenjual/barang">Barang</a>
            </li>
            <li class="my-5 hover:bg-[#B2A4FF] duration-200 px-14 py-4 rounded-lg drop-shadow-lg">
                <a class="" href="">Pengiriman</a>
            </li>
            <li class="my-5 hover:bg-[#B2A4FF] duration-200 px-14 py-4 rounded-lg drop-shadow-lg">
                <a class="" href="">Pencatatan</a>
            </li>
            <li class="my-5 hover:bg-[#B2A4FF] duration-200 px-14 py-4 rounded-lg drop-shadow-lg">
                <a class="" href="">Penarikan</a>
            </li>
            <li class="my-5 hover:bg-[#B2A4FF] duration-200 px-14 py-4 rounded-lg drop-shadow-lg">
                <a class="" href="">Partner</a>
            </li>
        </ul>
    </div>

    <div class="h-[100vh]">
        @yield('content')
    </div>

    <script>
        function showMenu(){
            var popup = document.querySelector("#profileMenu")
            popup.classList.toggle('flex')
            popup.classList.toggle('hidden')
        }
    </script>
</body>
</html>