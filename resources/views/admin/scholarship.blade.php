@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">
        <style>
            .edit {
                padding: 1px 4px;
                border: 1px dotted #1ab3ff;
                border-radius: 4px;
                font-size: 12px;
                cursor: pointer;
            }

            .edit:hover {
                background-color: #1ab3ff;
                color: #fff;
            }

            .delete {
                padding: 1px 4px;
                border: 1px dotted #ff0000;
                color: #ff0000;
                border-radius: 4px;
                cursor: pointer;
                font-size: 12px;

                &:hover {
                    background: #ff0000;
                    color: #fff;
                }
            }
        </style>

        <div class="container-fluid dashboard-content">
            <div class="">
                <div>
                    <h2>Scholarships</h2>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        Select Program
                    </div>

                    <div class="col-lg-10">
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($programTypes as $program)
                                <a href="{{ route('admin.scholarship','program='.$program->id) }}"
                                    class="programBtn {{ $programType->id == $program->id ? 'active' : '' }}">
                                    {{ $program->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <div class="card card-body rounded border-0 mt-3">
                            <h4>Assign Scholarship Percentage</h4>

                            <div class="table-responsive mt-2">
                                <table class="transport-table">
                                    <thead>
                                        <tr>
                                            <th>OBTAINED MARKS %</th>
                                            <th>SCHOLARSHIP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programType->scholarships as $scholarship)
                                            <tr>
                                                <td>
                                                    <div class="item">
                                                        {{ $scholarship->from }} - {{ $scholarship->to }}%
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="item">
                                                        {{ $scholarship->percentage }}%
                                                    </div>
                                                </td>

                                                <td>

                                                    <div class="d-flex gap-2 align-items-center item">
                                                        <div class="edit" onclick="openUpdateModal({{ $scholarship }})">
                                                            <i class="bi bi-pencil"></i>
                                                        </div>

                                                        <a href="{{ route('admin.scholarship.delete', $scholarship->id) }}"
                                                            class="delete delete-confirm">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>


                            <button class="custom-btn menuBtn active mt-3" data-toggle="modal" data-target="#exampleModal">
                                Add New Scholarship
                            </button>

                            <!-- Create Fees modal -->
                            <form action="{{ route('admin.scholarship.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Scholarship</h5>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="program" value="{{ request('program') }}">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <label for="">Obtained Marks From</label>
                                                            <input type="number" name="from" class="form-control"
                                                                placeholder="From" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <label for="">Obtained Marks To</label>
                                                            <input type="number" name="to" class="form-control"
                                                                placeholder="To" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <label for="">Scholarship Percentage</label>
                                                    <input type="text" name="percentage" class="form-control"
                                                        placeholder="Enter scholarship percentage" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary px-4 rounded">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Edit Fees modal -->
                            <form id="updateModal" action="" method="POST">
                                @csrf
                                <div class="modal fade" id="editModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Scholarship</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <label for="">Obtained Marks From</label>
                                                            <input type="number" name="from" id="from" class="form-control"
                                                                placeholder="From" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <label for="">Obtained Marks To</label>
                                                            <input type="number" name="to" id="to"  class="form-control"
                                                                placeholder="To" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <label for="">Scholarship Percentage</label>
                                                    <input type="text" name="percentage" class="form-control" id="percentage"
                                                        placeholder="Enter scholarship percentage" required>
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
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script-footer-graph')
    <script>
        const openUpdateModal = (scholarship) => {
            //set values
            $("#from").val(scholarship.from);
            $("#to").val(scholarship.to);
            $("#percentage").val(scholarship.percentage);

            //set action
            $("#updateModal").attr('action', `{{ route('admin.scholarship.update', ':id') }}`.replace(':id',
                scholarship.id));

            //show modal
            $("#editModal").modal('show');
        }
    </script>
@endpush
