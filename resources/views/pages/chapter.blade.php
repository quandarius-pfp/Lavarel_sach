@extends('../layout')
{{-- @section('slide')
   @include('pages.slide')
@endsection --}}
@section('content')
<div class="p-3 mb-2 " style="background:  rgb(202, 216, 225)">
  <nav aria-label="breadcrumb  bg-secondary" >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_br->danhmuctruyen->slug_danhmuc)}}">{{$truyen_br->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('xem-the-loai/'.$truyen_br->theloai->slug_theloai)}}">{{$truyen_br->theloai->tentheloai}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$chapter->truyen->slug_truyen)}}">{{$chapter->truyen->tentruyen}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li>
      </ol>
    </nav>
  
  
  </div>
<div class="container">
    <h2>{{$chapter->truyen->tentruyen}}</h2>
    <p>Chương Hiện tại: {{$chapter->tieude}}</p>
    <label for="">Chọn chương</label>
    
    <div class="col-md-5 d-flex" >
        @if ($prev_chapter)
           <a href="{{url('xem-chapter/'.$prev_chapter)}}" class="btn btn-primary">tập trước</a>  
         @else
         <button type="button" class="btn btn-secondary" disabled>tập trước</button> 
        @endif
      <div class="form-se">
       
       <select class="form-select select-chapter " aria-label="Default select example">
          @foreach($all_chapter as $key => $chap)
          <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
          @endforeach
       </select>
      </div>
      @if ($next_chapter)
           <a href="{{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary">tập sau</a>  
         @else
         <button type="button" class="btn btn-secondary" disabled>tập sau</button>
        @endif
    </div>
    <div class="content-truyen mt-5">
        <p>
            {!!$chapter->noidung!!}
        </p>
    </div>
    <div class="col-md-5 d-flex" >
      @if ($prev_chapter)
         <a href="{{url('xem-chapter/'.$prev_chapter)}}" class="btn btn-primary">tập trước</a>  
       @else
       <button type="button" class="btn btn-secondary" disabled>tập trước</button> 
      @endif
    <div class="form-se">
     
     <select class="form-select select-chapter " aria-label="Default select example">
        @foreach($all_chapter as $key => $chap)
        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
        @endforeach
     </select>
    </div>
    @if ($next_chapter)
         <a href="{{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary">tập sau</a>  
       @else
       <button type="button" class="btn btn-secondary" disabled>tập sau</button>
      @endif
  </div>
</div>

@endsection