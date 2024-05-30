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
                    <h2>Sessions list</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-body rounded border-0 mt-3">
                            <h4>Sessions</h4>

                            <div class="table-responsive mt-4">
                                <table class="transport-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessions as $session)
                                            <tr>
                                                <td>
                                                    <div class="description">
                                                        {{ $session->name }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex gap-2 align-items-center item">
                                                        <div class="edit" onclick="openUpdateModal({{ $session }})">
                                                            <i class="bi bi-pencil"></i>
                                                        </div>

                                                        <a href="{{ route('admin.session.delete', $session->id) }}"
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

                            <div>
                                {{ $sessions->links() }}
                            </div>

                            <button class="custom-btn menuBtn active mt-3" data-toggle="modal" data-target="#exampleModal">
                                Add New Session
                            </button>

                            <!-- Create Fees modal -->
                            <form action="{{ route('admin.session.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Session</h5>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Enter Session Name" required>
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
                                                <h5 class="modal-title">Edit Session</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Enter Name" required>
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
        const openUpdateModal = (session) => {

            //set values
            $("#name").val(session.name);

            //set action
            $("#updateModal").attr('action', `{{ route('admin.session.update', ':id') }}`.replace(':id',
                session.id));

            //show modal
            $("#editModal").modal('show');
        }
    </script>
@endpush
