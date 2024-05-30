@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    <div class="col-lg-12">
        <div class="card card-Vertical card-default card-md mb-4">
            <div class="card-header">
                <h6>Your Academic Information </h6>
            </div>
            <div class="card-body py-md-30">
                • Eligibility criteria for all BS programs requires a minimum score of 45% or higher marks obtained in
                Matriculation and Intermediate <br>
                • Eligibility criteria for BS Computer Science requires a minimum score of 50% or higher <br>
                • Result awaiting candidates should only provide Intermediate Part-I information <br>
                • Age limit from 18-24 years
            </div>
        </div>
    </div>

    <form action="{{ route('qualifications.save') }}" method="POST">
        @csrf
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Matriculation / O-Level Information </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3">
                        <strong>Please enter your Matriculation / O-Level Marks </strong>
                    </p>
                    <div class="row">
                        <div class="col-md-4 mb-25">
                            <label>Certificate / Degree * </label>
                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="degree">
                                <option value="">Select an option</option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->id }}"
                                        {{ $student->admissionApplication?->o_level_degree_id == $degree->id ? 'selected' : '' }}>
                                        {{ $degree->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('degree')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Degree Group * </label>
                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="degree_group">
                                <option value="">Select an option</option>
                                @foreach ($degreeGroups as $degreeGroup)
                                    <option value="{{ $degreeGroup->id }}"
                                        {{ $student->admissionApplication?->o_level_degree_group_id == $degreeGroup->id ? 'selected' : '' }}>
                                        {{ $degreeGroup->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('degree_group')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Board / University * </label>
                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="board">
                                <option value="">Select an option</option>
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}"
                                        {{ $student->admissionApplication?->o_level_board_id == $board->id ? 'selected' : '' }}>
                                        {{ $board->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('board')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-25">
                            <label>School / College / Institute Name * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="institute_name"
                                value="{{ $student->admissionApplication?->o_level_Institute ?? old('institute_name') }}">
                            @error('institute_name')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Roll Number * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="roll_number"
                                value="{{ $student->admissionApplication?->o_level_roll ?? old('roll_number') }}">
                            @error('roll_number')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Registration Number * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="registration_number"
                                value="{{ $student->admissionApplication?->o_level_registration ?? old('registration_number') }}">
                            @error('registration_number')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-25">
                            <label>Passing Year * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="passing_year"
                                value="{{ $student->admissionApplication?->o_level_passing_year ?? old('passing_year') }}">
                            @error('passing_year')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Total Marks * </label>
                            <input type="number" min="0"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" name="total_marks"
                                id="total_marks"
                                value="{{ $student->admissionApplication?->o_level_total_marks ?? old('total_marks') }}">
                            @error('total_marks')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Obtained Marks * </label>
                            <input type="number" min="0"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" name="obtained_marks"
                                id="obtained_marks"
                                value="{{ $student->admissionApplication?->o_level_obtained_marks ?? old('obtained_marks') }}">
                            @error('obtained_marks')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Percentage * </label>
                            <input type="text" readonly class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="percentage" id="percentage"
                                value="{{ $student->admissionApplication?->o_level_percentage ?? '%' }}">
                            @error('percentage')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Intermediate / A-Level Information </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3">
                        <strong>Please enter your Intermediate / A-Level Marks</strong>
                    </p>
                    <div class="row">
                        <div class="col-md-4 mb-25">
                            <label>Certificate / Degree * </label>
                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="a_level_degree">
                                <option value="">Select an option</option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->id }}"
                                        {{ $student->admissionApplication?->a_level_degree_id == $degree->id ? 'selected' : '' }}>
                                        {{ $degree->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('a_level_degree')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Major Subjects * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="major_subject"
                                value="{{ $student->admissionApplication?->major_subject ?? old('major_subject') }}">
                            @error('major_subject')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Board / University * </label>
                            <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="a_level_board">
                                <option value="">Select an option</option>
                                @foreach ($boards as $boards)
                                    <option value="{{ $boards->id }}"
                                        {{ $student->admissionApplication?->a_level_board_id == $boards->id ? 'selected' : '' }}>
                                        {{ $boards->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('a_level_board')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-25">
                            <label>School / College / Institute Name * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_institute_name"
                                value="{{ $student->admissionApplication?->a_level_Institute ?? old('a_level_institute_name') }}">
                            @error('a_level_institute_name')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-25" style="display: inline-block;">
                            <label style="display: inline-block; margin-right: 10px;">Have you completed Intermediate /
                                Equivalent Degree *
                            </label>
                            @error('complate_intermediate')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                            <div class="mb-2">

                                <input class="radio-theme-default custom-radio radio" type="radio"
                                    name="complate_intermediate" id="radio-un2" value="1"
                                    {{ $student->admissionApplication?->complated_intermediate == 1 ? 'checked' : '' }}>
                                <label for="radio-un2">
                                    <span class="radio-text">Yes</span>
                                </label>


                                <input class="radio-theme-default custom-radio radio" type="radio"
                                    name="complate_intermediate" id="radio-un3" value="0"
                                    {{ $student->admissionApplication?->complated_intermediate == 0 ? 'checked' : '' }}>
                                <label for="radio-un3">
                                    <span class="radio-text">No</span>
                                </label>

                            </div>
                            <li>Please provide only Intermediate Part-I information</li>
                            <li>DAE holders should provide details of their accumulative result of first year and second
                                year</li>
                            <li>Eligibility criteria requires a minimum score of 45% or higher</li>
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Roll Number * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_roll_number"
                                value="{{ $student->admissionApplication?->a_level_roll ?? old('a_level_roll_number') }}">
                            @error('a_level_roll_number')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Registration Number * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_registration_number"
                                value="{{ $student->admissionApplication?->a_level_registration ?? old('a_level_registration_number') }}">
                            @error('a_level_registration_number')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-25">
                            <label>Passing Year * </label>
                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_passing_year"
                                value="{{ $student->admissionApplication?->a_level_passing_year ?? old('a_level_passing_year') }}">
                            @error('a_level_passing_year')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Total Marks * </label>
                            <input type="number" min="0"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15" name="a_level_total_marks"
                                id="a_level_total_marks"
                                value="{{ $student->admissionApplication?->a_level_total_marks ?? old('a_level_total_marks') }}">
                            @error('a_level_total_marks')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Obtained Marks * </label>
                            <input type="number" min="0"
                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_obtained_marks" id="a_level_obtained_marks"
                                value="{{ $student->admissionApplication?->a_level_obtained_marks ?? old('a_level_obtained_marks') }}">
                            @error('a_level_obtained_marks')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-25">
                            <label>Percentage * </label>
                            <input type="text" readonly class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                name="a_level_percentage" id="a_level_percentage"
                                value="{{ $student->admissionApplication?->a_level_percentage ?? '%' }}">
                            @error('a_level_percentage')
                                <p class="text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12 justify-content-end" id="scholarshipEligibility"
                            style="display: {{ $student->admissionApplication?->scholarship > 0 ? 'flex' : 'none' }}">
                            <div class="btn btn-primary px-2 btn-default d-flex align-items-center flex-wrap">
                                <i class="fa fa-smile" style="font-size: 26px"></i>
                                <span>
                                    CONGRATULATIONS - You are eligible for
                                    <span id="scholarshipPercent">
                                        {{ $student->admissionApplication?->scholarship ?? 0 }}%
                                    </span>Scholarship
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4 offset-md-8 mt-3">
                            To read scholarship eligiblity criteria
                            <a href="#" target="_blank">Click here</a>
                        </div>
                        <input type="hidden" name="scholarship" value="0">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-end align-items-center gap-3">
                <a href="{{ route('programs.index') }}" class="btn btn-white border-secondary border-2"
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
        var totalMarks = document.getElementById("total_marks");
        var obtainedMarks = document.getElementById("obtained_marks");
        var percentage = document.getElementById("percentage");

        var aLevelTotalMarks = document.getElementById("a_level_total_marks");
        var aLevelObtainedMarks = document.getElementById("a_level_obtained_marks");
        var aLevelPercentage = document.getElementById("a_level_percentage");

        var scholarship = 0;

        obtainedMarks.addEventListener("keyup", function() {
            if (parseInt(totalMarks.value) >= parseInt(obtainedMarks.value)) {
                percentage.value = parseInt((obtainedMarks.value / totalMarks.value) * 100);
            } else {
                percentage.value = 0
            }
        });

        totalMarks.addEventListener("keyup", function() {
            if (parseInt(totalMarks.value) >= parseInt(obtainedMarks.value)) {
                percentage.value = parseInt((obtainedMarks.value / totalMarks.value) * 100);
            } else {
                percentage.value = 0
            }
        })

        aLevelObtainedMarks.addEventListener("keyup", function() {
            if (parseInt(aLevelTotalMarks.value) >= parseInt(aLevelObtainedMarks.value)) {
                aLevelPercentage.value = parseInt((aLevelObtainedMarks.value / aLevelTotalMarks.value) * 100);
            } else {
                aLevelPercentage.value = 0
            }
            calculateScholarship(aLevelPercentage.value);
        });

        aLevelTotalMarks.addEventListener("keyup", function() {
            if (parseInt(aLevelTotalMarks.value) >= parseInt(aLevelObtainedMarks.value)) {
                aLevelPercentage.value = parseInt((aLevelObtainedMarks.value / aLevelTotalMarks.value) * 100);
            } else {
                aLevelPercentage.value = 0
            }
            calculateScholarship(aLevelPercentage.value);
        });

        function calculateScholarship(totalPercentage) {

            var aLevelPercentage = parseInt(totalPercentage);

            // Make an AJAX request
            if (aLevelPercentage >= 45) {
                $.ajax({
                    url: '{{ route('scholarship.percent') }}',
                    type: 'GET',
                    data: {
                        percentage: aLevelPercentage
                    },
                    success: function(response) {
                        if (response.scholarship) {
                            document.getElementById("scholarshipPercent").innerHTML = response.scholarship +
                            '%';
                            document.getElementsByName("scholarship")[0].value = response.scholarship;
                            if (response.scholarship > 0) {
                                document.getElementById("scholarshipEligibility").style.display = "flex";
                            }
                        } else {
                            document.getElementById("scholarshipEligibility").style.display = "none";
                        }
                    },
                    error: function(error) {

                    }
                });
            }else{
                document.getElementById("scholarshipEligibility").style.display = "none";
            }

        }
    </script>
@endpush
