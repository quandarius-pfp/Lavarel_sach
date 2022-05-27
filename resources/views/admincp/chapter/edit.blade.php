@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật chapter truyện</div>
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
                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Chapter</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên danh mục . . . " name="tieude" value="{{$chapter->tieude}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Chapter</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_chapter" value="{{$chapter->slug_chapter}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm Tắt  Chapter</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả chapter . . ." name="tomtat" value="{{$chapter->tomtat}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội Dung Chapter</label>
                            <textarea class="form-control" rows="5" style="resize:none" name="noidung">{{$chapter->noidung}}</textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                            <select class="form-select" aria-label="Default select example" name="truyen_id">
                             
                                @foreach ($truyen  as  $key => $value) 
                                <option {{$chapter->truyen_id==$value->id ? 'selected' : ''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                        
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt Chapter</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                @if($chapter->kichhoat==1)
                                <option value="1" selected>Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                                @else
                                <option value="1" >Kích Hoạt</option>
                                <option value="2" selected>Không Kích Hoạt</option>
                                @endif
                        
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themchapter">Cập Nhật</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
