<header>
    <div class="nav container">
        <a href="index.html" class="logo">
            Movie<span>Vel</span>
        </a>

        <div class="search-box">
            <input type="search" name="" id="search-input" placeholder="Search movie">
            <i class="bx bx-search"></i>
        </div>
        <a href="#" class="user">
            <img src="{{asset('img/user.jpg')}}" alt="user image" class="user-img">
        </a>
        <div class="navbar">
            <a href="{{route('home')}}" class="nav-link nav-active">
                <i class="bx bx-home"></i>
                <span class="nav-link-title">Trang chủ</span>
            </a>
            <a href="#home" class="nav-link">
                <i class='bx bxs-hot'></i>
                <span class="nav-link-title">Phim hot</span>
            </a>
            <a href="#home" class="nav-link">
                <i class='bx bxs-movie'></i>
                <span class="nav-link-title">Phim lẻ</span>
            </a>
            <a href="#home" class="nav-link">
                <i class="bx bx-tv"></i>
                <span class="nav-link-title">Phim bộ</span>
            </a>
            <a href="#home" class="nav-link">
                <i class='bx bx-filter'></i>              
                    <span class="nav-link-title">Lọc phim</span>
            </a>
           
        </div>
    </div>
</header>