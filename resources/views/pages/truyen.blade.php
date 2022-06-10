@extends('../layout')
{{-- @section('slide')
   @include('pages.slide')
@endsection --}}
@section('content')
<div class="p-3 mb-2 " style="background:  rgb(202, 216, 225)">
<nav aria-label="breadcrumb  bg-secondary" >
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
  </nav>


</div>

<div class="row">
   <div class="col-md-9">
       <div class="row">
          <div class="col-md-3">
            <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/65216_laptop_asus_gaming_tuf_fa507r_4387.png')}}"> 
          </div>
          <div class="col-md-9">
                     <ul class="infotruyen"> 
                         <li>Tên Truyện : {{$truyen->tentruyen}}</li>
                         <li>Tác Giả : {{$truyen->tacgia}}</li>
                         <li>Danh mục chuyện : <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a> </li>
                         <li>Số Chapter: 200</li>
                         <li>Số Lượt xem</li>
                         <li><a href="#">Xem Mục lục</a></li>
                         <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc online</a></li>
                     </ul>
          </div>
        </div>
        <div class="col-md-12">
            <p>{{$truyen->tomtat}}</p>
        </div>
        <hr>
        <h4>Mục Lục</h4>
        <div class="col-md-9">
                  @php 
                        $count_mucluc = count($chapter)
                  @endphp
                  @if($count_mucluc > 0)
            <ul class="mucluctruyen">
                  
                @foreach($chapter as $key => $chap)

                <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                
            @endforeach
            </ul>
            @else
            <div class="p-3 mb-2 bg-light text-dark">Mục Lục đang cập nhật</div>
            @endif

       </div>
       <h4>Sách cùng danh mục</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
                 
                
                  
                @foreach($cungdanhmuc as $key => $value2)
                <div class="col">
                  <div class="card shadow-sm">
                    
                    <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$value2->hinhanh)}}"> 
        
                    <div class="card-body">
                      <h4>{{$value2->tentruyen}}</h4>
                      <p class="card-text">{{$value2->tomtat}}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="{{url('xem-truyen/'.$value2->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc Ngay</a>
                          <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 512345</a>
                        </div>
                        <small class="text-muted">9 mins ago</small>
                      </div>
                    </div>

                  </div>
                </div>
                @endforeach
      
                  

            </div>


   </div>
   <div class="col-md-3">
      <h3>Sách Hay xem nhiều</h3>
   </div>
</div>
@endsection