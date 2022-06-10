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
                         <li>Tác Giả : YokoShima</li>
                         <li>Số Chapter: 200</li>
                         <li>Số Lượt xem</li>
                         <li><a href="#">Xem Mục lục</a></li>
                         <li><a href="" class="btn btn-primary">Đọc online</a></li>
                     </ul>
          </div>
        </div>
        <div class="col-md-12">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis neque maiores incidunt quas itaque laborum nobis illo dignissimos nulla, consequatur ex ratione necessitatibus ea ullam consectetur voluptatibus, quam magnam quasi inventore assumenda rem? Deserunt officia molestias consequuntur in modi quisquam quis reiciendis cum sit id tempore quasi voluptates accusamus iste cumque quaerat ut ipsum, aliquid assumenda. Ab eos exercitationem cupiditate sint in optio accusamus dolores, voluptatum, nostrum minima necessitatibus at excepturi alias asperiores mollitia libero hic, a temporibus ut! Commodi incidunt cumque aspernatur ab inventore quibusdam nam corrupti atque! Quisquam ratione sapiente eius ipsam laborum tempore, id nostrum, omnis natus aspernatur eligendi error velit enim atque blanditiis necessitatibus reiciendis optio? Sunt dolorem libero aperiam? Quasi harum sit nemo id similique, velit cumque odit doloremque quod repudiandae corporis quisquam porro maiores! Cupiditate blanditiis est architecto officiis doloribus minus nisi eveniet recusandae officia mollitia enim eos quis non adipisci alias aliquam provident, facere et amet maxime tempora quasi deserunt. Reprehenderit blanditiis vel in suscipit nesciunt rerum quisquam provident mollitia dolorum nihil odit a modi soluta, nobis qui quidem tempore vitae perferendis voluptatem? Aut consequatur beatae itaque nostrum recusandae reprehenderit impedit quia perspiciatis, tempore eum iste optio magnam exercitationem non est alias odio!</p>
        </div>
        <hr>
        <h4>Mục Lục</h4>
        <div class="col-md-9">
            <ul class="mucluctruyen">
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
                <li><a href="#">Phần 1 - chương 1</a></li>
               
            </ul>
            

       </div>
       <h4>Sách cùng danh mục</h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
                 
                <div class="col ">
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                      <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/65216_laptop_asus_gaming_tuf_fa507r_4387.png')}}"> 
          
                      <div class="card-body">
                        <h5>This is a wider card with supporting text</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                      </div>
                      </a>
                    </div>
                  </div>
                  <div class="col ">
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                      <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/65216_laptop_asus_gaming_tuf_fa507r_4387.png')}}"> 
          
                      <div class="card-body">
                        <h5>This is a wider card with supporting text</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                      </div>
                      </a>
                    </div>
                  </div>
                  <div class="col ">
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                      <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/65216_laptop_asus_gaming_tuf_fa507r_4387.png')}}"> 
          
                      <div class="card-body">
                        <h5>This is a wider card with supporting text</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                      </div>
                      </a>
                    </div>
                  </div>
                  <div class="col ">
                    <div class="card mb-4 shadow-sm">
                        <a href="">
                      <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/65216_laptop_asus_gaming_tuf_fa507r_4387.png')}}"> 
          
                      <div class="card-body">
                        <h5>This is a wider card with supporting text</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                      </div>
                      </a>
                    </div>
                  </div>
                  

            </div>


   </div>
   <div class="col-md-3">
      <h3>Sách Hay xem nhiều</h3>
   </div>
</div>
@endsection