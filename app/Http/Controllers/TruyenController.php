<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen')->orderBY('id','DESC')->get(); // lấy id danh mục truyện
        return view ('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
        return view ('admincp.truyen.create')->with(compact('danhmuc'));
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
            'tentruyen' => 'required|unique:tbl_truyen|max:255',
            'slug_truyen' => 'required|unique:tbl_truyen|max:255',
            'hinhanh'=>'required|image|mimes:jpeg,png,jpg,gif,svg,JPG|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'danhmuc' =>'required',
           ],
           [
            'tentruyen.unique' => 'Tên truyện Đã có , xin điền tên khác',
            'slug_truyen.unique' => 'SLUG truyện Đã có , xin điền SLUG khác',
            'tentruyen.required' => 'Tên truyện Phải có',
            'slug_truyen.required' => 'Slug truyện Phải có',
            'tomtat.required' => 'Mô tả truyện phải có',
            'hinhanh.reqiured' => 'Hình ảnh truyện phải có',
           ]
        
        );
        $data = $request->all();
        
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        /* them hinh anh */
        $get_image = $request->hinhanh;
        $path =   'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $truyen->hinhanh = $new_image;
        $truyen->save();
        return redirect()->back()->with('status','Thêm  Truyện Thành Công');
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
        $truyen = Truyen::find($id); // lấy id danh mục truyện 
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();         
        return view ('admincp.truyen.edit')->with(compact('truyen','danhmuc'));
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
            'tentruyen' => 'required|max:255',
            'slug_truyen' => 'required|max:255',
           
            'tomtat' => 'required',
            'kichhoat' => 'required',
            'danhmuc' =>'required',
           ],
           [
           
            'tentruyen.required' => 'Tên truyện Phải có',
            'slug_truyen.required' => 'Slug truyện Phải có',
            'tomtat.required' => 'Mô tả truyện phải có',
            
           ]
        
        );
        $data = $request->all();
        
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        /* them hinh anh */
        $get_image = $request->hinhanh;
        if($get_image){
           $path =   'public/uploads/truyen/';
           if(file_exists($path.$truyen->hinhanh)){
            unlink($path.$truyen->hinhanh);
           }
           $get_name_image = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name_image));
           $new_image =  $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
           $get_image->move($path,$new_image);
           $truyen->hinhanh = $new_image;
        }
        $truyen->save();
        return redirect()->back()->with('status','Cập Nhật truyện thành công  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/';
        if(file_exists($path.$truyen->hinhanh)){
            unlink($path.$truyen->hinhanh);
        }
            
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa  Truyện Thành Công');
    }
}
