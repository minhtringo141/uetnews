<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\Slide;
class PagesController extends Controller
{

	function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('theloai', $theloai);
		view()->share('slide', $slide);
	}
    function trangchu(){
    	// $theloai = TheLoai::all();
    	return view('pages.trangchu');
    }

    function lienhe(){
    	// $theloai = TheLoai::all();
    	return view('pages.lienhe');
    }
}
