@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa thể loại truyện</div>
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
                    <form method="POST" action="{{route('theloai.update',[$theloai->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Thể Loại</label>
                          <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" onkeyup="ChangeToSlug();"placeholder="Nhập tên danh mục . . . " name="tentheloai" value="{{$theloai->tentheloai}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Thể Loại</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_theloai" value="{{$theloai->slug_theloai}}">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục . . ." name="mota" value="{{$theloai->mota}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt danh mục</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                @if($theloai->kichhoat==1)
                                <option value="1" selected>Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                                @else
                                <option value="1" >Kích Hoạt</option>
                                <option value="2" selected>Không Kích Hoạt</option>
                                @endif
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themdanhmuc">Cập Nhât</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
