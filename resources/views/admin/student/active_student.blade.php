@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">{{ $title }} </h2>
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

                        <div class="col-md-10">
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($programTypes as $programType)
                                    <a href="{{ route('admin.student.active',['program' => $programType->id,'session' => request('session'),'gender' => request('gender')])}}" class="programBtn {{ request('program') == $programType->id ? 'active' : ''}}">
                                        {{ $programType->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- institute -->
                    <div class="row mt-2">
                        <div class="col-md-2">
                            Select Institute
                        </div>
                        <div class="col-md-10">
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('admin.student.active',['program' => request('program'),'session' => request('session'),'gender' => 'male'])}}" class="instituteBtn {{ request('gender') == 'male' ? 'active' : ''}}">
                                    Hizb ur Rahman Islamic Science College
                                </a>
                                <a href="{{ route('admin.student.active',['program' => request('program'),'session' => request('session'),'gender' => 'female'])}}" class="instituteBtn {{ request('gender') == 'female' ? 'active' : ''}}">
                                    Hizb ur Rahman Islamic Science College for Women
                                </a>

                            </div>

                        </div>
                    </div>

                    <!-- session -->
                    <div class="row mt-2">
                        <div class="col-md-2">
                            Select Session
                        </div>

                        <div class="col-md-10">
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($sessions as $session)
                                <a href="{{ route('admin.student.active',['program' => request('program'),'session' => $session->id,'gender' => request('gender')])}}" class="instituteBtn {{ request('session') == $session->id ? 'active' : ''}}">
                                    {{ $session->name }}
                                </a>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-2"></div>

                        <div class="col-md-10 pb-3">
                            <div class="card card-body pt-0">
                                <div class="table-responsive">

                                    <table class="table table-striped studentTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 120px">ADMISSION #</th>
                                                <th style="min-width: 120px">STUDENT NAME</th>
                                                <th style="min-width: 110px">FATHER NAME</th>
                                                <th>PHONE</th>
                                                <th>DUES</th>
                                                <th>VIEW</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($admissionApplications as $admissionApplication)
                                            @php
                                                $previousMonth = date('F-Y', strtotime('-1 months'));
                                                $hasPaid = $admissionApplication->student->fees()->where('month', $previousMonth)->exists();
                                            @endphp
                                                <tr>
                                                    <td>
                                                        {{ $admissionApplication->application_number }}
                                                    </td>
                                                    <td>{{ $admissionApplication->name }}</td>
                                                    <td>{{ $admissionApplication->father_name }}</td>
                                                    <td>{{ $admissionApplication->mobile }}</td>
                                                    <td>
                                                        @if($hasPaid)
                                                            <span class="text-success">Paid</span>
                                                        @else
                                                            <span class="text-danger">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="studentView" href="{{ route('admin.student.profile.index', $admissionApplication->id) }}">
                                                            <i class="far fa-address-card"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="100%" class="text-center">No data found</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{ $admissionApplications->links() }}
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
