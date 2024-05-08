{{-- <header>
    <div class="nav container">
        <a href="{{route('homepage')}}" class="logo">
            Nghiện<span>Phim</span>           
        </a>
        <div class="search-container">
        <div class="search-box">
            <input type="search" name="" id="search-input" placeholder="Search movie">
            <i class="bx bx-search"></i>
        </div>
        <div id="box-dropdown">
            <ul id="dropdown-src"></ul>
        </div>
    </div>
        <script>
              var watchBaseUrl = "{{ url('xem-phim') }}";
            document.getElementById('search-input').addEventListener('input', function() {
                let query = this.value;
                let resultsDiv = document.getElementById('dropdown-src');
                if (query.length >= 3) {
                    fetch(`/search/suggestions?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            let resultsDiv = document.getElementById('dropdown-src');
                            resultsDiv.innerHTML = '';
                            data.forEach(movie => {
                                let linkItem = document.createElement('li');
                                let link = document.createElement('a');
                                link.href = link.href = watchBaseUrl + '/' + movie.slug;
                                link.textContent = movie.title;
                                linkItem.appendChild(link);
                                resultsDiv.appendChild(linkItem);
                            });
                        });
                }else {
                    let resultsDiv = document.getElementById('dropdown-src');
                    resultsDiv.innerHTML = '';
                }
            });
        </script>
        <div>
            @if(Auth::check())
            <a>{{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endif
    </div>
       
        <div class="navbar">
            <a href="{{route('homepage')}}" class="nav-link nav-active">
                <i class="bx bx-home"></i>
                <span class="nav-link-title">Trang chủ</span>
            </a>
            @foreach ($headerCategories as $category)
            <a href="{{route('category', $category->slug)}}" class="nav-link">
                @if($category->slug == 'single')
                <i class='bx bxs-movie'></i>
            @elseif($category->slug == 'series')
                <i class='bx bxs-tv'></i>
            @elseif($category->slug == 'hoat-hinh')
                <i class='bx bxs-hot'></i>
            @elseif($category->slug == 'tv-shows')
                <i class='bx bxs-tv'></i>
            @endif
                <span class="nav-link-title">{{$category->name}}</span>
            </a>
            @endforeach
            {{-- <a href="{{route('category','phim-le')}}" class="nav-link">
                <i class='bx bxs-movie'></i>
                <span class="nav-link-title">Phim lẻ</span>
            </a>
            <a href="{{route('category', 'phim-bo')}}" class="nav-link">
                <i class="bx bx-tv"></i>
                <span class="nav-link-title">Phim bộ</span>
            </a> 
            <a href="{{route('filterMovie')}}" class="nav-link">
                <i class='bx bx-filter'></i>              
                    <span class="nav-link-title">Lọc phim</span>
            </a>
           
        </div>
    </div>
</header> --}}
  <!-- Start Header Area -->
  <header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div>
                                <a href="" class="logo">
                                    NGHIEN<span>PHIM</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    
                                    @foreach($headerCategories as $category)
                                    <li>
                                        <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                    <li class="has-dropdown has-megaitem">
                                        <a href="">Thể loại<i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                @foreach($headerGenres as $genreChunk)
                                                <li class="mega-menu-item">
                                                    <ul class="mega-menu-sub">
                                                        @foreach($genreChunk as $genre)
                                                        <li><a href="{{route('genre', $genre->slug)}}">{{$genre->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                               @endforeach
                                              
                                               
                                            </ul>
                                            
                                        </div>
                                    </li>
                                   
                                    <li class="has-dropdown has-megaitem">
                                        <a href="">Quốc gia<i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                @foreach($headerNation as $nationChunk)
                                                <li class="mega-menu-item">
                                                    <ul class="mega-menu-sub">
                                                        @foreach($nationChunk as $nation)
                                                        <li><a href="{{route('country', $nation->slug)}}">{{$nation->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                               @endforeach
                                              
                                               
                                            </ul>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('filterMovie')}}">Lọc phim</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                           
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header Area -->

<!-- Start Mobile Header -->
<div class="mobile-header mobile-header-bg-color--golden section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="index.html">
                                <div class="logo">
                                    NGHIEN<span>PHIM</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--golden">
                      
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                                    
                    @foreach($headerCategories as $category)
                    <li>
                        <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                    
                    <li>
                        <a href=""><span>Thể loại</span></a>
                            <ul class="mobile-sub-menu">
                                @foreach($headerGenres as $genreChunk)
                                        @foreach($genreChunk as $genre)
                                        <li><a href="{{route('genre', $genre->slug)}}">{{$genre->name}}</a></li>
                                        @endforeach
                               @endforeach
                            </ul>
                    </li>
                   
                    <li>
                        <a href=""><span>Quốc gia</span></a>
                        <!-- Mega Menu -->
                            <ul class="mobile-sub-menu">
                                @foreach($headerNation as $nationChunk)
                                        @foreach($nationChunk as $nation)
                                        <li><a href="{{route('country', $nation->slug)}}">{{$nation->name}}</a></li>
                                        @endforeach
                               @endforeach            
                            </ul>                       
                    </li>
                    <li>
                        <a href="{{route('filterMovie')}}">Lọc phim</a>
                    </li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                NGHIEN<span>PHIM</span>
            </div>
        </div>
        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->


 <!-- Start Offcanvas Mobile Menu Section -->
 <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <div class="logo">
            NGHIEN<span>PHIM</span>
        </div>


    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<div class="offcanvas-overlay"></div>