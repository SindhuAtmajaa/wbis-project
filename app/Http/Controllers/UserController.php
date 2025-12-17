<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Data User',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy('jabatan','desc')->get()
        ];
        return view('admin/user/index',$data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Tambah Data',
            'menuAdminUser' => 'active',
        ];
        return view('admin/user/create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|min:6|confirmed',
            'jabatan'   => 'required',
            'tgl_lahir' => 'required|date',
            'alamat'    => 'required',
            'no_hp'     => 'required|numeric',
        ],[
            'nama.required'      => 'Nama tidak boleh kosong',
            'email.required'     => 'Email tidak boleh kosong',
            'email.unique'       => 'Email sudah terdaftar',
            'password.required'  => 'Password tidak boleh kosong',
            'password.min'       => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password konfirmasi tidak sesuai',
            'jabatan.required'   => 'Jabatan harus dipilih',
            'tgl_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'alamat.required'    => 'Alamat tidak boleh kosong',
            'no_hp.required'     => 'Nomor HP tidak boleh kosong',
            'no_hp.numeric'      => 'Nomor HP harus berupa angka',
        ]);

        $user = new User;
        $user->nama      = $request->nama;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->password);
        $user->jabatan   = $request->jabatan;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->alamat    = $request->alamat;
        $user->no_hp     = $request->no_hp;
        $user->save();

        return redirect()->route('userCreate')->with('success', 'Data berhasil ditambahkan'); //kembali ke halaman sebelumnya dengan pesan sukses
    }

    public function edit($id)
    {
        $data = array(
            'title'         => 'Edit Data',
            'menuAdminUser' => 'active',
            'user'          => User::findOrFail($id),
        );
        return view('admin/user/edit', $data);
    }

     public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|unique:users,email,'.$id,
            'password'  => 'nullable|min:6|confirmed',
            'jabatan'   => 'required',
            'tgl_lahir' => 'required|date',
            'alamat'    => 'required',
            'no_hp'     => 'required|numeric',
        ],[
            'nama.required'      => 'Nama tidak boleh kosong',
            'email.required'     => 'Email tidak boleh kosong',
            'email.unique'       => 'Email sudah terdaftar',
            'jabatan.required'   => 'Jabatan harus dipilih',
            'tgl_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'alamat.required'    => 'Alamat tidak boleh kosong',
            'no_hp.required'     => 'Nomor HP tidak boleh kosong',
            'no_hp.numeric'      => 'Nomor HP harus berupa angka',
        ]);

        $user = User::FindOrFail($id);
        $user->nama      = $request->nama;
        $user->email     = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->jabatan   = $request->jabatan;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->alamat    = $request->alamat;
        $user->no_hp     = $request->no_hp;
        $user->save();

        return redirect()->route('user')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus'); //kembali ke halaman sebelumnya dengan pesan sukses
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new UserExport, 'Data User_'.$filename.'.xlsx');
    }

    public function pdf()
    {
        $data = array(
            'user' => user::get(),
            'date' => now()->format('d-m-Y_H.i.s'),
        );

        $filename = now()->format('d-m-Y_H.i.s');
        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->setPaper('A4', 'landscape')->stream('Data User_'.$filename.'.pdf'); //mengatur ukuran kertas A4 dan orientasi landscape
    }
}
