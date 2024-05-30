@extends('admin.layout')

@section('content')
	
	<div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">{{$title}} </h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">
                	<div class="row">
	                	<div class="col-md-2">
	                		Select Program
	                	</div>
	                	<div class="col-md-9">
	                		<button class="btn btn-md btn-outline-primary btn-rounded">BS Hons Program</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded">Associate Degree - ADP</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded">Intermediate</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded">Middle & High School</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded">Dars a Nizami</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded">Tahfeez ul Quran</button>
	                		<button class="btn btn-md btn-outline-primary btn-rounded mt-2">Tution Academy</button>
	                	</div>
	                </div>
	                <div class="row mt-2">
	                	<div class="col-md-2">
	                		Select Institute
	                	</div>
	                	<div class="col-md-10">
	                		<button class="btn btn-md btn-outline-secondary btn-rounded">Hizb ur Rahman Islamic Science College</button>
	                		<button class="btn btn-md btn-outline-secondary btn-rounded">Hizb ur Rahman Islamic Science College for Women</button>
	                	</div>
	                </div>
	                <div class="row mt-2">
	                	<div class="col-md-2">
	                		Select Session
	                	</div>
	                	<div class="col-md-9">
	                		<button class="btn btn-md btn-outline-secondary btn-rounded">2023 - 2025</button>
	                		<button class="btn btn-md btn-outline-secondary btn-rounded">2022 - 2024</button>
	                		<button class="btn btn-md btn-outline-secondary btn-rounded">2021 - 2023</button>
	                	</div>
	                </div>
	                <div class="row mt-5">
	                	<div class="col-md-2"></div>
	                	<div class="col-md-9 pb-3" style="background-color: #fff;padding-left: 0;padding-right: 0;">
	                		<table class="table">
	                			<thead>
	                				<tr>
	                					<th>ADMISSION #</th>
	                					<th>STUDENT NAME</th>
	                					<th>FATHER NAME</th>
	                					<th>PHONE</th>
	                					<th>DUES</th>
	                					<th>VIEW</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<tr>
	                					@if(!empty($student))
	                					<td></td>
	                					<td></td>
	                					<td></td>
	                					<td></td>
	                					<td></td>
	                					@else
	                					<span>No Data Found.</span>
	                					@endif
	                				</tr>
	                			</tbody>
	                		</table>
	                		{{$student->links()}}
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

@endsection