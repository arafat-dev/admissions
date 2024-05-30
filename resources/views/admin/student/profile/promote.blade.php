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

                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="{{ route('admin.student.profile.promote.update', $admissionApplication->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <label for="name">Current Semester *</label>
                                            <div
                                                class="d-flex gap-3 align-items-center justify-content-between border p-2 rounded text-dark fw-bold">
                                                <div class="text-clipic">
                                                    {{ $admissionApplication?->programType?->short_name }} -
                                                    {{ $admissionApplication->programAdmission->program }}
                                                </div>
                                                <div class="d-flex gap-3 align-items-center">
                                                    Semester
                                                    {{ $admissionApplication->student->course_semester }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 mt-3 mt-md-0">
                                            <label for="name">Promote Semeste *</label>
                                            <div
                                                class="d-flex gap-3 align-items-center justify-content-between border py-1 px-2 rounded text-dark fw-bold">
                                                <div class="text-clipic">
                                                    {{ $admissionApplication?->programType?->short_name }} -
                                                    {{ $admissionApplication->programAdmission->program }}
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    Semester
                                                    <input type="text"
                                                        value="{{ $admissionApplication->student->course_semester + 1 }}"
                                                        name="course_semester" class="border rounded p-1 text-center"
                                                        style="width: 40px;outline: none">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mt-3 mt-md-0">
                                            <label></label>
                                            <button type="submit" class="btn bg-success text-white  rounded text-clipic"
                                                style="width: 100%">Promote
                                                Student</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
