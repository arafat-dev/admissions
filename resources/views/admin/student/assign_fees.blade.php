@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">
        <style>
            .edit {
                display: none !important;
                padding: 2px 6px;
                border: 1px dotted #ccc;
                border-radius: 4px;
                cursor: pointer;
            }
            .delete {
                display: none !important;
                padding: 2px 6px;
                border: 1px dotted #ff0000;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;
            }

            .feeRow:hover .edit, .feeRow:hover .delete {
                display: block !important;
            }
        </style>

        <div class="container-fluid dashboard-content">
            <div class="">
                <div>
                    <h2>Assign Program Fees</h2>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        Select Program
                    </div>

                    <div class="col-lg-10">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($programTypes as $program)
                                <a href="{{ route('admin.assign.fees', $program->id) }}"
                                    class="programBtn {{ $programType->id == $program->id ? 'active' : '' }}">
                                    {{ $program->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-2"></div>
                    <div class="col-lg-10 pl-md-0">

                        @php
                            $middleHigh = $programType->slug == 'middle_or_high_school' ? true : false;
                        @endphp

                        <div class="row">
                            <div class="{{ $middleHigh ? 'col-lg-6' : 'col-lg-12' }}">

                                <div class="card card-body rounded border-0 mt-3">
                                    @if ($middleHigh)
                                        <h5>Middle School - Grade 6-8</h5>
                                    @else
                                        <h5>{{ $programType->name }}</h5>
                                    @endif

                                    <div class="table-responsive mt-4">
                                        <table class="slip-table">
                                            <thead>
                                                <tr>
                                                    <th>DESCRIPTION</th>
                                                    <th>FEE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $programeFees = $programType->fees()->where('type', 'a')->get();
                                                @endphp
                                                @foreach ($programeFees as $programeFee)
                                                    <tr class="feeRow">
                                                        <td>
                                                            <div class="description">
                                                                {{ $programeFee->name }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2 align-items-center">
                                                                <div class="fee">
                                                                    <span>Rs</span>
                                                                    <span>{{ $programeFee->fee }}</span>
                                                                </div>
                                                                <div class="edit"
                                                                    onclick="openUpdateModal({{ $programeFee }})">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>

                                                                <a href="{{route('admin.assign.fees.delete', $programeFee->id) }}" class="delete text-danger delete-confirm">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2 justify-content-between mt-4">
                                        <button class="custom-btn menuBtn active px-5" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Add New Fee
                                        </button>
                                    </div>

                                    <!-- Create Fees modal -->
                                    <form action="{{ route('admin.assign.fees.store', $programType->id) }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="exampleModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label class="mb-0">Description</label>
                                                        <textarea name="description" class="form-control" rows="2" placeholder="Enter Description" required></textarea>
                                                        <input type="hidden" name="type" value="a">

                                                        <div class="mt-3">
                                                            <label class="mb-0">Fee</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rs</span>
                                                                <input type="number" name="fee" class="form-control"
                                                                    placeholder="Enter Fee" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary rounded"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary px-4 rounded">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Edit Fees modal -->
                                    <form id="updateProgram" action="" method="POST">
                                        @csrf
                                        <div class="modal fade" id="editModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Fees</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label class="mb-0">Description</label>
                                                        <textarea name="description" id="description" class="form-control" rows="2" placeholder="Enter Description"
                                                            required></textarea>

                                                        <input type="hidden" name="type" value="a">

                                                        <div class="mt-3">
                                                            <label class="mb-0">Fee</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rs</span>
                                                                <input type="number" id="fee" name="fee"
                                                                    class="form-control" placeholder="Enter Fee" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary rounded"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary px-4 rounded">Update
                                                            And Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>

                            @if ($middleHigh)
                                <div class="col-lg-6 mt-3">

                                    <div class="card card-body rounded border-0 ">
                                        <h5>High School - Grade 9-10</h5>

                                        <div class="table-responsive mt-4">
                                            <table class="slip-table">
                                                <thead>
                                                    <tr>
                                                        <th>DESCRIPTION</th>
                                                        <th>FEE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $programeFees = $programType->fees()->where('type', 'b')->get();
                                                    @endphp
                                                    @foreach ($programeFees as $programeFee)
                                                        <tr class="feeRow">
                                                            <td>
                                                                <div class="description">
                                                                    {{ $programeFee->name }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex gap-2 align-items-center">
                                                                    <div class="fee">
                                                                        <span>Rs</span>
                                                                        <span>{{ $programeFee->fee }}</span>
                                                                    </div>
                                                                    <div class="edit"
                                                                    onclick="openUpdateModalHigh({{ $programeFee }})">
                                                                    <i class="bi bi-pencil"></i>
                                                                </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2 justify-content-between mt-4">
                                            <button class="custom-btn menuBtn active px-5" data-toggle="modal"
                                                data-target="#createHighSchoolModal">
                                                Add New Fee
                                            </button>
                                        </div>

                                        <!-- Create Fees modal -->
                                        <form action="{{ route('admin.assign.fees.store', $programType->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal fade" id="createHighSchoolModal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Add Fees For High School - Grade 9-10
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label class="mb-0">Description</label>
                                                            <textarea name="description" class="form-control" rows="2" placeholder="Enter Description" required></textarea>
                                                            <input type="hidden" name="type" value="b">

                                                            <div class="mt-3">
                                                                <label class="mb-0">Fee</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">Rs</span>
                                                                    <input type="number" name="fee"
                                                                        class="form-control" placeholder="Enter Fee"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary rounded"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary px-4 rounded">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- Edit Fees modal -->
                                    <form id="updateProgramHigh" action="" method="POST">
                                        @csrf
                                        <div class="modal fade" id="editModalHigh">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Edit Fees For High School - Grade 9-10
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label class="mb-0">Description</label>
                                                        <textarea name="description" id="descriptionHigh" class="form-control" rows="2" placeholder="Enter Description"
                                                            required></textarea>

                                                        <input type="hidden" name="type" value="b">

                                                        <div class="mt-3">
                                                            <label class="mb-0">Fee</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Rs</span>
                                                                <input type="number" id="feeHigh" name="fee"
                                                                    class="form-control" placeholder="Enter Fee" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary rounded"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary px-4 rounded">Update
                                                            And Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script-footer-graph')
    <script>
        const openUpdateModal = (programType) => {

            $("#fee").val(programType.fee);
            $("#description").val(programType.name);
            $("#updateProgram").attr('action', `{{ route('admin.assign.fees.update', ':id') }}`.replace(':id',
                programType.id));

            $("#editModal").modal('show');
        }

        const openUpdateModalHigh = (programType) => {
            $("#feeHigh").val(programType.fee);
            $("#descriptionHigh").val(programType.name);
            $("#updateProgramHigh").attr('action', `{{ route('admin.assign.fees.update', ':id') }}`.replace(':id',
                programType.id));

            $("#editModalHigh").modal('show');
        }
    </script>
@endpush
