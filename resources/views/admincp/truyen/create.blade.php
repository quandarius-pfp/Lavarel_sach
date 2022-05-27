
@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm  truyện</div>
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
                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên danh mục . . . " name="tentruyen" value="{{old('tentruyen')}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyen</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_truyen" value="{{old('slug_truyen')}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" rows="5" style="resize:none" name="tomtat"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh Mục chuyện</label>
                            <select class="form-select" aria-label="Default select example" name="danhmuc">
                                @foreach($danhmuc as $key => $muc)
                                <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                              </select>
                          </div>
                           
                     
                          
                            <div class="mb-3"> 
                               <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                                <input class="form-control" type="file" id="formFile" name="hinhanh">
                              </div>
                       

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                <option value="1">Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                        
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themtruyen">Thêm</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
