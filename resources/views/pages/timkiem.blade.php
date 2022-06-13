@extends('../layout')

@section('content')

<div class="p-3 mb-2 " style="background:  rgb(202, 216, 225)">
  <nav aria-label="breadcrumb  bg-secondary" >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item">Tìm Kiếm</li>
        <li class="breadcrumb-item active" aria-current="page">{{$tukhoa}}</li>
      </ol>
    </nav>
  
  
  </div>
<h3>Tìm Kiếm theo  :{{$tukhoa}} </h3>
            <div class="row">
              <div class="album py-5 bg-light">
                <div class="container">
                      @php 
                           $count = count($truyen);
                      @endphp
                      @if($count == 0)
                         
                      <div class="p-3 mb-2 bg-dark text-white"><p>Không tìm thấy truyện</p></div> 
                 @else 
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 ">
                      
                    

                    @foreach($truyen as $key => $value)
                    <div class="col">
                      <div class="card shadow-sm">
                        
                        <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}"> 
            
                        <div class="card-body">
                          <h4>{{$value->tentruyen}}</h4>
                          <p class="card-text">{{$value->tomtat}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc Ngay</a>
                              <a class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i> 512345</a>
                            </div>
                            <small class="text-muted">9 mins ago</small>
                          </div>
                        </div>
    
                      </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <a href="" style="float:right " class="btn btn-success mt-3">Xem Tất Cả</a>
                <div class="clearFix"></div>
              </div>
            </div>
         </div>
@endsection