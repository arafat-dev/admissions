@extends('admin.layout')

@section('content')

@push('style')

    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/charts/c3charts/c3.css')}}">
    <style>
    	.mrev{
    		height: 27px;
    	}
    </style>
@endpush

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Reports </h2>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <!-- ============================================================== -->
              				                        <!-- product category  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
	                                <div class="col-12" style="margin: 5%;">
	                                    <h5> Total Student <span style="float:right;margin-right: 10%;">1124</span></h5>
	                                </div>
                                    <div class="card-body">
                                        <div class="ct-chart-category ct-golden-section" style="height: 215px;"></div>
                                        <div class="m-t-40">
                                            <li class="legend-item mr-3">
                                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-circle "></i></span>
                                                    <span class="legend-text">Female Student</span>
                                                    <span style="float:right">370</span>

                                            </li>
                                            <li class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-circle"></i></span>
                                            	<span class="legend-text">Male Student</span>
                                                <span style="float:right">230</span>
                                            </li>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">New Admission Report</h5>
                                        <div class="row">
                                        	<div class="col-md-4 col-sm-4">
                                        		<span>Today<br/>27</span>
                                        	</div>
                                        	<div class="col-md-4 col-sm-4">
                                        		<span>This Week<br/>156</span>
                                        	</div>
                                        	<div class="col-md-4 col-sm-4">
                                        		<span>This Month<br/>466</span>
                                        	</div>
                                        </div>
                                        <br/>
                                        <div class="progress">
										  <div class="progress-bar" role="progressbar" aria-valuenow="70"
										  aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    60%
										  </div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end product category  -->
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">

	                                <div class="col-12" style="margin: 5%;">
	                                    <h5> Student By Institutes</h5>
	                                </div>
                                    <div class="card-body">
                                        <div class="ct-chart-category_1 ct-golden-section" style="height: 380px;"></div>
                                        <div class="m-t-40">
                                            <li class="legend-item mr-3">
                                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-circle "></i></span>
                                                    <span class="legend-text">Islamic High School</span>
                                                    <span style="float: right;">327</span>
                                            </li>
                                            <li class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-circle"></i></span>
                                                <span class="legend-text">Islamic Science School</span>
                                                <span style="float: right;">227</span>
                                            </li>
                                            <li class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-circle"></i></span>
                                                <span class="legend-text">Tution Academy</span>
                                                <span style="float: right;">427</span>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <div >
		                                    <h5> Total Yearly Revenue <span style="float:right;margin-right: 10%;">2023</span></h5>
		                                </div>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><span class="" style="font-size: 11px;">Rs</span> 2300000</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <div>
		                                    <h5> Monthly Revenue <span style="float:right;margin-right: 10%;">2023</span></h5>
		                                </div>

                                        <div class="mrev">
		                                    <h5 class="text-muted"> December <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> November <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
                                        <div class="mrev">
		                                    <h5 class="text-muted"> September <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> August <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
                                        <div class="mrev">
		                                    <h5 class="text-muted"> July <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
                                        <div class="mrev">
		                                    <h5 class="text-muted"> June <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
                                        <div class="mrev">
		                                    <h5 class="text-muted"> May <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> April <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> March <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> February <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
		                                <div class="mrev">
		                                    <h5 class="text-muted"> January <span style="float:right;margin-right: 10%;"><small>Rs. </small>224622</span></h5>
		                                </div>
                                    </div>
                                </div>

                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <div class="col-12" style="margin: 5%;">
                                            <h5> This Month Status <span style="float:right;margin-right: 10%;">May 2023</span></h5>
                                        </div>
                                        <div class="progress">
										  <div class="progress-bar" role="progressbar" aria-valuenow="70"
										  aria-valuemin="0" aria-valuemax="100" style="width:70%">
										    70%
										  </div>
										</div>

                                        <div class="col-12" style="margin-top:15px;">
                                            <div class="mrev">
                                                <h5 class="text-muted"> Unpaid <span style="float:right;margin-right: 10%;"><small>Rs. </small>70000</span></h5>
                                            </div>
                                            <div class="mrev">
                                                <h5 class="text-muted"> Paid <span style="float:right;margin-right: 10%;"><small>Rs. </small>30000</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="m-0 m-auto d-table">
                             Copyright © 2018 Concept. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>

@endSection

@push('script-footer-graph')
    <!-- chart chartist js -->
    <script src="{{ asset('assets/admin/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('assets/admin/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{ asset('assets/admin/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('assets/admin/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
@endpush
