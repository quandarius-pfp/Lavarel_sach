@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt danh mục truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <table class="table table-dark  table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tên thể loại</th>
                              <th scope="col">Slug thể loại</th>
                              <th scope="col">Mô tả</th>
                              <th scope="col">Kích Hoạt</th>
                              <th scope="col">Quản lí</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($TheLoai as $key => $theloai)

                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$theloai->tentheloai}}</td>
                              <td>{{$theloai->slug_theloai}}</td>
                              <td>{{$theloai->mota}}</td>
                              <td>
                                @if($theloai->kichhoat == 1)
                                <p class="text-success">Kích Hoạt</p>
                                @else
                                <p class="text-danger">Không kích hoạt</p>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex">
                                <a href="{{route('theloai.edit',[$theloai->id])}}" class="btn btn-warning ">Edit</a>
                                  <form action="{{route('theloai.destroy',[$theloai->id])}}" method ="POST">
                                  @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger ms-2" onclick="return confirm('Bạn muốn xóa danh mục này hay không')">Delete</button>
                                </form></div>
                              </td>
                            </tr>
                            @endforeach
                            
                            
                          </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
