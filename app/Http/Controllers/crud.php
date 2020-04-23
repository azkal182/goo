<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vocs;


class crud extends Controller
{
    public function index(){
     $hasil = User::all();
     return view('user',['liat'=>$hasil]);
  }

    public function voc(){
     $hasil = vocs::all();
     return view('voc',['voc'=>$hasil]);
  }
}
