@extends('layouts.dashboard')
@section('content')
    <div class="pl-72 pt-36 flex flex-col">
        <div class="w-[1000px] h-[400px] shadow-lg border">
            <div class="tab flex flex-row justify-evenly">
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TB')" id="defaultOpen">Transaksi Berlangsung</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TS')">Transaksi Selesai</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TG')">Transaksi Gagal</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'MP')">Metode Pengiriman</button>
            </div>
            <div id="TB" class="tabcontent hidden justify-center">
                <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
                    <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">Nama Pembeli</th>
                            <th class="bg-slate-300 p-2">Alamat</th>
                            <th class="bg-slate-200 p-2">Gambar</th>
                            <th class="bg-slate-300 p-2">Nama Barang</th>
                            <th class="bg-slate-200 p-2">Harga</th>
                            <th class="bg-slate-300 p-2">Jumlah</th>
                            <th class="bg-slate-200 p-2">Total Harga</th>
                            <th class="bg-slate-300 p-2">Status Transaksi</th>
                            <th class="bg-slate-200 p-2">Status Pembayaran</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="TS" class="tabcontent hidden justify-center">
                <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
                    <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">Nama Pembeli</th>
                            <th class="bg-slate-300 p-2">Alamat</th>
                            <th class="bg-slate-200 p-2">Gambar</th>
                            <th class="bg-slate-300 p-2">Nama Barang</th>
                            <th class="bg-slate-200 p-2">Harga</th>
                            <th class="bg-slate-300 p-2">Jumlah</th>
                            <th class="bg-slate-200 p-2">Total Harga</th>
                            <th class="bg-slate-300 p-2">Status Transaksi</th>
                            <th class="bg-slate-200 p-2">Status Pembayaran</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="TG" class="tabcontent hidden justify-center">
                <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
                    <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">Nama Pembeli</th>
                            <th class="bg-slate-300 p-2">Alamat</th>
                            <th class="bg-slate-200 p-2">Gambar</th>
                            <th class="bg-slate-300 p-2">Nama Barang</th>
                            <th class="bg-slate-200 p-2">Harga</th>
                            <th class="bg-slate-300 p-2">Jumlah</th>
                            <th class="bg-slate-200 p-2">Total Harga</th>
                            <th class="bg-slate-300 p-2">Status Transaksi</th>
                            <th class="bg-slate-200 p-2">Status Pembayaran</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="MP" class="tabcontent hidden justify-center">
                <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
                    <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">jarak</th>
                            {{-- <th class="bg-slate-300 p-2">Estimasi</th> --}}
                            <th class="bg-slate-200 p-2">Harga</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <a class="bg-[#B2A4FF] p-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/pengiriman/tambahMetode">Tambah Metode Pengiriman</a>
        </div>
        <script>
            function openCity(evt, btnName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.add('hidden')
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove('bg-[#B2A4FF]')
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(btnName).classList.add('flex');
            document.getElementById(btnName).classList.remove('hidden');
            evt.currentTarget.className += " bg-[#B2A4FF]";
            }
        </script>
        <script>
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>
@endsection