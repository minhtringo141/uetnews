<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
class TinTucController extends Controller
{
  public function getDanhSach(){
    $tintuc = TinTuc::orderBy('id', 'DESC')->get();
    return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);

  }

  public function getThem(){
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
  }

  public function postThem(Request $request){
    $this->validate($request, [
      'loaitin'=>'required',
      'tieude'=>'required|min:3|unique:tintuc,tieude',
      'tomtat'=>'required',
      'noidung'=>'required'
    ], [
      'LoaiTin.required'=>'Bạn chưa chọn loại tin !',
      'TieuDe.required'=>'Bạn chưa nhập tiêu đề !',
      'TieuDe.min'=>'Tiêu đề phải có trên 3 kí tự !',
      'TieuDe.unique'=>'Tiêu đề đã tồn tại !',
      'TomTat.required'=>'Bạn chưa nhập tóm tắt !',
      'NoiDung.required'=>'Bạn chưa nhập nội dung !'

    ]);
    $tintuc = new TinTuc();
    $tintuc->TieuDe = $request->tieude;
    $tintuc->TieuDeKhongDau = changeTitle($request->tieude);
    $tintuc->idLoaiTin = $request->loaitin;
    $tintuc->TomTat = $request->tomtat;
    $tintuc->NoiDung = $request->noidung;
    $tintuc->SoLuotXem = 0;
    $tintuc->NoiBat = $request->NoiBat;

    if($request->hasFile('hinh')){
      $file = $request->file('hinh');
      $duoi = $file->getClientOriginalExtension();
      if($duoi != 'jpg' && $duoi != 'png'&& $duoi !='jpeg'){
        return redirect('admin/tintuc/them')->with('loi', 'Bạn chỉ được chọn file có đuôi là jpg, png và jpeg !');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("upload/tintuc/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      $file->move('upload/tintuc', $Hinh);
      $tintuc->Hinh = $Hinh;
    }else{
      $tintuc->Hinh = "";
    }
    $tintuc->save();
    return redirect('admin/tintuc/them')->with('thongbao', 'Bạn đã thêm thành công !');


  }

  public function getSua($id){
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    $tintuc = TinTuc::find($id);
    return view('admin.tintuc.sua', ['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
  }

  public function postSua(Request $request, $id){
    $tintuc = TinTuc::find($id);
    $this->validate($request, [
      'loaitin'=>'required',
      'tieude'=>'required|min:3|unique:tintuc,tieude',
      'tomtat'=>'required',
      'noidung'=>'required'
    ], [
      'LoaiTin.required'=>'Bạn chưa chọn loại tin !',
      'TieuDe.required'=>'Bạn chưa nhập tiêu đề !',
      'TieuDe.min'=>'Tiêu đề phải có trên 3 kí tự !',
      'TieuDe.unique'=>'Tiêu đề đã tồn tại !',
      'TomTat.required'=>'Bạn chưa nhập tóm tắt !',
      'NoiDung.required'=>'Bạn chưa nhập nội dung !'

    ]);

    $tintuc->TieuDe = $request->tieude;
    $tintuc->TieuDeKhongDau = changeTitle($request->tieude);
    $tintuc->idLoaiTin = $request->loaitin;
    $tintuc->TomTat = $request->tomtat;
    $tintuc->NoiDung = $request->noidung;
    
    if($request->hasFile('hinh')){
      $file = $request->file('hinh');
      $duoi = $file->getClientOriginalExtension();
      if($duoi != 'jpg' && $duoi != 'png'&& $duoi !='jpeg'){
        return redirect('admin/tintuc/them')->with('loi', 'Bạn chỉ được chọn file có đuôi là jpg, png và jpeg !');
      }
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("upload/tintuc/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      $file->move('upload/tintuc', $Hinh);
      unlink("upload/tintuc/".$tintuc->Hinh);
      $tintuc->Hinh = $Hinh;
    }
    $tintuc->save();
    return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công !');

  }

  public function getXoa($id){
    $tintuc = TinTuc::find($id);
    $tintuc->delete();

    return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa thành công !');
  }



}
