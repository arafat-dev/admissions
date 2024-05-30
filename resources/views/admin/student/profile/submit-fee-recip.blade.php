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

                                @foreach ($fees as $studentFee)
                                    <div class="row mt-3 align-items-center">
                                        <div class="col-lg-4 mt-2">
                                            <label class="mb-0">
                                                {{ \Carbon\Carbon::parse($studentFee->month)->format('F') }}
                                            </label>
                                            <input class="form-control form-control-file" type="file" />
                                        </div>

                                        <!-- selected image name -->
                                        <div class="col-lg-4 mt-2 overflow-hidden">
                                            <label></label>
                                            <div class="row">
                                                <div class="col-9 px-0 d-flex align-items-center gap-1">
                                                    <input type="checkbox" checked>
                                                    <div class="text-clipic">
                                                        {{ $studentFee->receip_file ?? '' }}</div>
                                                </div>

                                                <div class="col-3 px-1 d-flex gap-2 align-items-center">
                                                    <button class="removeBtn border-0" disabled
                                                        style="background: #ccc !important">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <a class="downloadBtn"
                                                        href="{{ asset('studentFees') . '/' . $studentFee->receip_file }}"
                                                        download="">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mt-2">
                                            <label></label>
                                            <div class="d-flex gap-3">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rs</span>
                                                    </div>
                                                    <input type="text" class="form-control text-right"
                                                        placeholder="Enter amount" value="{{ $studentFee->amount }}"
                                                        readonly />
                                                </div>

                                                <button class="btn btn-muted btn-sm rounded" disabled type="button">
                                                    FEE SUBMITED
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                                <!-- due months -->
                                @foreach ($dueMonths as $month)
                                    @php
                                        $month = \Carbon\Carbon::parse($month);
                                        $recepName = 'recipName'.$month->format('F');
                                        $recepFile = 'recipFile'.$month->format('F');
                                        $file = 'file'.$month->format('F');
                                    @endphp
                                    <form
                                        action="{{ route('admin.student.profile.submitfeereceipt.update', $admissionApplication->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="date" value="{{ $month->format('F-Y') }}">
                                        <div class="row mt-3 align-items-center">
                                            <div class="col-lg-4 mt-2">
                                                <label class="mb-0">{{ $month->format('F') }}</label>
                                                <input class="form-control form-control-file" type="file" id="{{ $file }}" name="recip_file" onchange="showFile(event,'{{ $recepFile }}','{{ $recepName }}')" required />
                                            </div>

                                            <!-- selected image name -->
                                            <div class="col-lg-4 mt-2 overflow-hidden d-none"
                                                id="{{ $recepFile }}">
                                                <label></label>
                                                <div class="row">
                                                    <div class="col-9 px-0 d-flex align-items-center gap-1">
                                                        <div class="text-clipic" id="{{$recepName}}"></div>
                                                    </div>

                                                    <div class="col-3 px-1 d-flex gap-2 align-items-center">
                                                        <button type="button" class="removeBtn border-0" onclick="removeFile('{{ $file }}','{{ $recepFile }}')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <a class="downloadBtn" href="javascript:void(0)" style="background: #ccc !important">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mt-2">
                                                <label></label>
                                                <div class="d-flex gap-3">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">Rs</span>
                                                        </div>
                                                        <input type="text" class="form-control text-right"
                                                            placeholder="Enter amount" name="amount" required />
                                                    </div>

                                                    <button class="btn btn-success btn-sm rounded">SUBMIT FEE</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('style')

<script>
    const showFile=(event,id,name)=>{
        document.getElementById(id).classList.remove('d-none')
        document.getElementById(name).innerHTML=event.target.files[0].name
    }

    const removeFile=(file,name)=>{
        document.getElementById(file).value=null
        document.getElementById(name).classList.add('d-none')
    }
</script>

@endpush

