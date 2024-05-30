@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .downloadBtn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 16px;
            border: 1px solid #dddddd;
            color: #0af !important;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .downloadBtn .icon {
            width: 24px;
            height: 24px;
            margin-left: 10px;
            background: #0af;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .downloadBtn:hover {
            background: #0af;
            color: #fff !important;
            border-color: #0af;
        }
        .font-14 {
            font-size: 14px;
            margin: 0;
        }
    </style>
@endpush
@section('panel')
    @include('student.application.header')

    <div class="col-lg-12">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Download and Print</h6>
            </div>
            <div class="card-body py-md-30">
                Please download all forms below and follow the instruction given in front of each form:

                <div class="row mt-3 align-items-center">

                    <div class="col-md-4 mb-25">
                        <a href="{{ route('downloadPDF.onlineapplication') }}" class="downloadBtn">
                            <span>Download Online Application Form</span>
                            <i class="fa-solid fa-download icon"></i>
                        </a>
                    </div>
                    <div class="col-md-8 mb-25">
                        <p class="font-14">
                            Printed Form should be duly signed by Applicant & Parent / Guardian and submit by visiting
                            Admin Office at HRIA
                        </p>
                    </div>


                    <div class="col-md-4 mb-25">
                        <a href="{{ route('downloadPDF.onlineapplication') }}" class="downloadBtn">
                            <span>Download Hostel Accommodation Form</span>
                            <i class="fa-solid fa-download icon"></i>
                        </a>
                    </div>
                    <div class="col-md-8 mb-25">
                        <p class="font-14">
                            Hostel Form should be duly signed by Applicant & Parent / Guardian and submit by visiting
                            Admin Office at HRIA
                        </p>
                    </div>


                    <div class="col-md-4 mb-25">
                        <a href="{{ route('downloadPDF.onlineapplication') }}" class="downloadBtn">
                            <span>Download Transport Form</span>
                            <i class="fa-solid fa-download icon"></i>
                        </a>
                    </div>
                    <div class="col-md-8 mb-25">
                        <p class="font-14">
                            Transport Form should be duly signed by Applicant & Parent / Guardian and submit by visiting
                            Admin Office at HRIA
                        </p>
                    </div>


                    <div class="col-md-4 mb-25">
                        <a href="{{ route('downloadPDF.onlineapplication') }}" class="downloadBtn">
                            <span>Download Challan / Fee Slip</span>
                            <i class="fa-solid fa-download icon"></i>
                        </a>
                    </div>
                    <div class="col-md-8 mb-25">
                        <p class="font-14">
                            Fee can be deposited by visiting Admin Office at HRIA with following challan
                        </p>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <div class="mb-3 px-2 d-flex justify-content-end">
        <a href="{{ route('student.logout') }}" class="btn btn-secondary btn-default btn-squared px-30">
            Exit <i class="ms-10 me-0 las la-arrow-right"></i>
        </a>
    </div>
@endsection
