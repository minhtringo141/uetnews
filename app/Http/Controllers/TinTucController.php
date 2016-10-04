<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TinTucController extends Controller
{
  public function getDanhSach(){
    return view('admin.tintuc.danhsach');
  }

  public function getSua(){
    return view('admin.tintuc.sua');
  }

  public function getThem(){
    return view('admin.tintuc.them');
  }
}
