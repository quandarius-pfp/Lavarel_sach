    

<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          {{-- <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> --}}
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Admin</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">Quản lí danh mục</a>
              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Quản lí danh mục
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                  <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a></li>
                  <li><hr class="dropdown-divider"></li>
                
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Sách truyện
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm Sách truyện</a></li>
                  <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê Sách truyện</a></li>
                  <li><hr class="dropdown-divider"></li>
                
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Chapter
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm Chapter</a></li>
                  <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê Chapter</a></li>
                  <li><hr class="dropdown-divider"></li>
                
                </ul>
              </li>
            </ul>
            
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

</div>


