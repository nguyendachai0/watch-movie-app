@extends ('admin.layouts.admin')
@section('content')
<div class="content-body">
    <!-- <div class="form-head" style="background-image:url('images/background/bg3.jpg');background-position: bottom; ">
        <div class="container max d-flex align-items-center mt-0">
            <h2 class="font-w600 title text-white mb-2 mr-auto ">Dashboard</h2>
            <div class="weather-btn mb-2">
                <span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
                <select class="form-control style-1 default-select  mr-3 ">
                    <option>Medan, IDN</option>
                    <option>Jakarta, IDN</option>
                    <option>Surabaya, IDN</option>
                </select>
            </div>
            <a href="javascript:void(0);" class="btn white-transparent mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
        </div>
    </div> -->
    <div class="container-fluid">
        <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
            <h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
            <div class="weather-btn mb-2">
                <span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
                <select class="form-control style-1 default-select  mr-3 ">
                    <option>Medan, IDN</option>
                    <option>Jakarta, IDN</option>
                    <option>Surabaya, IDN</option>
                </select>
            </div>
            <a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <h2>Category</h2>
                        <h5 class="text-black mb-2 font-w600">{{$quantityCategory}}</h5>
                        <p class="mb-0 fs-14">
                            
                            <span class="text-success mr-1">45%</span>This week
                        </p>	
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                            <h2>Country</h2>
                        <h5 class="text-black mb-2 font-w600">{{$quantityCountry}}</h5>
                        <p class="mb-0 fs-13">
                            
                            <span class="text-success mr-1">45%</span>This week
                        </p>	
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <h2>Genre</h2>
                        <h5 class="text-black mb-2 font-w600">{{$quantityGenre}}</h5>
                        <p class="mb-0 fs-14">
                          
                            <span class="text-danger mr-1">45%</span>This week
                        </p>	
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 m-t35">
                <div class="card card-coin">
                    <div class="card-body text-center">
                        <h2>Movie</h2>
                        <h5 class="text-black mb-2 font-w600">{{$quantityMovie}}</h5>  
                                              <p class="mb-0 fs-14">
                            <span class="text-success mr-1">45%</span>This week
                        </p>	
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endsection