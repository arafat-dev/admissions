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
                    <div class="card-body row">
                        <div class="col-2">
    	                	Select Program
    	                </div>
                        <div class="col-9">
                            <div class="row">
                                <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-md btn-outline-primary px-2 py-2 active font-weight-bold px-0" id="BSC-tab"
                                        data-toggle="tab" href="#BSC" role="tab" aria-controls="BSC"
                                        aria-selected="true">BS Hons Program</a>
                                </li>
                                <li class="nav-item ml-5">
                                    <a class="btn btn-md btn-outline-primary px-2 py-2  font-weight-bold px-0" id="ADP-tab"
                                        data-toggle="tab" href="#ADP" role="tab" aria-controls="ADP"
                                        aria-selected="true">Associate Degree - ADP</a>
                                </li>
                                <li class="nav-item ml-5">
                                    <a class="btn btn-md btn-outline-primary px-2 py-2  font-weight-bold px-0" id="HSC-tab"
                                        data-toggle="tab" href="#HSC" role="tab" aria-controls="HSC"
                                        aria-selected="true">Intermediate</a>
                                </li>
                                <li class="nav-item ml-5">
                                    <a class="btn btn-md btn-outline-primary px-2 py-2" id="SSC-tab" data-toggle="tab" href="#SSC"
                                        role="tab" aria-controls="SSC" aria-selected="true">Middle & High School</a>
                                </li>
                                
                                <li class="nav-item ml-5">
                                    <a class="" id="PaidReceipt-tab" data-toggle="tab" href="#PaidReceipt"role="tab" aria-controls="PaidReceipt" aria-selected="true"></a>
                                </li>
                                <li class="nav-item ml-5">
                                    <a class="" id="PaySlip-tab" data-toggle="tab" href="#PaySlip" role="tab" aria-controls="PaySlip" aria-selected="true"></a>
                                </li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-9 mt-5">
                            <div class="row">
            	                	<div class="col-md-12 pb-5" style="background-color: #fff;padding-left: 0;padding-right: 0;">
            	                		<div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade show active" id="BSC" role="tabpanel"
                                                aria-labelledby="PaySlip-tab">
                                                <div class="p-2 custom-card">
                                                    <h3 class="cstm-text-success py-3 px-3">Assign Tuition Academy Fees</h3>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-primary">DESCRIPTION</th>
                                                                    <th scope="col" class="text-primary">FEE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($bsc_fees as $key=>$value)
                                                                    <tr>
                                                                        <td><input class="form-control" type="" name="" style="width: 300px;border-radius: 5px;" value="{{ $value->name }}"> </td>
                                                                        <td>
                                                                            <input class="form-control" type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        {{ $value->fee }}">
                                                                         </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                        
                                                        
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="ADP" role="tabpane1"
                                                aria-labelledby="PaySlip-tab">
                                                <div class="p-2 custom-card">
                                                    <h3 class="cstm-text-success py-2">Assign Tuition Academy Fees</h3>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-primary">DESCRIPTION</th>
                                                                    <th scope="col" class="text-primary">FEE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($adp_fees as $key=>$value)
                                                                    <tr>
                                                                        <td><input class="form-control" type="" name="" style="width: 300px;border-radius: 5px;" value="{{ $value->name }}"> </td>
                                                                        <td>
                                                                            <input class="form-control" type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        {{ $value->fee }}">
                                                                         </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                        
                                                        
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="HSC" role="tabpane1"
                                                aria-labelledby="PaySlip-tab">
                                                <div class="p-2 custom-card">
                                                    <h3 class="cstm-text-success py-2">Assign Tuition Academy Fees</h3>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-primary">DESCRIPTION</th>
                                                                    <th scope="col" class="text-primary">FEE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($hsc_fees as $key=>$value)
                                                                    <tr>
                                                                        <td><input class="form-control" type="" name="" style="width: 300px;border-radius: 5px;" value="{{ $value->name }}"> </td>
                                                                        <td>
                                                                            <input class="form-control" type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        {{ $value->fee }}">
                                                                         </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                        
                                                        
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="SSC" role="tabpane1"
                                                aria-labelledby="PaySlip-tab">
                                                <div class="p-2 custom-card">
                                                    <h3 class="cstm-text-success py-2">Assign Tuition Academy Fees</h3>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" class="text-primary">DESCRIPTION</th>
                                                                    <th scope="col" class="text-primary">FEE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($ssc_fees as $key=>$value)
                                                                    <tr>
                                                                        <td><input class="form-control" type="" name="" style="width: 300px;border-radius: 5px;" value="{{ $value->name }}"> </td>
                                                                        <td>
                                                                            <input class="form-control" type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        {{ $value->fee }}">
                                                                         </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection