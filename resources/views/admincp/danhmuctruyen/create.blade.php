@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục truyện</div>
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
                    <form method="POST" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Danh Mục</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên danh mục . . . " name="tendanhmuc" value="{{old('tendanhmuc')}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Danh Mục</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_danhmuc" value="{{old('slug_danhmuc')}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục . . ." name="mota" value="{{old('mota')}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                <option value="1">Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                        
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
