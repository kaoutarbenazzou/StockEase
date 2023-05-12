@extends('dashboard.body.main')


@section('specificpagestyles')
<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
@endsection

@section('specificpagescripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/litepicker.js') }}"></script>
@endsection

@section('content')
<header class="page-header pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                     <h1 class="page-header-title" > <!--style="color: black;" -->
                        <div class="page-header-icon " style="color: black;" ></div>
                        📉 Dashboard 
                    </h1>
                </div>
                
                <div  class="col-12 col-xl-auto mt-4">
                    <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                        <span class="input-group-text"><i class="fas fa-calendar-alt" style="color: black;"></i></span>
                        <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                        </div>
                        <button type="button" class="btn btn-outline-warning">⚠️ Give access to...</button>
                    
                
            </div>
        </div>
    </div>
</header>

<!-- *********  -->
<div class="container-xl px-4 mt-n10">

    <div class="row">
    <div class="col-lg-6 col-xl-3 mb-4">
            <div class="card" style="background-color: #66347F ; color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Tasks</div>
                            <div class="text-lg fw-bold">4</div>
                        </div>

                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="#">View </a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4">
        <div class="card" style="background-color: #5C469C ; color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Monthly Earnings</div>
                            <div class="text-lg fw-bold">12 600 MAD</div>
                        </div>

                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="#">View </a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 mb-4">
        <div class="card" style="background-color: #37306B ; color: white;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small" >Annual Earnings</div>
                            <div class="text-lg fw-bold">120 800 MAD</div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="#">View </a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-3 mb-4">
            <div class="card" style="background-color: #070A52; color: white;"> 
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-3">
                            <div class="text-white-75 small">Requests to Process</div>
                            <div class="text-lg fw-bold">3</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between small">
                    <a class="text-white stretched-link" href="#">View </a>
                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-6 mb-4">
    <div class="card card-header-actions bg-dark text-white h-100">
        <div class="card-header text-white">
            Earnings Graph
            <div class="dropdown no-caret">
                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                
                
                <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                
                    <a class="dropdown-item" href="#">Today</a>    
                        <a class="dropdown-item" href="#">Past Week</a>
                        <a class="dropdown-item" href="#">Past Month</a>
                        <a class="dropdown-item" href="#">Past Year</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart-area"><canvas id="TheAreaChart" width="100%" height="30"></canvas></div>
        </div>
    </div>
</div>

        <div class="col-xl-6 mb-4">
            <div class="card card-header-actions bg-dark text-white h-100">
                <div class="card-header">
                    Revenue Per Month
                    <div class="dropdown no-caret">
                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                        <a class="dropdown-item" href="#">Today</a>    
                        <a class="dropdown-item" href="#">Past Week</a>
                        <a class="dropdown-item" href="#">Past Month</a>
                        <a class="dropdown-item" href="#">Past Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-bar"><canvas id="TheBarChart" width="100%" height="30"></canvas></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
