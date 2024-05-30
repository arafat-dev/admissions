
    <div class="card p-5">
        <div>
            <h2>Fees & Payments</h2>
        </div>
        <div class="card-body row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs d-flex justify-content-between" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1 active font-weight-bold px-0" id="FeesRecord-tab"
                            data-toggle="tab" href="#FeesRecord" role="tab" aria-controls="FeesRecord"
                            aria-selected="true">Fees Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1" id="PaidReceipt-tab" data-toggle="tab" href="#PaidReceipt"
                            role="tab" aria-controls="PaidReceipt" aria-selected="true">Paid Receipts</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info px-1 py-1" id="PaySlip-tab" data-toggle="tab"
                            href="#PaySlip" role="tab" aria-controls="PaySlip"
                            aria-selected="true">Generate Pay Slip</a>
                    </li>
                    <li class="nav-item">
                        <a class="" id="PaidReceipt-tab" data-toggle="tab" href="#PaidReceipt"role="tab" aria-controls="PaidReceipt" aria-selected="true"></a>
                    </li>
                    <li class="nav-item">
                        <a class="" id="PaySlip-tab" data-toggle="tab" href="#PaySlip" role="tab" aria-controls="PaySlip" aria-selected="true"></a>
                    </li>
                </ul>

                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="FeesRecord" role="tabpanel"
                        aria-labelledby="FeesRecord-tab">
                        <form>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-primary">MONTH</th>
                                            <th scope="col" class="text-primary">TOTAL PACKAGE</th>
                                            <th scope="col" class="text-primary">DISCOUNT</th>
                                            <th scope="col" class="text-primary">PAID</th>
                                            <th scope="col" class="text-primary">CREDITS</th>
                                            <th scope="col" class="text-primary">OUTSTANDING</th>
                                            <th scope="col" class="text-primary">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: 1px solid;">
                                        <tr>
                                            <th style="border: 1px solid;">JANUARY</th>
                                            <td style="border: 1px solid;">Rs       25,000</td>
                                            <td style="border: 1px solid;">Rs        5,000</td>
                                            <td style="border: 1px solid;">Rs       10,000</td>
                                            <td style="border: 1px solid;">Rs       0</td>
                                            <td style="border: 1px solid;">Rs       10,000</td>
                                            <td style="border: 1px solid;"><span class="text-danger">OVERDUE</span></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid;">JANUARY</th>
                                            <td style="border: 1px solid;">Rs       35,000</td>
                                            <td style="border: 1px solid;">Rs       0</td>
                                            <td style="border: 1px solid;">Rs       45,000</td>
                                            <td style="border: 1px solid;">Rs       10,000</td>
                                            <td style="border: 1px solid;">Rs       0</td>
                                            <td style="border: 1px solid;"><span class="text-success">PAID</span></td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid;">JANUARY</th>
                                            <td style="border: 1px solid;">Rs       25,000</td>
                                            <td style="border: 1px solid;">Rs        5,000</td>
                                            <td style="border: 1px solid;">Rs       10,000</td>
                                            <td style="border: 1px solid;">Rs       0</td>
                                            <td style="border: 1px solid;">Rs       10,000</td>
                                            <td style="border: 1px solid;"><span class="text-danger">OVERDUE</span></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <button type="submit" class="btn bg-cstm-success text-white float-right mt-5">Add New Record</button>

                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="PaidReceipt" role="tabpanel"
                        aria-labelledby="PaidReceipt-tab">
                        <div class="card mt-3">
                            <h3 class="card-header">Documents</h3>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-primary">RECEIPT#</th>
                                            <th scope="col" class="text-primary">DATE</th>
                                            <th scope="col" class="text-primary">BILL TO</th>
                                            <th scope="col" class="text-primary">METHOD</th>
                                            <th scope="col" class="text-primary">TOTAL PAID</th>
                                            <th scope="col" class="text-primary">VIEW</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>28-01-2023</td>
                                            <td>Muhammad Ali</td>
                                            <td>Cash</td>
                                            <td>Rs       10,000</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>28-02-2023</td>
                                            <td>Muhammad Ali</td>
                                            <td>Cash</td>
                                            <td>Rs       45,000</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">01</th>
                                            <td>28-03-2023</td>
                                            <td>Muhammad Ali</td>
                                            <td>Cash</td>
                                            <td>Rs       12,000</td>
                                            <td><button class="border-0"><i class="fa fa-address-card"></i></button></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <button type="submit" class="btn bg-cstm-success text-white float-right mt-5">Add New Record</button>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="PaySlip" role="tabpanel"
                        aria-labelledby="PaySlip-tab">
                        <div class="p-2 custom-card">
                            <h5 class="cstm-text-success py-2">Consultations Listaaaa</h5>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-primary">DESCRIPTION</th>
                                            <th scope="col" class="text-primary">FEE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="New admission Fee - Paid Once"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="---------------------"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="-----------------">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="---------------------"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="-----------------">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="---------------------"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="-----------------">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><input type="" name="" style="width: 300px;border-radius: 5px;" value="---------------------"> </td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="-----------------">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td>Sub-total</td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        35,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        15,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td>Add Credit Amount</td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        5,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td>Total Payable Amount:</td>
                                            <td>
                                                <input type="" name="" style="width: 100px;border-radius: 5px;" value="Rs        25,000">
                                             </td>
                                        </tr>
                                        <tr>
                                            <td><span>Total Amount in Words: Twenty Thousand Rupees Only</span></td>
                                        
                                            <td>
                                        
                                             </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="submit" class="btn bg-cstm-success text-white float-left mt-5">Generate Pay Slip</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
