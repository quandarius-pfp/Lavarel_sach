@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Truyện </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên danh mục . . . " name="tentruyen" value="{{$truyen->tentruyen}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyen</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_truyen" value="{{$truyen->slug_truyen}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" rows="5" style="resize:none" name="tomtat">{{$truyen->tomtat}}</textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh Mục chuyện</label>
                            <select class="form-select" aria-label="Default select example" name="danhmuc">
                                @foreach($danhmuc as $key => $muc)
                                <option {{$muc->id==$truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                              </select>
                          </div>
                           
                     
                          
                            <div class="mb-3"> 
                               <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                                <input class="form-control" type="file" id="formFile" name="hinhanh">
                                <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="" width="200" height="150" style="object-fit: cover;" class="mt-3">
                              </div>
                       

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                @if($truyen->kichhoat==1)
                                <option value="1" selected>Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                                @else
                                <option value="1" >Kích Hoạt</option>
                                <option value="2" selected>Không Kích Hoạt</option>
                                @endif
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="capnhattruyen">Cập nhật Truyen</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
