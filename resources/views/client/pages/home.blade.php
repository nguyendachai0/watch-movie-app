@extends('client.layouts.layout')
@section('content')
<div class="content-body">
   <div class="container-fluid">
      <!-- Add Project -->
      <div class="modal fade" id="addProjectSidebar">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Create Project</h5>
                  <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="form-group">
                        <label class="text-black font-w500">Project Name</label>
                        <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="text-black font-w500">Deadline</label>
                        <input type="date" class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="text-black font-w500">Client Name</label>
                        <input type="text" class="form-control">
                     </div>
                     <div class="form-group">
                        <button type="button" class="btn btn-primary">CREATE</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
          <div class="row page-titles mx-0">
              <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                      <h4>Hi, welcome back!</h4>
                      <p class="mb-0">Your business dashboard template</p>
                  </div>
              </div>
              <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                  </ol>
              </div>
          </div>
          <div class="row">
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/1.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">Bonorum et Malorum</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                  </ul>
                                  <span class="price">$761.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/2.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">Striped Dress</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span class="price">$159.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/3.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">BBow polka-dot</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span class="price">$357.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/4.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">Z Product 360</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                  </ul>
                                  <span class="price">$654.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/5.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">Chair Grey</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span class="price">$369.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/6.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">fox sake withe</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span class="price">$245.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/7.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">Back Bag</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                  </ul>
                                  <span class="price">$364.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-sm-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="new-arrival-product">
                              <div class="new-arrivals-img-contnent">
                                  <img class="img-fluid" src="images/product/1.jpg" alt="">
                              </div>
                              <div class="new-arrival-content text-center mt-3">
                                  <h4><a href="ecom-product-detail.html">FLARE DRESS</a></h4>
                                  <ul class="star-rating">
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                      <li><i class="fa fa-star-half-empty"></i></li>
                                  </ul>
                                  <span class="price">$548.00</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    {{-- <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
     
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         @foreach($category_home as $key => $cate_home)
          <section id="halim-advanced-widget-2">
             <div class="section-heading">
                <a href="danhmuc.php" title="Phim Bộ">
                <span class="h-text">{{$cate_home->title}}</span>
                </a> 
             </div>
             <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            
               
               @foreach($cate_home->movie->take(12) as $key => $movie)
               
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('movie', $movie->slug)}}">
                         <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$movie->image)}}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                         @if($cate_home == 'Phim Bộ')
                         <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         @endif
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">{{$movie->title}}</p>
                               <p class="original_title">{{$movie->title}}</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                @endforeach
                
                
             </div>
          </section>
          <div class="clearfix"></div>
        @endforeach
       </main>
       <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
          <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
             <div class="section-bar clearfix">
                <div class="section-title">
                   <span>Top Views</span>
                   <ul class="halim-popular-tab" role="tablist">
                      <li role="presentation" class="active">
                         <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                      </li>
                      <li role="presentation">
                         <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                      </li>
                      <li role="presentation">
                         <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                      </li>
                      <li role="presentation">
                         <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                      </li>
                   </ul>
                </div>
             </div>
             <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                   <div class="halim-ajax-popular-post-loading hidden"></div>
                   <div id="halim-ajax-popular-post" class="popular-post">
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                      <div class="item post-37176">
                         <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                            <div class="item-link">
                               <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                               <span class="is_trailer">Trailer</span>
                            </div>
                            <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                         </a>
                         <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                         <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                         </div>
                      </div>
                     
                     
                   </div>
                </div>
             </section>
             <div class="clearfix"></div>
          </div>
       </aside>
    </div> --}}
@endsection