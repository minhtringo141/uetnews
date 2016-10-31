<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\LoaiTin;
use App\Slide;

class SlideController extends Controller
{
  public function getDanhSach(){
    $slide = Slide::all();
    return view('admin.slide.danhsach', ['slide'=>$slide]);
  }

  public function getThem(){
    return view('admin.slide.them');
  }

  public function postThem(Request $request){
    $this->validate($request, [
      'ten' => 'required',
      'noidung' => 'required',
      ], [
      'ten.required'=>'Bạn chưa nhập tên',
      'noidung.required'=>'Bạn chưa nhập nội dung'
      ]);
    $slide = new Slide;
    $slide->Ten = $request->ten;
    $slide->NoiDung = $request->noidung;
    if($request->has('link')){
      $slide->link = $request->link;
    }

    if($request->hasFile('hinh')){
      $file = $request->file('hinh');
      $duoi = $file->getClientOriginalExtension();
      if($duoi != 'jpg' && $duoi != 'png'&& $duoi !='jpeg'){
        return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được chọn file có đuôi là jpg, png và jpeg !');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("upload/slide/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      $file->move('upload/slide', $Hinh);
      $slide->Hinh = $Hinh;
    }else{
      $slide->Hinh = "";
    }
    $slide->save();
    return redirect('admin/slide/them')->with('thongbao','Thêm thành công !');

  }

  public function getSua($id){
    $slide = Slide::find($id);
    return view('admin.slide.sua', ['slide'=>$slide]);
  }

  public function postSua(Request $request, $id){
    $this->validate($request, [
      'ten' => 'required',
      'noidung' => 'required',
      ], [
      'ten.required'=>'Bạn chưa nhập tên',
      'noidung.required'=>'Bạn chưa nhập nội dung'
      ]);
    $slide = Slide::find($id);
    $slide->Ten = $request->ten;
    $slide->NoiDung = $request->noidung;
    if($request->has('link')){
      $slide->link = $request->link;
    }

    if($request->hasFile('hinh')){
      $file = $request->file('hinh');
      $duoi = $file->getClientOriginalExtension();
      if($duoi != 'jpg' && $duoi != 'png'&& $duoi !='jpeg'){
        return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được chọn file có đuôi là jpg, png và jpeg !');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("upload/slide/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      unlink('upload/slide/'.$slide->Hinh);
      $file->move('upload/slide', $Hinh);
      $slide->Hinh = $Hinh;
    }
    $slide->save();
    return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công !');
  }

  public function getXoa($id){
    $slide = Slide::find($id);
    $slide->delete();

    return redirect('admin/slide/danhsach')->with('thongbao', 'Xóa thành công !');
  }



}
