<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BiayaPengiriman;
use App\Models\DataTransaksi;
use App\Models\DetailPenjual;
use App\Models\Pencatatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardSellerController extends Controller
{
    public function dashboardPenjual()
    {
        return view('penjual.dashboardPenjual',
        [
            'title'=>'Dashboard Penjual'
        ]);
    }

    // Barang
    public function barang()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.barang',
        [
            'title'=>'Barang',
            'barang'=> Barang::where('penjual_id','=',$toko->id)
                    ->where('status','=','ready')->get()
        ]);
    }

    public function tambah()
    {
        return view('penjual.tambahBarang',
        [
            'title'=>'Tambah Barang'
        ]);
    }

    public function tambahBarang(Request $req)
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        $validated = $req->validate([
            'nama'=>'required|min:3',
            'harga'=>'required',
            'gambar'=>'required',
            'berat'=>'required',
            'kategori'=>'required',
            'stok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validated) {
            if ($req->hasFile('gambar')) {
                $barang = new Barang();
                $req->file('gambar')->move('barang/',date('YmdHis') . "." .$req->file('gambar')->getClientOriginalName());
                $barang->penjual_id=$toko->id;
                $barang->nama=$req->nama;
                $barang->harga=$req->harga;
                $barang->gambar=date('YmdHis') . "." .$req->file('gambar')->getClientOriginalName();
                $barang->berat=$req->berat;
                $barang->kategori=$req->kategori;
                $barang->stok=$req->stok;
                $barang->detail_produk=$req->deskripsi;
                $barang->save();
                return to_route('barang')->with('message','Barang berhasil ditambahkan');
            }
        }
    }

    public function edit($id)
    {
        return view('penjual.editBarang',
        [
            'title'=> 'Edit Barang',
            'barang'=>Barang::find($id)
        ]);
    }

    public function editBarang(Request $req,$id)
    {
        $validated = $req->validate([
            'nama'=>'required|min:3',
            'harga'=>'required',
            'gambar'=>'required',
            'berat'=>'required',
            'kategori'=>'required',
            'stok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validated) {
            if ($req->hasFile('gambar')) {
                $barang = Barang::find($id);
                $req->file('gambar')->move('barang/',date('YmdHis') . "." .$req->file('gambar')->getClientOriginalName());
                $barang->nama=$req->nama;
                $barang->harga=$req->harga;
                $barang->gambar=date('YmdHis') . "." .$req->file('gambar')->getClientOriginalName();
                $barang->berat=$req->berat;
                $barang->kategori=$req->kategori;
                $barang->stok=$req->stok;
                $barang->detail_produk=$req->deskripsi;
                $barang->save();
                return to_route('barang')->with('message','Barang berhasil diedit');
            }
        }
    }

    // public function hapusBarang($id)
    // {
    //     $barang = Barang::find($id);
    //     unlink("barang/".$barang->gambar);
    //     $barang->delete();
    //     return back()->with('message','Barang berhasil dihapus');
    // }

    public function hapusBarang($id)
    {
        $barang = Barang::find($id);
        $barang->status='discontinue';
        $barang->save();
        return back()->with('message','Barang berhasil dihapus, untuk membatalkan cek menu arsip');
    }
    
    
    public function arsipBarang()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.arsipBarang',
        [
            'title' => 'Arsip Barang',
            'barang'=> Barang::where('penjual_id','=',$toko->id)
            ->where('status','=','discontinue')->get()
        ]);
    }

    public function pulihkanBarang($id)
    {
        $barang = Barang::find($id);
        $barang->status='ready';
        $barang->save();
        return back()->with('message','Barang berhasil dipulihkan, silahkan cek menu barang');
    }

    // Profile
    public function resetPassword()
    {
        return view('penjual.resetPassword',
        [
            'title' => 'Reset Password'
        ]);
    }

    public function prosesReset(Request $req)
    {
        $validated = $req->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);
        if ($validated and $req->password == $req->new_password) {
            User::where('id', Auth::user()->id)
                ->update(['password' => Hash::make($req->new_password)]);
                return back()->with('message','Password berhasil direset');
        }
        else {
            return back();
        }
    }

    public function profile()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.profilePenjual',
        [
            'title' => 'Profile',
            'toko' => $toko
        ]);
    }

    public function editProfile()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        return view('penjual.editProfilePenjual',
        [
            'title' => 'Edit Profile',
            'toko' => $toko
        ]);
    }

    public function prosesEditProfile(Request $req)
    {
        $current_toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        $validated = $req->validate([
            'email' => ['required', 'unique:users,email,'.Auth::user()->id],
            'username' => ['required', 'min:4', 'unique:users,username,'.Auth::user()->id],
            'nomor_telepon' => ['required', 'unique:users,nomor_telepon,'.Auth::user()->id],
            'nama' => ['required'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],

            'nama_toko' => ['required', 'unique:detail_penjual,nama_toko,'.$current_toko->id],
            'alamat_toko' => ['required'],
            'deskripsi_toko' => ['required'],

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
            
            DetailPenjual::where('id',$current_toko->id)
                        ->update(
                            [
                                'nama_toko' => $req->nama_toko,
                                'alamat_toko' => $req->alamat_toko,
                                'deskripsi_toko' => $req->deskripsi_toko
                            ]);

            return redirect('/profilePenjual')->with('message','Profile berhasil diupdate');
        }
        else {
            return back();
        }
    }

    // Pengiriman
    public function pengiriman()
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();
        $biaya_pengiriman = BiayaPengiriman::where('penjual_id',$toko->id)->get();
        return view('penjual.pengirimanBarang',
    [
        'title' => 'Pengiriman',
        'transaksi' => DataTransaksi::where('penjual_id',$toko->id)->get(),
        'biaya_pengiriman' => $biaya_pengiriman
    ]);
    }

    public function tambahBiaya()
    {
        return view('penjual.tambahBiayaPengiriman',
        [
            'title' => 'Tambah Biaya Pengiriman',
        ]);
    }

    public function tambahBiayaPengiriman(Request $req)
    {
        $toko = DetailPenjual::where('user_id',Auth::user()->id)->first();

        $validated = $req->validate([
            'jarak_awal' => ['required'],
            'jarak_akhir' => ['required'],
            'harga' => ['required'],
        ]);

        if ($validated) {
            $biaya = new BiayaPengiriman();
            $biaya->penjual_id=$toko->id;
            $biaya->jarak=$req->jarak_awal.' - '.$req->jarak_akhir;
            $biaya->harga=$req->harga;
            $biaya->save();
            return redirect('/dashboardPenjual/pengiriman')->with('messsage','Biaya berhasil ditambahkan');
        }
    }

    public function editBiaya($id)
    {
        $res = str_ireplace('- ', '', BiayaPengiriman::find($id)->jarak);
        $result = explode(" ",$res);

        return view('penjual.editBiayaPengiriman',
        [
            'title'=> 'Edit Biaya Pengiriman',
            'biaya'=> BiayaPengiriman::find($id),
            'jarak'=> $result
        ]);
    }

    public function editBiayaPengiriman(Request $req)
    {
        $validated = $req->validate([
            'jarak_awal' => ['required'],
            'jarak_akhir' => ['required'],
            'harga' => ['required'],
        ]);

        if ($validated) {
            $biaya = BiayaPengiriman::find($req->id);
            $biaya->jarak=$req->jarak_awal.' - '.$req->jarak_akhir;
            $biaya->harga=$req->harga;
            $biaya->save();
            return redirect('/dashboardPenjual/pengiriman')->with('messsage','Biaya berhasil diedit');
        }
    }

    public function hapusBiaya($id)
    {
        $biaya = BiayaPengiriman::find($id);
        $biaya->delete();
        return back()->with('messsage','Biaya berhasil dihapus');
    }

    public function detailTransaksi($id)
    {
        return view('penjual.detailTransaksi',
        [
            'title'=> 'Edit Barang',
            'transaksi'=>DataTransaksi::find($id)
        ]);
    }

    public function konfirmasiTransaksi($id)
    {
        DataTransaksi::where('id',$id)
        ->update(['status_transaksi'=>'Sedang Dikirim']);
        return redirect('/dashboardPenjual/pengiriman')->with('message','Pesanan berhasil dikonfirmasi');
    }

    // Pencatatan
    public function pencatatan()
    {
        return view('penjual.pencatatan',
    [
        'title' => 'Pencatatan',
        'catatan' => Pencatatan::where('penjual_id',Auth::user()->id)->get()
    ]);
    }

    public function tambahCatatan()
    {
        return view('penjual.tambahCatatan',
    [
        'title' => 'Tambah Catatan',
        'barang' => Barang::where('penjual_id',Auth::user()->id)->get()
    ]);
    }
    public function prosesTambahCatatan(Request $req)
    {
        $validated = $req->validate([
            'barang_id' => ['required'],
            'terjual' => ['required'],
            'penghasilan' => ['required'],
            'tanggal' => ['required'],
        ]);

        if ($validated) {
            $catatan = new Pencatatan();
            $catatan->penjual_id=$req->id;
            $catatan->barang_id=$req->barang_id;
            $catatan->stok_terjual=$req->terjual;
            $catatan->penghasilan=$req->penghasilan;
            $catatan->tanggal=$req->tanggal;
            $catatan->save();
            return redirect('/dashboardPenjual/pencatatan')->with('message','Catatan berhasil ditambahkan');
        }
    }
    public function editCatatan($id)
    {
        return view('penjual.editCatatan',
    [
        'title' => 'Tambah Catatan',
        'catatan' => Pencatatan::where('id',$id)->first(),
        'barang' => Barang::where('penjual_id',Auth::user()->id)->get()
    ]);
    }
    public function prosesEditCatatan(Request $req)
    {
        $validated = $req->validate([
            'barang_id' => ['required'],
            'terjual' => ['required'],
            'penghasilan' => ['required'],
            'tanggal' => ['required'],
        ]);

        if ($validated) {
            $catatan = Pencatatan::find($req->id);
            $catatan->penjual_id=$req->id;
            $catatan->barang_id=$req->barang_id;
            $catatan->stok_terjual=$req->terjual;
            $catatan->penghasilan=$req->penghasilan;
            $catatan->tanggal=$req->tanggal;
            $catatan->save();
            return redirect('/dashboardPenjual/pencatatan')->with('message','Catatan berhasil ditambahkan');
        }
    }

    public function hapusCatatan($id)
    {
        # code...
    }
}
