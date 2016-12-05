<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
  public function getXoa($id, $idTinTuc){
    $comment = Comment::find($id);
    $comment->delete();

    return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa comment thành công !');
  }

  public function postComment($id, Request $request){

  	$idTinTuc = $id;
  	$tintuc = TinTuc::find($id);
  	$comment = new Comment;
  	$comment->idTinTuc = $idTinTuc;
  	$comment->idUser = Auth::user()->id;
  	$comment->NoiDung = $request->noidung;
    if($request->noidung == ''){
      return redirect('tintuc/'.$id.'/'.$tintuc->TieuDeKhongDau.".html")->with('loi', 'Comment không được để trống !');
    }
  	$comment->save();
  	return redirect('tintuc/'.$id.'/'.$tintuc->TieuDeKhongDau.".html")->with('thongbao', "Viết bình luận thành công !");
  }


}
