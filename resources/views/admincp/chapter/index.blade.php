@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">Liệt kê chapter</div>

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
                              <th scope="col">Tên Chapter</th>
                              <th scope="col">Slug Chapter</th>
                              <th scope="col">Tóm tắt</th>
                              <th scope="col">Thuộc truyện</th>
                              <th scope="col">Kích Hoạt</th>
                              <th scope="col">Quản lí</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($chapter as $key => $chap)

                            <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$chap->tieude}}</td>
                              <td>{{$chap->slug_chapter}}</td>
                              <td>{{$chap->tomtat}}</td>
                              <td>{{$chap->truyen->tentruyen}}</td>
                              <td>
                                @if($chap->kichhoat == 1)
                                <p class="text-success">Kích Hoạt</p>
                                @else
                                <p class="text-danger">Không kích hoạt</p>
                                @endif
                              </td>
                              <td>
                                <div class="d-flex">
                                <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-warning ">Edit</a>
                                  <form action="{{route('chapter.destroy',[$chap->id])}}" method ="POST">
                                  @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger ms-2" onclick="return confirm('Bạn muốn xóa chapter truyện này hay không')">Delete</button>
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
