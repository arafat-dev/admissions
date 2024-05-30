@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">

        <div class="container-fluid dashboard-content">
            <div class="">
                <div>
                    <h2>Student Record</h2>
                </div>
                <div class="row">

                    <!--user info-->
                    @include('admin.student.profile.inc.user-info')

                    <div class="col-md-2"></div>
                    <div class="col-md-10 pl-md-0">
                        <div class="mt-3">
                            @include('admin.student.profile.inc.nav-menu')
                        </div>

                        <div class="card mt-3">
                            <h3 class="card-header">Documents</h3>
                            <div class="card-body">

                                <div class="row mt-3 align-items-center">

                                    <div class="col-md-6 mb-4">
                                        <label>Student CNIC / B-Form Image (front side) * </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile"
                                                name="cnic_image" onchange="showProgressAndFile(event,1)">
                                            <label class="custom-file-label ps-15" for="customFile">Browse</label>
                                        </div>
                                    </div>
                                    <!-- selected image name -->
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->student_b_form)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->student_b_form }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication?->student_b_form ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label>Parent /Guardian CNIC / B-Form Image (front side) * </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile2"
                                                name="guardian_cnic_image" onchange="showProgressAndFile(event,2)">
                                            <label class="custom-file-label ps-15" for="customFile2">Browse</label>
                                        </div>
                                    </div>
                                    <!-- selected image name -->
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->guardian_b_form)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->guardian_b_form }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->guardian_b_form ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label>Intermediate / A-Levels Certificate * </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile3"
                                                name="a_level_certificate" onchange="showProgressAndFile(event,3)">
                                            <label class="custom-file-label ps-15" for="customFile3">Browse</label>
                                        </div>
                                    </div>
                                    <!-- selected image name -->
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->intermediate_certificate)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->intermediate_certificate }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->intermediate_certificate ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label>Domicile Certificate * </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile4"
                                                name="domicile_certificate" onchange="showProgressAndFile(event,4)">
                                            <label class="custom-file-label ps-15" for="customFile4">Browse</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->domicile_certificate)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->domicile_certificate }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->domicile_certificate ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label>NOC from other Boards </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile5"
                                                name="noc_from_other_board" onchange="showProgressAndFile(event,5)">
                                            <label class="custom-file-label ps-15" for="customFile5">Browse</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->noc)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->noc }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->noc ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label>Hafiz e Quran Certificate issued from Govt. approved Madrissa </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile6"
                                                name="hafiz_e_quran_certificate" onchange="showProgressAndFile(event,6)">
                                            <label class="custom-file-label ps-15" for="customFile6">Browse</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->quran_certificate_issued)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->quran_certificate_issued }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->quran_certificate_issued ?? '' }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-4">
                                        <label>Disability Certificate from Govt. Hospital </label>
                                        <div class="custom-file">
                                            <input class="form-control custom-file-input" type="file" id="customFile7"
                                                name="disability_certificate" onchange="showProgressAndFile(event,7)">
                                            <label class="custom-file-label ps-15" for="customFile7">Browse</label>
                                        </div>
                                        @error('disability_certificate')
                                            <p class="text-danger m-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label></label>
                                        <div class="d-flex gap-1 align-items-center">
                                            @if ($admissionApplication->disability_certificate)
                                                <div class="d-flex gap-2">
                                                    <a href="" class="removeBtn"> <i class="fa fa-times"></i></a>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('admission-documents') . '/' . $admissionApplication->disability_certificate }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                                <p class="m-0" id="imageName1">
                                                    {{ $admissionApplication->disability_certificate ?? '' }}
                                                </p>
                                            @endif
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
