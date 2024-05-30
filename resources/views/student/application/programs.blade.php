@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    <form action="{{ route('programs.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Program Preferences </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3">
                        <strong>Select a Program you intend to apply for.</strong>
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($programTypes as $programType)
                            <div class="action-btn flex-grow-1 my-sm-0" style="max-width: 320px">
                                <input type="radio" name="program_type" value="{{ $programType->id }}"
                                    class="btn-check" id="btn-checkPro{{ $programType->id }}" autocomplete="off"
                                    {{ (($student->admissionApplication?->program_type_id == $programType->id) || ($student->admissionApplication?->program_type_id == null && $loop->first ) ) ? 'checked' : '' }}>
                                <label class="programBtn text-center w-100 btn-sm btn-squared"
                                    for="btn-checkPro{{ $programType->id }}">
                                    {{ $programType->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('program_type')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror
                    <div class="d-flex">

                        <div class="d-flex rounded mt-4 px-0 border border-secondary">
                            <div class="bg-secondary text-white p-2">
                                YOUR CAMPUS
                            </div>
                            <div class="p-2">
                                Hizb ur Rehman Islamic Science College
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <Strong>
                            Please select the session you intend to apply for
                        </Strong>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($sessions as $session)
                            <div class="action-btn flex-grow-1 my-sm-0" style="max-width: 140px">
                                <input type="radio" name="session" value="{{ $session->id }}" class="btn-check" id="btn-checkSession{{ $session->id }}" autocomplete="off"
                                    {{ (($student->admissionApplication?->session_id == $session->id) || ($student->admissionApplication?->session_id == null && $loop->first ) ) ? 'checked' : '' }}>
                                <label class="programBtn text-center w-100 btn-sm btn-squared"
                                    for="btn-checkSession{{ $session->id }}">
                                    {{ $session->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('session')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror

                    <p class="mb-3 mt-4">
                        <strong>Please select weather you want to apply for the morning or evening session:</strong>
                    </p>
                    @error('program_session')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror
                    <div class="card-body pt-sm-20 pt-3">
                        <div class="d-flex flex-wrap gap-4">

                            <div class="checkbox-theme-default custom-checkbox d-flex align-items-center gap-1">
                                <input class="checkbox" name="program_session" type="checkbox" id="check-grid-1" value="morning" {{ ($student->admissionApplication?->program_session == 'morning') ? 'checked' : ''}}>
                                <label for="check-grid-1">
                                    <span class="checkbox-text">
                                        Morning Session
                                    </span>
                                </label>
                            </div>

                            <div class="checkbox-theme-default custom-checkbox d-flex align-items-center gap-1">
                                <input class="checkbox" name="program_session" type="checkbox" id="check-grid-2" value="evening" {{ ($student->admissionApplication?->program_session == 'evening') ? 'checked' : ''}}>
                                <label for="check-grid-2">
                                    <span class="checkbox-text">
                                        Evening Session
                                    </span>
                                </label>
                            </div>

                        </div>
                    </div>

                    @error('program_admission')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror
                    <div class="table4 p-25 mb-30">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th></th>
                                        <th>
                                            <span class="userDatatable-title text-info">
                                                <strong>PROGRAM</strong>
                                            </span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title text-info ">
                                                <strong>ADMISSION DEADLINE</strong>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($programAdmissions as $programAdmission)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="radio-theme-default custom-radio me-20">
                                                        <input class="radio" type="radio" name="program_admission"
                                                            value="{{ $programAdmission->id }}"
                                                            id="radio-hl{{ $programAdmission->id }}" {{ ($student->admissionApplication?->program_id_of_admission == $programAdmission->id) ? 'checked' : ''}}>
                                                        <label for="radio-hl{{ $programAdmission->id }}"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $programAdmission->program }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ \Carbon\Carbon::parse($programAdmission->admission_deadline)->format('D F d, Y H:i') }}(Pakistan Std. Time)
                                                </div>
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


        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-end align-items-center gap-3">
                <a href="{{ route('student.dashboard')}}" class="btn btn-white border-secondary border-2" style="width: 160px">
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
    $(document).ready(function () {
        $('table').on('click', 'tr', function () {
            var radioButton = $(this).find('input[type="radio"]');
            radioButton.prop('checked', true);
        });
    });
</script>


@endpush
