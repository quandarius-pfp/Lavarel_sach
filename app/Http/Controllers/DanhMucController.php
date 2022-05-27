<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $danhmuctruyen = DanhMucTruyen::orderBy('id','DESC')->get();
        return view ('admincp.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('admincp.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'tendanhmuc' => 'required|unique:tbl_danhmuc|max:255',
            'slug_danhmuc' => 'required|unique:tbl_danhmuc|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
           ],
           [
            'tendanhmuc.unique' => 'Tên Danh Mục Đã có , xin điền tên khác',
            'slug_danhmuc.unique' => 'SLUG Danh Mục Đã có , xin điền SLUG khác',
            'tendanhmuc.required' => 'Tên Danh Mục Phải có',
            'mota.required' => 'Mô tả danh mục phải có',
           ]
        
        );
        $data = $request->all();
        
        $danhmuctruyen = new DanhMucTruyen();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','Thêm Danh Mục Truyện Thành Công');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $danhmuc =  DanhMucTruyen::find($id);
         return view ('admincp.danhmuctruyen.edit')->with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'tendanhmuc' => 'required|max:255',
            'slug_danhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
           ],
           [
            'slug_danhmuc.required' => 'Slug Danh Mục Phải có',
            'tendanhmuc.required' => 'Tên Danh Mục Phải có',
            'mota.required' => 'Mô tả danh mục phải có',
           ]
        
        );
        $data = $request->all();
        
        $danhmuctruyen = DanhMucTruyen::find($id);
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','Cập Nhật danh mục truyện thành công Danh Mục Truyện Thành Công');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMucTruyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa Danh Mục Truyện Thành Công');
        
    }
}
