@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm  Thể Loại</div>
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
                    <form method="POST" action="{{route('theloai.store')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tên Thể Loại</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" onkeyup="ChangeToSlug();" id="slug" placeholder="Nhập tên thể loại . . . " name="tentheloai" value="{{old('tentheloai')}}" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug Thể Loại</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nhập  Slug . . . " name="slug_theloai" value="{{old('slug_theloai')}}" id="convert_slug">
                          </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả Thể Loại</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả Thể Loại . . ." name="mota" value="{{old('mota')}}">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích Hoạt thể loại</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                             
                                <option value="1">Kích Hoạt</option>
                                <option value="2">Không Kích Hoạt</option>
                        
                              </select>
                          </div>
                        
                        <button type="submit" class="btn btn-primary" name="themtheloai">Thêm</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
