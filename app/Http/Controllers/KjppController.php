<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kjppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar KJPP',
            'menuAdminKjpp' => 'active',
        ];
        return view('admin/kjpp/index',$data);
    }
}
