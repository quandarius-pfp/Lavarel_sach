@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chapter truyện</div>
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
                    <form method="POST" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Chapter</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên danh mục . . . " name="tieude" value="{{old('tieude')}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Chapter</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_chapter" value="{{old('slug_chapter')}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm Tắt  Chapter</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả chapter . . ." name="tomtat" value="{{old('tomtat')}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội Dung Chapter</label>
                            <textarea class="form-control" rows="5" style="resize:none" name="noidung" id="noidung_chapter"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                            <select class="form-select" aria-label="Default select example" name="truyen_id">
                             
                                @foreach ($truyen  as  $key => $value) 
                                <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                        
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt Chapter</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                <option value="1">Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                        
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themchapter">Thêm</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
