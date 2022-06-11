<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\TheLoai;
class IndexController extends Controller
{
    public function home()
    {   $theloai  = TheLoai::orderBy('id','desc')->get();
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
        $truyen = Truyen::orderBy('id','desc')->where('kichhoat',1)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai'));
    }
    public function danhmuc($slug){
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
       
        $danhmuc_id = DanhMucTruyen::where('slug_danhmuc',$slug)->first(); 

        $theloai  = TheLoai::orderBy('id','desc')->get();
        $truyen = Truyen::orderBy('id','desc')->where('kichhoat',1)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','danhmuc_id','theloai'));
    }
    public function xemtruyen($slug){
        $theloai  = TheLoai::orderBy('id','desc')->get();
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();

        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',1)->first();

        $chapter = Chapter::with('truyen')-> orderBy('id','desc')->where('truyen_id',$truyen->id)->where('kichhoat',1)->get();
        
        $chapter_dau = Chapter::with('truyen')-> orderBy('id','ASC')->where('truyen_id',$truyen->id)->where('kichhoat',1)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->where('kichhoat',1)->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai'));
    }
    public function xemchapter($slug){
        $theloai  = TheLoai::orderBy('id','desc')->get();
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
        
        $truyen = Chapter::where('slug_chapter',$slug)->where('kichhoat',1)->first();

        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->where('kichhoat',1)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id','desc')->where('truyen_id',$truyen->truyen_id)->where('kichhoat',1)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$truyen->id)->where('kichhoat',1)->min('slug_chapter');
        
        $prev_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$truyen->id)->where('kichhoat',1)->max('slug_chapter');
        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','next_chapter','prev_chapter','theloai'));
    }
    public function xemtheloai($slug){
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
        
        $theloai = TheLoai::orderBy('id','desc')->get();
       
        $theloai_id = TheLoai::where('slug_theloai',$slug)->first(); 

       
        $truyen = Truyen::orderBy('id','desc')->where('kichhoat',1)->where('theloai_id',$theloai_id->id)->get();

         return view('pages.theloai')->with(compact('danhmuc','truyen','theloai_id','theloai'));
    }
}
