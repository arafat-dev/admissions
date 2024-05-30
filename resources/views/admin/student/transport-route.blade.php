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
                    <h2>Transport Routes & Fares</h2>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-body rounded border-0 mt-3">
                            <h4>Assign Transport Fare</h4>

                            <div class="table-responsive">
                                <table class="slip-table">
                                    <thead>
                                        <tr>
                                            <th>DESCRIPTION</th>
                                            <th>FEE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="feeRow">
                                            <td>
                                                <div class="description">
                                                    Standard Fare Per Kilometer for All Routes
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fee">
                                                    <span>Rs</span>
                                                    <span>5</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h4 class="mt-3">Assign Transport Routes with Distance</h4>

                            <div class="table-responsive mt-4">
                                <table class="transport-table">
                                    <thead>
                                        <tr>
                                            <th>ROUTE NO</th>
                                            <th>ROUTE DESCRIPTION</th>
                                            <th>DISTANCE</th>
                                            <th>PER DAY</th>
                                            <th>TOTAL DAYS</th>
                                            <th>PER MONTH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transportRoutes as $transportRoute)
                                        <tr class="feeRow">
                                            <td>
                                                <div class="item route">
                                                    Route No. {{ $transportRoute->route_no }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="description">
                                                    <p class="mb-0 title">
                                                        {{ $transportRoute->title }}
                                                    </p>

                                                    <div class="address">
                                                        {{ $transportRoute->description }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="item">
                                                    <span>{{$transportRoute->distance}}</span>
                                                    <span>Km</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="item">
                                                    <span>Rs</span>
                                                    <span>{{ $transportRoute->per_day_fee }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="item">
                                                    <span>{{ $transportRoute->total_days }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <div class="item">
                                                        <span>Rs</span>
                                                        <span>{{ $transportRoute->per_month_fee }}</span>
                                                    </div>
                                                    <div class="edit" onclick="openUpdateModal({{$transportRoute}})">
                                                        <i class="bi bi-pencil"></i>
                                                    </div>

                                                    <a href="{{ route('admin.transport.route.delete', $transportRoute->id) }}" class="delete delete-confirm">
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
                                {{ $transportRoutes->links() }}
                            </div>

                            <div class="d-flex flex-wrap gap-2 justify-content-between mt-4">
                                <button class="custom-btn menuBtn active px-5" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add New Route
                                </button>
                            </div>

                            <!-- Create Fees modal -->
                            <form action="{{ route('admin.transport.route.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New Route</h5>
                                            </div>
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label for="">Title(From - To)</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Enter Title" required>
                                                </div>

                                                <div>
                                                    <label class="mb-0">Description</label>
                                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter Description" required></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Route No</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">No</span>
                                                            <input type="number" min="1" name="route_no" class="form-control" placeholder="Enter Route No" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Distance</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Km</span>
                                                            <input type="number" min="0" name="distance" class="form-control" placeholder="Enter Distance in Km" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Per Day</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs</span>
                                                            <input type="number" min="0" name="per_day" class="form-control" placeholder="Enter Per Day" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Total Days</label>
                                                            <input type="number" min="0" name="total_days" class="form-control" placeholder="Enter Total Days" required>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label class="mb-0">Per Month</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs</span>
                                                            <input type="number" min="0" name="per_month" class="form-control" placeholder="Enter Per Month" required>
                                                        </div>
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
                                                <h5 class="modal-title">Edit Transport Route</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="">Title(From - To)</label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        placeholder="Enter Title" required>
                                                </div>

                                                <div>
                                                    <label class="mb-0">Description</label>
                                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter Description" required></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Route No</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">No</span>
                                                            <input type="number" id="route_no" min="1" name="route_no" class="form-control" placeholder="Enter Route No" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Distance</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Km</span>
                                                            <input type="number" id="distance" min="0" name="distance" class="form-control" placeholder="Enter Distance in Km" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Per Day</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs</span>
                                                            <input type="number" id="per_day" min="0" name="per_day" class="form-control" placeholder="Enter Per Day" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label class="mb-0">Total Days</label>
                                                            <input type="number" id="total_days" min="0" name="total_days" class="form-control" placeholder="Enter Total Days" required>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label class="mb-0">Per Month</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rs</span>
                                                            <input type="number" id="per_month" min="0" name="per_month" class="form-control" placeholder="Enter Per Month" required>
                                                        </div>
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
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script-footer-graph')
    <script>
        const openUpdateModal = (transportRoute) => {

            //set values
            $("#title").val(transportRoute.title);
            $("#description").val(transportRoute.description);
            $("#route_no").val(transportRoute.route_no);
            $("#distance").val(transportRoute.distance);
            $("#per_day").val(transportRoute.per_day_fee);
            $("#total_days").val(transportRoute.total_days);
            $("#per_month").val(transportRoute.per_month_fee);

            //set action
            $("#updateModal").attr('action', `{{ route('admin.transport.route.update', ':id') }}`.replace(':id',
            transportRoute.id));

            //show modal
            $("#editModal").modal('show');
        }
    </script>
@endpush
