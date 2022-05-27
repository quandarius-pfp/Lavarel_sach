<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\Chapter;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();  // lấy id danh mục truyện
       
         return view ('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $truyen = Truyen::orderBy('id','DESC')->get();
        return  view('admincp.chapter.create')->with(compact('truyen'));
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
            'tieude' => 'required|unique:tbl_chapter|max:255',
            'slug_chapter' => 'required|unique:tbl_chapter|max:255',
            'tomtat' => 'required',
            'noidung' => 'required',
            'kichhoat' => 'required',
            
           ],
           [
            'tieude.unique' => 'Tên chapter đã có , xin điền tên khác',
            'slug_chapter.unique' => 'SLUG chapter Đã có , xin điền SLUG khác',
            'tieude.required' => 'Tên chapter Phải có',
            'slug_chapter.required' => 'Slug chapter Phải có',
            'tomtat.required' => 'Mô tả chapter phải có',
            'noidung.reqiured' => 'Nội Dung chapter phải có',
           ]
        
        );
        $data = $request->all();
        
        $chapter = new chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        /* them hinh anh */
        
        $chapter->save();
        return redirect()->back()->with('status','Thêm  Chapter Thành Công');
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return  view('admincp.chapter.edit')->with(compact('truyen','chapter'));
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
            'tieude' => 'required|max:255',
            'slug_chapter' => 'required|max:255',
            'tomtat' => 'required',
            'noidung' => 'required',
            'kichhoat' => 'required',
            
           ],
           [
            'tieude.unique' => 'Tên chapter đã có , xin điền tên khác',
            'slug_chapter.unique' => 'SLUG chapter Đã có , xin điền SLUG khác',
            'tieude.required' => 'Tên chapter Phải có',
            'slug_chapter.required' => 'Slug chapter Phải có',
            'tomtat.required' => 'Mô tả chapter phải có',
            'noidung.reqiured' => 'Nội Dung chapter phải có',
           ]
        
        );
        $data = $request->all();
        
        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->truyen_id = $data['truyen_id'];
        /* them hinh anh */
        
        $chapter->save();
        return redirect()->back()->with('status','Cập Nhật Chapter Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status','Xóa Chapter Thành Công');
    }
}
