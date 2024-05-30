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
                    <h2>Program Type list</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-body rounded border-0 mt-3">
                            <h4>All Program Type</h4>

                            <div class="table-responsive mt-4">
                                <table class="transport-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Short Name</th>
                                            <th>Total Session</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programTypes as $programType)
                                            <tr>
                                                <td>
                                                    <div class="description">
                                                        {{ $programType->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="item">
                                                        {{ $programType->short_name }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="item">
                                                        {{ $programType->total_session }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2 align-items-center item">
                                                        <div class="edit"
                                                            onclick="openUpdateModal({{ $programType }})">
                                                            <i class="bi bi-pencil"></i>
                                                        </div>

                                                        <a href="{{ route('admin.program.admission.delete', $programType->id) }}"
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
                                Add New Program Type
                            </button>

                            <!-- Create Fees modal -->
                            <form action="{{ route('admin.program.admission.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Program</h5>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="">Program Type Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter Program Subject Name" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="">Short Name</label>
                                                        <input type="text" name="short_name" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class=" col-sm-6 mt-3">
                                                        <label for="">Total Session</label>
                                                        <input type="number" name="total_session" class="form-control" required>
                                                    </div>
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
                                                <h5 class="modal-title">
                                                    Edit Program Type
                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="">Program Type Name</label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="Enter Program Subject Name" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="">Short Name</label>
                                                        <input type="text" name="short_name" id="short_name" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class=" col-sm-6 mt-3">
                                                        <label for="">Total Session</label>
                                                        <input type="number" name="total_session" id="total_session" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary px-4 rounded">
                                                    Save And Update
                                                </button>
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
        const openUpdateModal = (programAdmission, date, time) => {
            console.log(programAdmission, date, time);

            //set values
            $("#name").val(programAdmission.program);
            $("#admission_deadline").val(date);
            $("#time").val(time);

            //set action
            $("#updateModal").attr('action', `{{ route('admin.program.admission.update', ':id') }}`.replace(':id',
                programAdmission.id));

            //show modal
            $("#editModal").modal('show');
        }
    </script>
@endpush
