@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">

        <div class="container-fluid dashboard-content">
            <div class="">
                <div>
                    <h2>Student Record</h2>
                </div>
                <div class="row">

                    @include('admin.student.profile.inc.user-info')

                    <!--user info-->
                    <div class="col-md-2"></div>
                    <div class="col-md-10 pl-md-0">

                        <div class="mt-3">
                            @include('admin.student.profile.inc.nav-menu')
                        </div>

                        <div class="card card-body rounded border-0 mt-3">
                            <h5>Generate Fee Slip</h5>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="" class="custom-btn secoundBtn px-4 active">
                                    Semester
                                </a>
                                <a href="" class="custom-btn secoundBtn px-4">Transport</a>
                                <a href="" class="custom-btn secoundBtn px-4">Hostel</a>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="slip-table">
                                    <thead>
                                        <tr>
                                            <th>DESCRIPTION</th>
                                            <th>FEE</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    New admission Fee - Paid Once
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>5,000</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Tuition Fee - Per Semeste
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>25,000</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Hostel & Mess Dues - Per Month
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>3,500</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Stationary Funds - Per Semester
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>500</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Late Payment Fee Fine - Per Day
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>10</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Registration Fee ( Paid once, as per GCUF schedule )
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>---</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Examination Fee ( As per semester GCUF schedule )
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>---</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Certificate Issue Fee - Per Certificat
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>500</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Class Absent Fine - Per Day
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>10</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Class Absent Fine After Holdiday - Per Day
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>50</span>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Hostel Absent Fine - Per Day
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>20</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    Re-Admission Fee
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>500</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="description">
                                                    --------
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>---</span>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex flex-wrap gap-2 justify-content-between mt-4">
                                <button class="btn btn-primary btn-success rounded px-4">
                                    Generate Pay Slip
                                </button>

                                <button class="btn btn-primary rounded">
                                    Make Installments
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
