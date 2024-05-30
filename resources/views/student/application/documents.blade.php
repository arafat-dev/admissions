@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    <form action="{{ route('documents.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Upload Documents </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3"><strong>Please enter your Intermediate / A-Level Marks</strong></p>
                    <li>Upload clear image</li>
                    <li>Maximum size is 2MB</li>
                    <li>
                        To reduce your image size
                        <a href="https://imagecompressor.11zon.com/en/image-compressor/compress-image-to-20kb-online.php"
                            target="_blank">
                            Click here
                        </a>
                    </li>

                    <div class="row mt-3 align-items-center">

                        <div class="col-md-4 mb-25 h-100">
                            <label>Student CNIC / B-Form Image (front side) * </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile" name="cnic_image" onchange="showProgressAndFile(event,1)">
                                <label class="custom-file-label ps-15" for="customFile">Browse</label>
                            </div>
                            @error('cnic_image')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->student_b_form ? 'display:block' : 'display: none'}}" id="progress1" >
                                <div class="progress-bar" id="progressbar1" style="width: {{ $student->admissionApplication?->student_b_form ? '100' : '0' }}%">{{ $student->admissionApplication?->student_b_form ? '100' : '0' }}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->student_b_form ? 'checked' : 'style=display:none' }} />
                                <p class="m-0" id="imageName1">
                                    {{ $student->admissionApplication?->student_b_form ?? ''}}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-25">
                            <label>Parent /Guardian CNIC / B-Form Image (front side) * </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile2" name="guardian_cnic_image" onchange="showProgressAndFile(event,2)">
                                <label class="custom-file-label ps-15" for="customFile2">Browse</label>
                            </div>
                            @error('guardian_cnic_image')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->guardian_b_form ? 'display:block' : 'display: none'}}" id="progress2" >
                                <div class="progress-bar" id="progressbar2" style="width: {{ $student->admissionApplication?->guardian_b_form ? '100' : '0' }}%">{{ $student->admissionApplication?->guardian_b_form ? '100' : '0' }}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->guardian_b_form ? 'checked' : 'style=display:none' }} />
                                <p class="m-0" id="imageName2">
                                    {{ $student->admissionApplication?->guardian_b_form ?? ''}}
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4 mb-25">
                            <label>Intermediate / A-Levels Certificate * </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile3" name="a_level_certificate" onchange="showProgressAndFile(event,3)">
                                <label class="custom-file-label ps-15" for="customFile3">Browse</label>
                            </div>
                            @error('a_level_certificate')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->intermediate_certificate ? 'display:block' : 'display: none'}}" id="progress3" >
                                <div class="progress-bar" id="progressbar3" style="width: {{ $student->admissionApplication?->intermediate_certificate ? '100' : '0' }}%">{{ $student->admissionApplication?->intermediate_certificate ? '100' : '0' }}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->intermediate_certificate ? 'checked' : 'style=display:none' }} />
                                <p class="m-0" id="imageName3">
                                    {{ $student->admissionApplication?->intermediate_certificate ?? ''}}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-25">
                            <label>Domicile Certificate * </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile4" name="domicile_certificate" onchange="showProgressAndFile(event,4)">
                                <label class="custom-file-label ps-15" for="customFile4">Browse</label>
                            </div>
                            @error('domicile_certificate')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->domicile_certificate ? 'display:block' : 'display: none'}}" id="progress4" >
                                <div class="progress-bar" id="progressbar4" style="width: {{ $student->admissionApplication?->domicile_certificate ? '100' : '0' }}%">{{ $student->admissionApplication?->domicile_certificate ? '100' : '0' }}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->domicile_certificate ? 'checked' : 'style=display:none' }} />
                                <p class="m-0" id="imageName4">
                                    {{ $student->admissionApplication?->domicile_certificate ?? ''}}
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4 mb-25">
                            <label>NOC from other Boards </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile5" name="noc_from_other_board" onchange="showProgressAndFile(event,5)">
                                <label class="custom-file-label ps-15" for="customFile5">Browse</label>
                            </div>
                            @error('noc_from_other_board')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->noc ? 'display:block' : 'display: none'}}" id="progress5" >
                                <div class="progress-bar" id="progressbar5" style="width: {{$student->admissionApplication?->noc ? '100' : '0'}}%">{{$student->admissionApplication?->noc ? '100' : '0'}}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->noc ? 'checked' : 'style=display:none' }} />
                                <p class="m-0" id="imageName5">
                                    {{ $student->admissionApplication?->noc ?? ''}}
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4 mb-25">
                            <label>Hafiz e Quran Certificate issued from Govt. approved Madrissa </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile6" name="hafiz_e_quran_certificate" onchange="showProgressAndFile(event,6)">
                                <label class="custom-file-label ps-15" for="customFile6">Browse</label>
                            </div>
                            @error('hafiz_e_quran_certificate')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->quran_certificate_issued ? 'display:block' : 'display: none'}}" id="progress6" >
                                <div class="progress-bar" id="progressbar6" style="width: {{$student->admissionApplication?->quran_certificate_issued ? '100' : '0'}}%">{{$student->admissionApplication?->quran_certificate_issued ? '100' : '0'}}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->quran_certificate_issued ? 'checked' : 'style=display:none'}} />
                                <p class="m-0" id="imageName6">
                                    {{ $student->admissionApplication?->quran_certificate_issued ?? ''}}
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4 mb-25">
                            <label>Disability Certificate from Govt. Hospital </label>
                            <div class="custom-file">
                                <input class="form-control custom-file-input" type="file" id="customFile7" name="disability_certificate" onchange="showProgressAndFile(event,7)">
                                <label class="custom-file-label ps-15" for="customFile7">Browse</label>
                            </div>
                            @error('disability_certificate')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- pregressbar -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="progress rounded-0" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                aria-valuemax="100" style="height: 20px; {{ $student->admissionApplication?->disability_certificate ? 'display:block' : 'display: none'}}" id="progress7" >
                                <div class="progress-bar" id="progressbar7" style="width: {{$student->admissionApplication?->disability_certificate ? '100' : '0'}}%">{{$student->admissionApplication?->disability_certificate ? '100' : '0'}}%</div>
                            </div>
                        </div>
                        <!-- selected image name -->
                        <div class="col-md-4 mb-25">
                            <label></label>
                            <div class="d-flex gap-1">
                                <input type="checkbox" {{ $student->admissionApplication?->disability_certificate ? 'checked' : 'style=display:none'}} />
                                <p class="m-0" id="imageName7">
                                    {{ $student->admissionApplication?->disability_certificate ?? ''}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-end align-items-center gap-3">
                <a href="{{ route('qualifications.index') }}" class="btn btn-white border-secondary border-2"
                    style="width: 160px">
                    Back
                </a>
                <button type="submit" class="btn btn-primary" style="width: 160px">
                    Save & Next
                </button>
            </div>
        </div>

    </form>
@endsection
@push('script')
    <script>
        const showProgressAndFile = (e, num) => {
            const progress = document.getElementById('progress' + num);
            const progressbar = document.getElementById('progressbar' + num);
            const imageName = document.getElementById('imageName' + num);
            progress.style.display = 'block';
            imageName.innerText = e.target.files[0].name;

            let percentComplete = 0;
            const intervalId = setInterval(function () {
                if (percentComplete < 100) {
                    percentComplete += 5; // Increment by 5% (you can adjust this value)
                    progressbar.style.width = percentComplete + '%';
                    progressbar.innerText = Math.round(percentComplete) + '%';
                } else {
                    clearInterval(intervalId); // Stop the interval when reaching 100%
                }
            }, 150);
        }

    </script>
@endpush
