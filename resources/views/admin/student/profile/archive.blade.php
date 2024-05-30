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
                        
                        <form action="{{ route('admin.student.profile.archive.update', $admissionApplication->id) }}" method="POST">
                            @csrf
                            <div class="card mt-3 rounded">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="">Reason</label>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea rows="3" name="reason" class="form-control" placeholder="Enter your reason" required>{{ $admissionApplication->archive_reason }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mt-3 bg-success text-white rounded">
                                        Archive Student
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
