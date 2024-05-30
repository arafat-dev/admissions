
    <div class="card p-5">
        <div>
            <h2>Suspend Student</h2>
        </div>
        <div class="card-body row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1 active font-weight-bold px-0" id="Student_suspend-tab"
                            data-toggle="tab" href="#Student_suspend" role="tab" aria-controls="Student_suspend"
                            aria-selected="true">Suspend Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1" id="ActiveStudent-tab" data-toggle="tab" href="#ActiveStudent"
                            role="tab" aria-controls="ActiveStudent" aria-selected="true">Activate Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1" id="Record-tab" data-toggle="tab"
                            href="#Record" role="tab" aria-controls="Record"
                            aria-selected="true">View Suspension Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="" id="ActiveStudent-tab" data-toggle="tab" href="#ActiveStudent"role="tab" aria-controls="ActiveStudent" aria-selected="true"></a>
                    </li>
                    <li class="nav-item">
                        <a class="" id="Record-tab" data-toggle="tab" href="#Record" role="tab" aria-controls="Record" aria-selected="true"></a>
                    </li>
                </ul>

                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="Student_suspend" role="tabpanel"
                        aria-labelledby="Student_suspend-tab">
                        <form>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="mt-5">Reason for Suspending the student<span>*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea rows="5" style="width: 100%;"></textarea>
                                    </div>

                                </div>
                                <button type="submit" class="btn bg-cstm-success text-white float-left mt-5">Suspend Student</button>

                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="ActiveStudent" role="tabpanel"
                        aria-labelledby="ActiveStudent-tab">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="mt-5">Reason for Activating the student <span>*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea rows="5" style="width: 100%;"></textarea>
                                    </div>

                                </div>
                                <button type="submit" class="btn bg-cstm-success text-white float-left mt-5">Activate Student</button>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="Record" role="tabpanel"
                        aria-labelledby="Record-tab">
                        <div class="p-2 custom-card">
                            <h5 class="cstm-text-success py-2">Consultations Listaaaa</h5>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-primary">#</th>
                                            <th scope="col" class="text-primary">SUSPENSION DATE</th>
                                            <th scope="col" class="text-primary">ACTIVATION DATE</th>
                                            <th scope="col" class="text-primary">VIEW REASON</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <th scope="row">01</th>
                                            <td>28-01-2023</td>
                                            <td>03-01-2023</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">02</th>
                                            <td>23-02-2023</td>
                                            <td>23-02-2023</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">03</th>
                                            <td>28-01-2023</td>
                                            <td>28-01-2023</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
