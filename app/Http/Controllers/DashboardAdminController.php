<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DataTransaksi;
use App\Models\MetodePembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboardAdmin',
        [
            'title' => 'Dashboard Admin'
        ]);
    }

    public function profile()
    {
        return view('admin.profileAdmin',
        [
            'title' => 'Profile',
        ]);
    }

    public function editProfile()
    {
        return view('admin.editProfileAdmin',
        [
            'title' => 'Edit Profile',
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
        ]);

        if ($validated) {
            $user = User::find(Auth::user()->id);
            $user->nama_lengkap=$req->nama;
            $user->tanggal_lahir=$req->tanggal_lahir;
            $user->jenis_kelamin=$req->jenis_kelamin;
            $user->alamat=$req->alamat;
            $user->username=$req->username;
            $user->email=$req->email;
            $user->nomor_telepon=$req->nomor_telepon;
            $user->save();
            return redirect('/profileAdmin');
        }
        else {
            return back();
        }
    }

    // Transaksi
    public function transaksi()
    {
        return view('admin.verifikasiTransaksi',
    [
        'title' => 'Transaki',
        'transaksi' => DataTransaksi::where('status_transaksi','Verifikasi Admin')
        ->orWhere('status_transaksi','Transfer Penjual')->get()
    ]);
    }

    public function detailTransaksi($id)
    {
        $transaksi = DataTransaksi::find($id);
        return view('admin.detailTransaksi',
    [
        'title' => 'Detail Transaksi',
        'transaksi' => $transaksi,
        'rekening' => MetodePembayaran::where('jenis_bank',$transaksi->metode_pembayaran)->first(),
        'total_transfer' => $transaksi->total_harga+1000
    ]);
    }

    public function simpanTransaksi(Request $req)
    {
        $transaksi = DataTransaksi::find($req->id);
        $transaksi->status_transaksi=$req->status_transaksi;
        $transaksi->save();
        if ($transaksi->status_transaksi == 'Konfirmasi Penjual') {
            Barang::where('id',$req->barang_id)
                    ->decrement('stok',$req->jumlah);
            return back()->with('message','Transaksi berhasil disimpan');
        }
        return back()->with('message','Transaksi berhasil disimpan');
    }

    // Pembayaran
    public function pembayaran()
    {
        return view('admin.Pembayaran',
    [
        'title' => 'Pembayaran',
        'pembayaran' => MetodePembayaran::all()
    ]);
    }

    public function tambahPembayaran()
    {
        return view('admin.tambahPembayaran',
    [
        'title' => 'Tambah Pembayaran'
    ]);
    }

    public function prosesTambahPembayaran(Request $req)
    {
        $validated = $req->validate([
            'nama' => 'required',
            'jenis_bank' => 'required',
            'no_rekening' => 'required'
        ]);

        if ($validated) {
            $pembayaran = new MetodePembayaran();
            $pembayaran->nama=$req->nama;
            $pembayaran->jenis_bank=$req->jenis_bank;
            $pembayaran->no_rekening=$req->no_rekening;
            $pembayaran->save();
            return redirect('/dashboardAdmin/pembayaran')->with('message','Pembayaran berhasil ditambahkan');
        }
    }

    public function editPembayaran($id)
    {
        return view('admin.editPembayaran',
    [
        'title' => 'Edit Pembayaran',
        'pembayaran' => MetodePembayaran::where('id',$id)->first()
    ]);
    }

    public function prosesEditPembayaran(Request $req)
    {
        $validated = $req->validate([
            'nama' => 'required',
            'jenis_bank' => 'required',
            'no_rekening' => 'required'
        ]);

        if ($validated) {
            $pembayaran = MetodePembayaran::find($req->id);
            $pembayaran->nama=$req->nama;
            $pembayaran->jenis_bank=$req->jenis_bank;
            $pembayaran->no_rekening=$req->no_rekening;
            $pembayaran->save();
            return redirect('/dashboardAdmin/pembayaran')->with('message','Pembayaran berhasil diedit');
        }
    }

    public function hapusPembayaran($id)
    {
        $pembayaran = MetodePembayaran::find($id);
        $pembayaran->delete();
        return back()->with('message','Pembayaran berhasil dihapus');
    }

    // Riwayat
    public function riwayat()
    {
        return view('admin.riwayatTransaksi',
        [
            'title' => 'Pengiriman',
            'transaksi' => DataTransaksi::where('status_transaksi','Selesai')->get(),
        ]);
    }

    public function detailRiwayat($id)
    {
        $transaksi = DataTransaksi::find($id);
        return view('admin.detailRiwayatTransaksi',
        [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi,
            'rekening' => MetodePembayaran::where('jenis_bank',$transaksi->metode_pembayaran)->first(),
            'total_transfer' => $transaksi->total_harga+1000
        ]);
    }
}
