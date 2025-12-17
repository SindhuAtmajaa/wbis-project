<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'menuNasabah' => 'active',
        ];
        // return view('admin/user/index',$data); nanti diganti foldernya karena ini fitur global bukan admin, berarti masuknya karyawan
    }
}
