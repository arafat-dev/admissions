@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    <div class="col-lg-12">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Review & Submit Application</h6>
            </div>
            <div class="card-body  ">
                <li>
                    Make sure you have provided all the details correctly. In case any information/data is proven
                    fake/wrong, the candidate's admission shall stand cancel and legal disciplinary action shall be taken as
                    per rule & regulation.
                </li> <br>
                <li>
                    Please recheck and verify complete information before proceeding to the next section. You will not be
                    able to EDIT your application once submitted
                </li>
            </div>
        </div>
    </div>



    <div class="row">
        <div class=" col-lg-9">

            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body row py-md-30">
                    <div class="col-md-8">
                        <img src="{{ asset('hria/user/img/logo.png') }}" width="50" />
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">

                    </div>

                    <div class="col-md-6">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">
                                                        Personal Information
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Full Name
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        CNIC / B-Form
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->national_id }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Father Name
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->father_name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Gender
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->gender }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Phone Number
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->mobile }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Email
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->email }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Date of Birth
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->dob ? \Carbon\Carbon::parse($student->admissionApplication?->dob)->format('d-m-Y') : '' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Blood Group
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->blood_group }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Religion
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->religion?->name }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">
                                                        Parent / Guardian Information
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Relationship
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_relation }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Full Name
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Profession
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_occupation }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        CNIC / B-Form
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_national_id }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Phone Number
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_contact }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Email
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_email }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">
                                                        Academic Information
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Certificate / Degree
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->aLeveldegree?->name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Major Subjects
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->major_subject }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Board / University
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->aLevelBoard?->name }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        School / College / Institute
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->a_level_Institute }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Certificate / Degree Completed?
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->complated_intermediate ? 'Yes' : 'No' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Total Marks / Obtaind Marks
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->a_level_total_marks }} /
                                                        {{ $student->admissionApplication?->a_level_obtained_marks }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Percentage
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->a_level_percentage }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Roll Number
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->a_level_roll }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Passing Year
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->a_level_passing_year }}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">
                                                        Document Uploaded
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Student CNIC / B-Form
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->student_b_form }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Gaurdian CNIC / B-Form

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->guardian_b_form }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Certificate / Degree
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->intermediate_certificate }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Hafiz e Quran
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->quran_certificate_issued }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Disability Certificate
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->disability_certificate }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Domicile Certificate
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->domicile_certificate }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        NOC from other Boards
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $student->admissionApplication?->noc }}
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">Facilities</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Hostel Accommodation
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $hostel ? 'Yes' : 'No' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Transport
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        {{ $transport ? 'Yes' : 'No' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Scholorship / Concession
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        Eligible for {{ $student->admissionApplication?->scholarship }}%
                                                        Scholarship
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="card-body p-0">
                            <div class="table4 p-25 mb-30">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th colspan="3">
                                                    <span class="userDatatable-title"
                                                        style="font-size: 20px; font-weight: bold; color: #2c389a">Undertaking
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <h4>For Student</h4><br>
                                                        I certify that I have provided complete and correct information
                                                        about my <br>
                                                        academic career. I understand that any misrepresentation can result
                                                        in the <br>
                                                        disqualification of my application or subsequent separation from
                                                        HRIA. <br><br>
                                                        I also accept all general rules, regulations and policies of HRIA.
                                                        <br><br>
                                                        Signature
                                                        ________________________________________________________________<br><br>
                                                        Full Name
                                                        ________________________________________________________________<br><br>
                                                        Date
                                                        _____________________________________________________________________<br><br>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="userDatatable-content">
                                                        <h4> For Parent / Guardian</h4> <br>
                                                        I certify that I am guardian of Mr. / Ms.<br>
                                                        and he / she has submitted this application with my knowledge and
                                                        consent<br>
                                                        and that hold myself responsible for his / her good conduct and his
                                                        / her<br>
                                                        maintenance and any payment of fee during the stay at the
                                                        Institution. The<br>
                                                        entries made by him / her in the admission form are correct to the
                                                        best of<br>
                                                        my knowledge.<br><br>
                                                        Signature
                                                        ________________________________________________________________<br><br>
                                                        Full Name
                                                        ________________________________________________________________<br><br>
                                                        Date
                                                        _____________________________________________________________________<br><br>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex gap-3 align-items-center">
                        <div class="">
                            <h1 class="hrisc">HRISC</h1>
                        </div>

                        <div class="">
                            <p class="m-0 address">
                                Darbar Hazrat Syed Muhammad Abdullah Shah Mashhadi Qadri, Moza Qadir Bakhsh Sharif,
                                Tehsil Kamalia, District Toba Tek Singh - Pakistan
                                Admission & Academics Enquiries: +92 300 9652742, +92 346 7377307, +92 304-0820082 | Email:
                                helpdesk@hria.edu.pk | www.hria.edu.pk
                            </p>
                        </div>
                    </div>
                    <style>
                        .hrisc {
                            font-size: 42px;
                            font-weight: bold;
                            color: #2c389a;
                        }

                        @media(max-width: 768px) {
                            .hrisc {
                                font-size: 30px;
                            }
                        }

                        .address {
                            font-size: 12px;
                        }
                    </style>
                </div>
            </div>
            {{-- Enock --}}

        </div>

        <div class="col-lg-3">

            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body row py-md-30">
                    <button class="btn btn-outline-secondary text-dark w-100"
                        style="font-size: 26px; font-weight: bold;">ONLINE ADMISSION</button>
                    <h4 class="mt-2">Admission Number</h4>
                    @php
                        $barcode = $student->admissionApplication?->application_number ?? 'HRISC-BSMT-2023-00001';
                    @endphp
                    {!! '<img src="data:image/png;base64,' .
                        DNS1D::getBarcodePNG($barcode, 'C39+', 3, 33) .
                        '" alt="barcode" width="100%" height="26" />' !!}
                    <p class="text-dark mb-0">{{ $barcode }}</p> <br>

                    <h5>
                        {{ $student->admissionApplication?->programType->short_name }} -
                        {{ $student->admissionApplication?->programAdmission?->program }}
                    </h5>
                    <br>

                    <p>Session - {{ $student->admissionApplication?->session->name }} ({{ $student->admissionApplication?->program_session }})</p>

                    {{-- Sunday April 2, 2023 --}}
                    <p>Date - {{ \Carbon\Carbon::parse($student->admissionApplication->programAdmission->admission_deadline)->format('D F d, Y') }}</p>

                    <img src="{{ asset('admission-documents') . '/' . $student->admissionApplication?->profile_image }}"
                        style="width: 160px;" />

                    <h4>Province</h4>
                    <p>{{ $student->admissionApplication?->province }}</p>

                    <h4>Domicile District</h4>
                    <p>{{ $student->admissionApplication?->district }}</p>

                    <h4>City</h4>
                    <p>{{ $student->admissionApplication?->city }}</p>

                    <h4>Permanent Address</h4>
                    <p>{{ $student->admissionApplication?->permanent_address }}</p>

                    <h4>Postal Address</h4>
                    <p>{{ $student->admissionApplication?->present_address }}</p>


                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th style="background-color: black">
                                        <span class="userDatatable-title text-white"
                                            style="font-size: 26px; font-weight: bold;">
                                            <strong>ADMISSION OFFICE ONLY</strong>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="userDatatable-content pb-5">
                                            <h4>REMARKS</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="userDatatable-content pb-5">
                                            <h4>ADMISSION OFFICER</h4>
                                            <p>Signature</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="userDatatable-content pb-5">
                                            <h4>PRINCIPAL</h4>
                                            <p>Signature</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="userDatatable-content pb-5">
                                            <h4>HRIA</h4>
                                            <p>Stamp</p>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-12 mb-3">
        <form action="{{ route('submit.save') }}" method="POST" class="row">
            @csrf
            <div class="col-md-6">
                <div class="checkbox-theme-default custom-checkbox">
                    <input name="checking" class="checkbox" type="checkbox" id="checking" checked />
                    <label for="checking">
                        <span class="checkbox-text">
                            By checking this box, applicant and parent /guardian are agreeing to our rules, regulations and
                            policies To read all policies <a href="#">Click here</a>
                        </span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center gap-3">
                <a href="{{ route('facilities.index') }}" class="btn btn-white border-secondary border-2"
                    style="width: 160px">
                    Back
                </a>
                <button type="submit" class="btn btn-primary" style="width: 160px">
                    Submit Application
                </button>
            </div>
        </form>
    </div>
@endsection
