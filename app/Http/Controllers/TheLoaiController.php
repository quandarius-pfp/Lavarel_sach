<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TheLoai = TheLoai::orderBy('id','DESC')->get();
        return view ('admincp.theloai.index')->with(compact('TheLoai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admincp.theloai.create');
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
            'tentheloai' => 'required|unique:tbl_theloai|max:255',
            'slug_theloai' => 'required|unique:tbl_theloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
           ],
           [
            'tentheloai.unique' => 'Tên Thể Loại Đã có , xin điền tên khác',
            'slug_theloai.unique' => 'SLUG Thể Loại Đã có , xin điền SLUG khác',
            'tentheloai.required' => 'Tên Thể Loại Phải có',
            'mota.required' => 'Mô tả thể loại phải có',
           ]
        
        );
        $data = $request->all();
        
        $theloai = new TheLoai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status','Thêm Thể Loại Truyện Thành Công');
        
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
        $theloai =  TheLoai::find($id);
        return view ('admincp.theloai.edit')->with(compact('theloai'));
   
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
            'tentheloai' => 'required|max:255',
            'slug_theloai' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
           ],
           [
            'slug_theloai.required' => 'Slug Danh Mục Phải có',
            'tentheloai.required' => 'Tên Danh Mục Phải có',
            'mota.required' => 'Mô tả danh mục phải có',
           ]
        
        );
        $data = $request->all();
        
        $danhmuctruyen = TheLoai::find($id);
        $danhmuctruyen->tentheloai = $data['tentheloai'];
        $danhmuctruyen->slug_theloai = $data['slug_theloai'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','Cập Nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status','Xóa Danh Mục Truyện Thành Công');
    }
}
