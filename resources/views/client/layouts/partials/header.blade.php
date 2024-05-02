<header>
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
            </a> --}}
            <a href="{{route('filterMovie')}}" class="nav-link">
                <i class='bx bx-filter'></i>              
                    <span class="nav-link-title">Lọc phim</span>
            </a>
           
        </div>
    </div>
</header>