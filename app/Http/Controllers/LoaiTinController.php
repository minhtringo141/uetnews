<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\LoaiTin;
class LoaiTinController extends Controller
{
  public function getDanhSach(){
    $loaitin = LoaiTin::all();
    return view('admin.loaitin.danhsach', ['loaitin'=>$loaitin]);
  }

  public function getThem(){
    $theloai = TheLoai::all();
    return view('admin.loaitin.them',['theloai'=>$theloai]);
  }

  public function postThem(Request $request){
    $this->validate($request,
    [
      'ten'=>'required|unique:loaitin,Ten|min:1|max:100',
      'theloai'=>'required'
    ],
    [
      'ten.required'=>'Bạn chưa nhập tên loại tin !',
      'ten.unique'=>"Tên loại tin đã tồn tại !",
      'ten.min'=>'Tên loại tin phải có độ dài từ 1->100 kí tự !',
      'ten.max'=>'Tên loại tin phải có độ dài từ 1->100 kí tự !',
      'theloai.required'=>'Bạn chưa chọn thể loại !'
    ]);

    $loaitin = new LoaiTin;
    $loaitin->Ten = $request->ten;
    $loaitin->TenKhongDau = changeTitle($request->ten);
    $loaitin->idTheLoai = $request->theloai;
    $loaitin->save();

    return redirect('admin/loaitin/them')->with('thongbao','Bạn đã thêm thành công !');

  }

  public function getSua($id){
    $loaitin = LoaiTin::find($id);
    $theloai = TheLoai::all();
    return view('admin.loaitin.sua', ['loaitin'=>$loaitin, 'theloai'=>$theloai]);
  }

  public function postSua(Request $request, $id){
    $this->validate($request,
    [
      'ten'=>'required|unique:loaitin,Ten|min:1|max:100',
      'theloai'=>'required'
    ],
    [
      'ten.required'=>'Bạn chưa nhập tên loại tin !',
      'ten.unique'=>"Tên loại tin đã tồn tại !",
      'ten.min'=>'Tên loại tin phải có độ dài từ 1->100 kí tự !',
      'ten.max'=>'Tên loại tin phải có độ dài từ 1->100 kí tự !',
      'theloai.required'=>'Bạn chưa chọn thể loại !'
    ]);
    $loaitin = LoaiTin::find($id);
    $loaitin->Ten = $request->ten;
    $loaitin->TenKhongDau = changeTitle($request->ten);
    $loaitin->idTheLoai = $request->theloai;
    $loaitin->save();

    return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công !');

  }

  public function getXoa($id){
    $loaitin = LoaiTin::find($id);
    $loaitin->delete();

    return redirect('admin/loaitin/danhsach')->with('thongbao', 'Bạn đã xóa thành công !');
  }



}
