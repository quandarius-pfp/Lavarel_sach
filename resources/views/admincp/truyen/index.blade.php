@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">Liệt kê truyện</div>

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
                              <th scope="col">Tên truyện</th>
                              <th scope="col">Hình ảnh</th>
                              <th scope="col">Slug truyện</th>
                              <th scope="col">Tóm tắt</th>
                              <th scope="col">Danh Mục</th>
                              <th scope="col">Thể Loại</th>
                              <th scope="col">Kích hoạt</th>
                              <th scope="col">Quản lí</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($list_truyen as $key => $truyen)

                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$truyen->tentruyen}}</td>
                              <td>
                                  <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="" width="200" height="150" style="object-fit: cover;">
                                </td>
                              <td>{{$truyen->slug_truyen}}</td>
                              <td>{{$truyen->tomtat}}</td>
                             
                              <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                               <td>{{$truyen->theloai->tentheloai}}</td>
                              <td>
                                @if($truyen->kichhoat == 1)
                                <p class="text-success">Kích Hoạt</p>
                                @else
                                <p class="text-danger">Không kích hoạt</p>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex">
                                <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-warning ">Edit</a>
                                  <form action="{{route('truyen.destroy',[$truyen->id])}}" method ="POST">
                                  @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger ms-2" onclick="return confirm('Bạn muốn xóa truyện này hay không')">Delete</button>
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
