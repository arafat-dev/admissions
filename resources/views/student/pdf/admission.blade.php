<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--///////////////  Title ////////////////-->
    <title>Online Admission</title>

    <style>
        @page {
            size: 29.8cm landscape;
            margin: 26px;
            background: #fff;
        }

        /* @font-face {
            font-family: 'Trebuchet MS';
            src: url('./fonts/trebuc.ttf') format('truetype');
        } */

        body {
            font-size: 16px;
            font-family: sans-serif;
            background: #fff;
            color: #000;
            page-break-inside: avoid !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-primary {
            color: #223896;
        }

        .float-left {
            float: left;
        }

        .m-0 {
            margin: 0;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .main-layout {
            width: 100%;
            border: 1px solid #000;
        }

        .main-layout .item {
            width: 33.33%;
            display: table-cell !important;
            border-right: 1px solid #000;
            padding: 16px !important;
            padding-right: 16px;
        }

        .main-layout .item:last-child {
            border: none;
        }

        .logo {
            width: 100px;
        }

        .school {
            padding-top: 40px;
        }

        .display-table {
            display: table;
            width: 100%;
        }

        .display-table .col {
            display: table-cell;
            vertical-align: top;
        }

        .copyBtn,
        .feevoucher {
            border: 1px solid #000;
            width: 180px;
            text-align: center;
            padding: 5px;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

        .feevoucher {
            width: 100%;
        }

        .font-14 {
            font-size: 14px
        }

        .font-12 {
            font-size: 12px;
        }

        .mb-1 {
            margin: 0;
            margin-bottom: 3px;
        }

        .mt-1 {
            margin-top: 3px;
        }

        .studentTable {
            width: 100%;
        }

        .studentTable td {
            padding: 4px 6px;
            border-bottom: 2px solid #e2e8f0;
        }

        .studentTable td:first-child {
            width: 28%;
        }

        .feeTable {
            width: 100%;
            border-collapse: collapse;
        }

        .feeTable td,
        .feeTable th {
            border: 1px solid #334155;
            padding: 6px 12px;
        }

        .feeTable th {
            font-weight: bold;
            border: 1px solid #000;
            text-align: left;
        }

        .text-center {
            text-align: center !important;
        }

        .signature {
            height: 24px;
            border-bottom: 1px solid #475569;
        }

        ul {
            margin: 0;
            padding: 0;
            padding-left: 12px;
        }

        ul li {
            margin: 0;
            padding: 0;
            color: #221f1f;
            font-size: 12px;
            margin-top: 4px;
        }

        .footer {
            margin-top: 20px;
        }

        .footer .name {
            font-size: 38px;
            line-height: 34px;
            margin-right: 20px;
        }

        .footer .address {
            color: #221f1f;
            line-height: 16px;
        }
    </style>
</head>

<body>

    @php
        $logo = './hria/user/img/logo.png';
    @endphp

    <div class="main-layout display-table">

        <!--################ Office Copy ################-->
        <div class="item">
            <!--///////////////  Logo and voucher ////////////////-->
            <div class="display-table">
                <div class="col" style="width: 56%">
                    <div class="display-table">
                        <div class="col" style="width: 108px">
                            <img class="logo" src="{{ $logo }}"/>
                        </div>
                        <div class="school col">
                            <p class="text-primary m-0">HIZB UR REHMAN</p>
                            <div class="text-primary" style="font-weight: bolder;">
                                ISLAMIC SCIENCE <br> COLLEGE
                            </div>
                        </div>
                    </div>

                    <div class="copyBtn">
                        OFFICE COPY
                    </div>
                </div>

                <div class="col" style="padding-right: 12px">
                    <div class="feevoucher">
                        FEE VOUCHER
                    </div>

                    <div class="font-14" style="margin-top: 4px; margin-bottom: 4px">
                        Admission & Voucher Number
                    </div>

                    <div class="barcode mt-1">
                        @php
                            $barcode = $admissionApplication->application_number ?? 'HRISC-BSMT-2023-00001';
                        @endphp
                        {!! '<img src="data:image/png;base64,' .
                            DNS1D::getBarcodePNG($barcode, 'C39+', 3, 33) .
                            '" alt="barcode" width="100%" height="26" />' !!}
                        <p class="m-0">{{ $barcode }}</p>
                    </div>

                    <p class="fw-bold mb-1" style="margin-top: 4px">
                        {{ $admissionApplication->programType->short_name }} -
                        {{ $admissionApplication->programAdmission->program }}
                    </p>

                    <div class="display-table">
                        <div class="col font-14">
                            <p class="mb-1">Session</p>
                            <p class="mb-1">Issue Date</p>
                            <p class="mb-1">Due Date</p>
                        </div>
                        <div class="col font-14">
                            <p class="mb-1">- {{ $admissionApplication->session->name }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->created_at)->format('D F d, Y') }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->programAdmission->admission_deadline)->format('D F d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--///////////////  Student Details ////////////////-->
            <table class="studentTable" style="margin-top: 12px">
                <tr>
                    <td>Student Name</td>
                    <td>{{ $admissionApplication?->name }}</td>
                </tr>
                <tr>
                    <td>CNIC / B-Form</td>
                    <td>{{ $admissionApplication->national_id }}</td>
                </tr>
                <tr>
                    <td>Father Name</td>
                    <td>{{ $admissionApplication?->father_name }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $admissionApplication->mobile }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $admissionApplication->email }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{ \Carbon\Carbon::parse($admissionApplication->dob)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Campus</td>
                    <td>Hizb ur Rehman Islamic Science College For
                        {{ $admissionApplication?->gender == 'male' ? 'Boys' : 'Girls' }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $admissionApplication->programAdmission->total_semester ?? 6 }} Semester</td>
                </tr>
            </table>

            <!--///////////////  Fee Details ////////////////-->
            <table class="feeTable" style="margin-top: 12px;">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="text-center">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($admissionApplication->programType->fees as $programeFee)
                        @php
                            $total += $programeFee->fee;
                        @endphp
                        <tr>
                            <td>{{ $programeFee->name }}</td>
                            <td class="text-center">{{ number_format($programeFee->fee) }}</td>
                        </tr>
                    @endforeach

                    <!--==== total amount ===-->
                    <tr class="fw-bold">
                        <td>Total Payable Amount:</td>
                        <td class="text-center">Rs. {{ number_format($total) }}</td>
                    </tr>

                    <!--==== total amount ===-->
                    <tr>
                        <td colspan="2">
                            <span class="fw-bold">Total Amount in Words:</span>
                            @php
                                $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
                                echo $f->format($total);
                            @endphp
                            Rupees Only
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--///////////////  Signature ////////////////-->
            <div class="display-table" style="margin-top: 16px;">
                <div class="col" style="padding-right: 20px; width: 48%;">
                    <p class="fw-bold m-0">Student Signature:</p>
                    <div class="signature"></div>
                </div>
                <div class="col" style="padding-left: 20px;">
                    <p class="fw-bold m-0">Accounts Signature & Stamp:</p>
                    <div class="signature"></div>
                </div>
            </div>

            <!--///////////////  Payment Terms ////////////////-->
            <div style="margin-top: 12px;" class=">
                <p class="fw-bold m-0 font-12"> PAYMENT TERMS:</p>
                <ul>
                    <li>
                        <p class="m-0">In case of any query/ correction in fee voucher, concerned Students or His/
                            Her Guardian should visit the accout office before Due Date otherwise the fee voucher will
                            be considered finalized and student will be liable to pay the dues mentioned in voucher.</p>
                    </li>
                    <li>
                        <p class="m-0">Fee must be deposited to Account Officer by visiting HRIA between 8:00 A.M. to
                            5.00 P.M. in working days.</p>
                    </li>
                </ul>
            </div>

            <!--///////////////  Footer ////////////////-->
            <div class="display-table footer">
                <div class="col">
                    <h4 class="name text-primary m-0">HRISC</h4>
                </div>
                <div class="col font-12 address">
                    Darbar Hazrat Syed Muhammad Abdullah Shah Mashhadi Qadri
                    Moza Qadir Bakhsh Sharif, Tehsil Kamalia, District Toba Tek Singh - Pakistan Enquiries: +92 300
                    9652742, +92 346 7377307, +92 304-0820082 Email: helpdesk@hria.edu.pk | www.hria.edu.pk
                </div>
            </div>
        </div>

        <!--################ BANK COPY ################-->
        <div class="item">
            <!--///////////////  Logo and voucher ////////////////-->
            <div class="display-table">
                <div class="col" style="width: 56%">
                    <div class="display-table">
                        <div class="col" style="width: 108px">
                            <img class="logo" src="{{ $logo }}" />
                        </div>
                        <div class="school col">
                            <p class="text-primary m-0">HIZB UR REHMAN</p>
                            <div class="text-primary" style="font-weight: bolder;">
                                ISLAMIC SCIENCE <br> COLLEGE
                            </div>
                        </div>
                    </div>

                    <div class="copyBtn">
                        BANK COPY
                    </div>
                </div>

                <div class="col" style="padding-right: 12px">
                    <div class="feevoucher">
                        FEE VOUCHER
                    </div>

                    <div class="font-14" style="margin-top: 4px; margin-bottom: 4px">
                        Admission & Voucher Number
                    </div>

                    <div class="barcode mt-1">
                        @php
                            $barcode = $admissionApplication->application_number ?? 'HRISC-BSMT-2023-00001';
                        @endphp
                        {!! '<img src="data:image/png;base64,' .
                            DNS1D::getBarcodePNG($barcode, 'C39+', 3, 33) .
                            '" alt="barcode" width="100%" height="26" />' !!}
                        <p class="m-0">{{ $barcode }}</p>
                    </div>

                    <p class="fw-bold mb-1" style="margin-top: 4px">
                        {{ $admissionApplication->programType->short_name }} -
                        {{ $admissionApplication->programAdmission->program }}
                    </p>

                    <div class="display-table">
                        <div class="col font-14">
                            <p class="mb-1">Session</p>
                            <p class="mb-1">Issue Date</p>
                            <p class="mb-1">Due Date</p>
                        </div>
                        <div class="col font-14">
                            <p class="mb-1">- {{ $admissionApplication->session->name }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->created_at)->format('D F d, Y') }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->programAdmission->admission_deadline)->format('D F d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--///////////////  Student Details ////////////////-->
            <table class="studentTable" style="margin-top: 12px">
                <tr>
                    <td>Student Name</td>
                    <td>{{ $admissionApplication?->name }}</td>
                </tr>
                <tr>
                    <td>CNIC / B-Form</td>
                    <td>{{ $admissionApplication->national_id }}</td>
                </tr>
                <tr>
                    <td>Father Name</td>
                    <td>{{ $admissionApplication?->father_name }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $admissionApplication->mobile }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $admissionApplication->email }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{ \Carbon\Carbon::parse($admissionApplication->dob)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Campus</td>
                    <td>Hizb ur Rehman Islamic Science College For
                        {{ $admissionApplication?->gender == 'male' ? 'Boys' : 'Girls' }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $admissionApplication->programAdmission->total_semester ?? 6 }} Semester</td>
                </tr>
            </table>

            <!--///////////////  Fee Details ////////////////-->
            <table class="feeTable" style="margin-top: 12px;">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="text-center">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($admissionApplication->programType->fees as $programeFee)
                        @php
                            $total += $programeFee->fee;
                        @endphp
                        <tr>
                            <td>{{ $programeFee->name }}</td>
                            <td class="text-center">{{ number_format($programeFee->fee) }}</td>
                        </tr>
                    @endforeach

                    <!--==== total amount ===-->
                    <tr class="fw-bold">
                        <td>Total Payable Amount:</td>
                        <td class="text-center">Rs. {{ number_format($total) }}</td>
                    </tr>

                    <!--==== total amount ===-->
                    <tr>
                        <td colspan="2">
                            <span class="fw-bold">Total Amount in Words:</span>
                            @php
                                $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
                                echo $f->format($total);
                            @endphp
                            Rupees Only
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--///////////////  Signature ////////////////-->
            <div class="display-table" style="margin-top: 16px;">
                <div class="col" style="padding-right: 20px; width: 48%;">
                    <p class="fw-bold m-0">Student Signature:</p>
                    <div class="signature"></div>
                </div>
                <div class="col" style="padding-left: 20px;">
                    <p class="fw-bold m-0">Accounts Signature & Stamp:</p>
                    <div class="signature"></div>
                </div>
            </div>

            <!--///////////////  Payment Terms ////////////////-->
            <div style="margin-top: 12px;" class=">
                <p class="fw-bold m-0 font-12"> PAYMENT TERMS:</p>
                <ul>
                    <li>
                        <p class="m-0">In case of any query/ correction in fee voucher, concerned Students or His/
                            Her Guardian should visit the accout office before Due Date otherwise the fee voucher will
                            be considered finalized and student will be liable to pay the dues mentioned in voucher.</p>
                    </li>
                    <li>
                        <p class="m-0">Fee must be deposited to Account Officer by visiting HRIA between 8:00 A.M.
                            to
                            5.00 P.M. in working days.</p>
                    </li>
                </ul>
            </div>

            <!--///////////////  Footer ////////////////-->
            <div class="display-table footer">
                <div class="col">
                    <h4 class="name text-primary m-0">HRISC</h4>
                </div>
                <div class="col font-12 address">
                    Darbar Hazrat Syed Muhammad Abdullah Shah Mashhadi Qadri
                    Moza Qadir Bakhsh Sharif, Tehsil Kamalia, District Toba Tek Singh - Pakistan Enquiries: +92 300
                    9652742, +92 346 7377307, +92 304-0820082 Email: helpdesk@hria.edu.pk | www.hria.edu.pk
                </div>
            </div>
        </div>

        <!--################ STUDENT COPY ################-->
        <div class="item">
            <!--///////////////  Logo and voucher ////////////////-->
            <div class="display-table">
                <div class="col" style="width: 56%">
                    <div class="display-table">
                        <div class="col" style="width: 108px">
                            <img class="logo" src="{{ $logo }}" />
                        </div>
                        <div class="school col">
                            <p class="text-primary m-0">HIZB UR REHMAN</p>
                            <div class="text-primary" style="font-weight: bolder;">
                                ISLAMIC SCIENCE <br> COLLEGE
                            </div>
                        </div>
                    </div>

                    <div class="copyBtn">
                        STUDENT COPY
                    </div>
                </div>

                <div class="col" style="padding-right: 12px">
                    <div class="feevoucher">
                        FEE VOUCHER
                    </div>

                    <div class="font-14" style="margin-top: 4px; margin-bottom: 4px">
                        Admission & Voucher Number
                    </div>

                    <div class="barcode mt-1">
                        @php
                            $barcode = $admissionApplication->application_number ?? 'HRISC-BSMT-2023-00001';
                        @endphp
                        {!! '<img src="data:image/png;base64,' .
                            DNS1D::getBarcodePNG($barcode, 'C39+', 3, 33) .
                            '" alt="barcode" width="100%" height="26" />' !!}
                        <p class="m-0">{{ $barcode }}</p>
                    </div>

                    <p class="fw-bold mb-1" style="margin-top: 4px">
                        {{ $admissionApplication->programType->short_name }} -
                        {{ $admissionApplication->programAdmission->program }}
                    </p>

                    <div class="display-table">
                        <div class="col font-14">
                            <p class="mb-1">Session</p>
                            <p class="mb-1">Issue Date</p>
                            <p class="mb-1">Due Date</p>
                        </div>
                        <div class="col font-14">
                            <p class="mb-1">- {{ $admissionApplication->session->name }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->created_at)->format('D F d, Y') }}</p>
                            <p class="mb-1">-
                                {{ \Carbon\Carbon::parse($admissionApplication->programAdmission->admission_deadline)->format('D F d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--///////////////  Student Details ////////////////-->
            <table class="studentTable" style="margin-top: 12px">
                <tr>
                    <td>Student Name</td>
                    <td>{{ $admissionApplication?->name }}</td>
                </tr>
                <tr>
                    <td>CNIC / B-Form</td>
                    <td>{{ $admissionApplication->national_id }}</td>
                </tr>
                <tr>
                    <td>Father Name</td>
                    <td>{{ $admissionApplication?->father_name }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $admissionApplication->mobile }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $admissionApplication->email }}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{ \Carbon\Carbon::parse($admissionApplication->dob)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Campus</td>
                    <td>Hizb ur Rehman Islamic Science College For
                        {{ $admissionApplication?->gender == 'male' ? 'Boys' : 'Girls' }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $admissionApplication->programAdmission->total_semester ?? 6 }} Semester</td>
                </tr>
            </table>

            <!--///////////////  Fee Details ////////////////-->
            <table class="feeTable" style="margin-top: 12px;">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="text-center">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($admissionApplication->programType->fees as $programeFee)
                        @php
                            $total += $programeFee->fee;
                        @endphp
                        <tr>
                            <td>{{ $programeFee->name }}</td>
                            <td class="text-center">{{ number_format($programeFee->fee) }}</td>
                        </tr>
                    @endforeach

                    <!--==== total amount ===-->
                    <tr class="fw-bold">
                        <td>Total Payable Amount:</td>
                        <td class="text-center">Rs. {{ number_format($total) }}</td>
                    </tr>

                    <!--==== total amount ===-->
                    <tr>
                        <td colspan="2">
                            <span class="fw-bold">Total Amount in Words:</span>
                            @php
                                $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
                                echo $f->format($total);
                            @endphp
                            Rupees Only
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--///////////////  Signature ////////////////-->
            <div class="display-table" style="margin-top: 16px;">
                <div class="col" style="padding-right: 20px; width: 48%;">
                    <p class="fw-bold m-0">Student Signature:</p>
                    <div class="signature"></div>
                </div>
                <div class="col" style="padding-left: 20px;">
                    <p class="fw-bold m-0">Accounts Signature & Stamp:</p>
                    <div class="signature"></div>
                </div>
            </div>

            <!--///////////////  Payment Terms ////////////////-->
            <div style="margin-top: 12px;">
                <p class="fw-bold m-0 font-12"> PAYMENT TERMS:</p>
                <ul>
                    <li>
                        <p class="m-0">In case of any query/ correction in fee voucher, concerned Students or His/
                            Her Guardian should visit the accout office before Due Date otherwise the fee voucher will
                            be considered finalized and student will be liable to pay the dues mentioned in voucher.</p>
                    </li>
                    <li>
                        <p class="m-0">Fee must be deposited to Account Officer by visiting HRIA between 8:00 A.M.
                            to
                            5.00 P.M. in working days.</p>
                    </li>
                </ul>
            </div>

            <!--///////////////  Footer ////////////////-->
            <div class="display-table footer">
                <div class="col">
                    <h4 class="name text-primary m-0">HRISC</h4>
                </div>
                <div class="col font-12 address">
                    Darbar Hazrat Syed Muhammad Abdullah Shah Mashhadi Qadri
                    Moza Qadir Bakhsh Sharif, Tehsil Kamalia, District Toba Tek Singh - Pakistan Enquiries: +92 300
                    9652742, +92 346 7377307, +92 304-0820082 Email: helpdesk@hria.edu.pk | www.hria.edu.pk
                </div>
            </div>
        </div>

    </div>

</body>

</html>
