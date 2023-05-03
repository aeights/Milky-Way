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
    <nav class="flex flex-row bg-[#B2A4FF] py-4 px-6 items-center rounded-b-[20px] fixed w-[100vw] justify-between shadow-lg">
        <a class="" href="/">
            <img class="w-44" src="{{asset('assets/logo.png')}}" alt="logo milky way">
        </a>
        <div>
            <input class="outline-slate-400 shadow-md rounded-full text-sm py-2 px-4 mr-2 w-96" placeholder="Cari barang disini" type="text" name="search">
            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
        <div class="flex flex-row items-center">
            <p class="right-5 mx-4">{{'Halo, '.$user = Auth::user()->nama_lengkap;}}</p>
            <div>
                <div class="profile" onclick="showMenu()">
                    <img class="w-[40px] mx-2" src="{{asset('/assets/profile.png')}}" alt="Profile">
                </div>
                <div id="profileMenu" class="menu hidden absolute bg-white right-7 p-2 rounded-md mt-2 drop-shadow-lg">
                    <ul class="flex flex-col text-sm">
                        <li class="my-1 hover:font-semibold"><a href="/profilePenjual">Profile</a></li>
                        <hr>
                        <li class="my-1 hover:font-semibold"><a href="/resetPasswordPenjual">Transaksi</a></li>
                        <hr>
                        <li class="my-1 hover:font-semibold"><a href="/logout">Reset Password</a></li>
                        <hr>
                        <li class="my-1 hover:font-semibold"><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="">
        @yield('content')
    </div>

    <script src="https://kit.fontawesome.com/c559a37e6f.js" crossorigin="anonymous"></script>
    <script>
        function showMenu(){
            var popup = document.querySelector("#profileMenu")
            popup.classList.toggle('flex')
            popup.classList.toggle('hidden')
        }
    </script>
</body>
</html>