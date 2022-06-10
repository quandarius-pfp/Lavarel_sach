<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
class IndexController extends Controller
{
    public function home()
    {   
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
        $truyen = Truyen::orderBy('id','desc')->where('kichhoat',1)->get();
        return view('pages.home')->with(compact('danhmuc','truyen'));
    }
    public function danhmuc($slug){
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
       
        $danhmuc_id = DanhMucTruyen::where('slug_danhmuc',$slug)->first(); 

        
        $truyen = Truyen::orderBy('id','desc')->where('kichhoat',1)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','danhmuc_id'));
    }
    public function xemtruyen($slug){
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();

        $truyen = Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',1)->first();

        $chapter = Chapter::with('truyen')-> orderBy('id','desc')->where('truyen_id',$truyen->id)->where('kichhoat',1)->get();
        
        $chapter_dau = Chapter::with('truyen')-> orderBy('id','ASC')->where('truyen_id',$truyen->id)->where('kichhoat',1)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->where('kichhoat',1)->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau'));
    }
    public function xemchapter($slug){
        $danhmuc  = DanhMucTruyen::orderBy('id','desc')->get();
        return view('pages.chapter');
    }
}
