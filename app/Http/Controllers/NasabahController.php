<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Nasabah',
            'menuNasabah' => 'active',
        ];
         return view('admin/nasabah/index',$data);
    }
}
