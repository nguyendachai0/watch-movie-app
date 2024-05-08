<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{isset($movie) ?  $movie->description : 'Phim Mới chất lượng cao miễn phí. Xem phim hd VietSub. Phim thuyết minh chất lượng HD. Kho phimmoi.net chuẩn nhanh online hay hấp dẫn.'}}">
    <meta name="keywords" content="{{isset($movie) ?  $movie->title. ',' .$movie->category->title : 'Phim Trung Quốc, Phim Hàn Quốc, Phim chiếu rạp, Phim hành động, Phim kinh di, Phim hài, Phim hoạt hình, Phim Mỹ, Phim Võ Thuật, Phim bộ hay nhất, Xem phim Online'}}">
    <meta name="author" content="Nguyen Dac Hai">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{isset($movie) ?  $movie->title : 'Nghiện phim'}} {{isset($cate_slug) ? ' - '.$cate_slug->title : ''}} </title>
    <link rel="icon" type="image/svg+xml" href="{{asset('assets/logo.svg')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/style.client.css')}}"> --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/lozad@1.14.0/dist/lozad.min.js"></script>
</head>

<body>
    @include('client.layouts.partials.header')
    @yield('content')
    {{-- <div class="next-page">
        <a href="" class="next-btn">Next-page</a>
    </div> --}}
    @include('client.layouts.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
</body>

</html>