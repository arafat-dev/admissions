<!--====================================-->
<!--////////////  Header ////////////-->
<!--====================================-->
@php
    $student = auth()->user();
    $admissionApplication = $student?->admissionApplication;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main application-ui mb-30">
                <div class="breadcrumb-action d-flex flex-wrap gap-3 justify-content-start">
                    <div class="my-sm-0">
                        <a href="{{ route('student.dashboard') }}"
                            class="btn  btn-default btn-squared text-capitalize text-white {{ request()->routeIs('student.dashboard') ? 'btn-primary' : 'btn-secondary' }}">
                            STUDENT  PROFILE
                        </a>
                    </div>
                    <div class="my-sm-0" data-bs-toggle="buttons">
                        <a href="{{ route('programs.index') }}" class="btn btn-default {{ request()->routeIs('programs.index') ? 'btn-primary' : 'btn-secondary' }}">
                            SELECT PROGRAM
                        </a>
                    </div>
                    <div class="my-sm-0" data-bs-toggle="buttons">
                        <a href="{{ route('qualifications.index') }}" class="btn btn-default {{ request()->routeIs('qualifications.index') ? 'btn-primary' : 'btn-secondary' }}">
                            QUALIFICATIONS
                        </a>
                    </div>
                    <div class="my-sm-0" data-bs-toggle="buttons">
                        <a href="{{ route('documents.index') }}" class="btn btn-default {{ request()->routeIs('documents.index') ? 'btn-primary' : 'btn-secondary' }}">
                            DOCUMENT UPLOADS
                        </a>
                    </div>
                    <div class="my-sm-0" data-bs-toggle="buttons">
                        <a href="{{ route('facilities.index') }}" class="btn btn-default  {{ request()->routeIs('facilities.index') ? 'btn-primary' : 'btn-secondary' }}">
                            SELECT FACILITIES
                        </a>
                    </div>
                    <div class="my-sm-0" data-bs-toggle="buttons">
                        <a href="{{ route('submit.index') }}" class="btn btn-default {{ request()->routeIs('submit.index') ? 'btn-primary' : 'btn-secondary' }}">
                            SUBMIT
                        </a>
                    </div>
                    <div class="my-sm-0 " data-bs-toggle="buttons">
                        <a href="{{ route('downloads.index') }}" class="btn btn-default {{ request()->routeIs('downloads.index') ? 'btn-primary' : 'btn-secondary' }}">
                            DOWNLOAD & PRINT
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
