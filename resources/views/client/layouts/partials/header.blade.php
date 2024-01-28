<header>
    <div class="nav container">
        <a href="{{route('homepage')}}" class="logo">
            Nghiện<span>Phim</span>           
        </a>

        <div class="search-box">
            <input type="search" name="" id="search-input" placeholder="Search movie">
            <i class="bx bx-search"></i>
        </div>
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
            @if(request()->is('/'))
            <a href="#popular" class="nav-link">
                <i class='bx bxs-hot'></i>
                <span class="nav-link-title">Phim hot</span>
            </a>
            @endif
            <a href="{{route('category','phim-le')}}" class="nav-link">
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
</header>