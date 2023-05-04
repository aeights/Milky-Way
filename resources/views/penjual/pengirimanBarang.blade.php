@extends('layouts.dashboardSeller')
@section('content')
    <div class="pl-72 pt-36 flex flex-col">
        <div class="w-[1000px] h-[400px] shadow-lg border">
            <div class="tab flex flex-row justify-evenly">
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TB')" id="defaultOpen">Transaksi Berlangsung</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TS')">Transaksi Selesai</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'TG')">Transaksi Gagal</button>
                <button class="tablinks duration-200 hover:bg-slate-400 w-[250px] p-4" onclick="openCity(event, 'BP')">Biaya Pengiriman</button>
            </div>
            <div id="TB" class="tabcontent hidden items-center">
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
                            <th class="bg-slate-200 p-2">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($transaksi as $no => $hasil)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$hasil->nama_pembeli}}</td>
                                <td>{{$hasil->alamat}}</td>
                                <td>
                                    <img class="h-10 inline-block m-auto" src="{{asset('barang/'.$hasil->gambar)}}" alt="{{$hasil->gambar}}">
                                </td>
                                <td>{{$hasil->nama_barang}}</td>
                                <td>{{$hasil->harga}}</td>
                                <td>{{$hasil->jumlah}}</td>
                                <td>{{$hasil->total_harga}}</td>
                                <td>{{$hasil->status_transaksi}}</td>
                                <td>
                                    <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/transaksi/detail/'.$hasil->id)}}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
                            <th class="bg-slate-200 p-2">Opsi</th>
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
                            <th class="bg-slate-200 p-2">Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div id="BP" class="tabcontent hidden items-center">
                <table class="table-fixed border w-[1000px] text-sm overflow-y-scroll block h-[340px]">
                    <thead>
                        <tr class="">
                            <th class="bg-slate-300 p-2">No</th>
                            <th class="bg-slate-200 p-2">jarak</th>
                            <th class="bg-slate-300 p-2">Harga</th>
                            <th class="bg-slate-200 p-2">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($biaya_pengiriman as $no => $biaya)
                            <tr>
                                <td>{{$no+1}}</td>
                                <td>{{$biaya->jarak}}</td>
                                <td>{{$biaya->harga}}</td>
                                <td class="bg-slate-200 w-24">
                                    <form action="{{url('/hapusBiaya/'.$biaya->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        <a class="bg-green-500 text-[12px] text-white p-1 rounded-sm" href="{{url('/dashboardPenjual/pengiriman/edit/'.$biaya->id)}}">Edit</a>
                                        <button class="text-[12px] bg-red-500 text-white p-1 rounded-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            <a class="bg-[#B2A4FF] p-2 text-white rounded-md hover:bg-slate-400 duration-200 drop-shadow-lg" href="/dashboardPenjual/pengiriman/tambahBiaya">Tambah Biaya Pengiriman</a>
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