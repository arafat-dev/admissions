@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    @php
        $hostelFacility = $student->admissionApplication?->hostel_facility;
        $transportFacility = $student->admissionApplication?->transport_facility;
        $rout = $student->admissionApplication?->route;

        $hostelFacility = $hostelFacility ? json_decode($hostelFacility) : null;
        $transportFacility = $transportFacility ? json_decode($transportFacility) : null;
        $rout = $rout ? json_decode($rout) : null;
    @endphp

    <form action="{{ route('facilities.save') }}" method="POST">
        @csrf
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-header">
                    <h6>Hostel Facility </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3">
                        <strong>Hostel facility is only allowed to the students of Regular/Morning Programs on Merit
                            Basis</strong>
                    </p>
                    <div class="row">
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="hostel_facility[]" value="1" class="checkbox" type="checkbox" id="check-un1" {{ $hostelFacility ? (in_array(1, $hostelFacility) ? 'checked' : '') : ''}}>
                                <label for="check-un1">
                                    <span class="checkbox-text">
                                        Check this box, only if you want to avail hostel facilities
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="hostel_facility[]" value="2" class="checkbox" type="checkbox" id="check-hostelRules" {{ $hostelFacility ? (in_array(2, $hostelFacility) ? 'checked' : '') : ''}}>
                                <label for="check-hostelRules">
                                    <span class="checkbox-text">
                                        By checking this box, you are agreeing to our rules, regulations and policies of
                                        hostel accommodation To read all policies <a href="#">Click here</a>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <h6>Transport Facility </h6>
                </div>
                <div class="card-body py-md-30">
                    <p class="mb-3">
                        <strong>Transport facility is only allowed to the students of Regular/Morning Programs on Merit
                            Basis</strong>
                    </p>
                    <div class="row">
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="transport_facility[]" value="1" class="checkbox" type="checkbox" id="check-transport" {{ $transportFacility ? (in_array(1, $transportFacility) ? 'checked' : '') : ''}}/>
                                <label for="check-transport">
                                    <span class="checkbox-text">
                                        Check this box, only if you want to avail transport facility
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="transport_facility[]" value="2" class="checkbox" type="checkbox" id="check-transportRules" {{ $transportFacility ? (in_array(2, $transportFacility) ? 'checked' : '') : ''}}/>
                                <label for="check-transportRules">
                                    <span class="checkbox-text">
                                        By checking this box, you are agreeing to our rules, regulations and policies of
                                        transport facility To read all policies <a href="#">Click here</a>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-header">
                    <p>
                        <strong>Please select the desired rout of transport</strong>
                    </p>
                </div>
                <div class="card-body py-md-30">
                    <div class="row">
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="1" class="checkbox" type="checkbox" id="check-rout1" {{ $rout ? (in_array(1, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout1">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 1</strong>
                                    </span> <br>
                                    From Chandni Chowk to Qadir Bakhsh Sharif <br>
                                    Via Chak No. R, 110/7-R 109/7-R-111/7 Old Chicha Watani 11 Moz, Sheikh Tayyab, Khan Ra
                                    Chak 737 Dakir, Kalia Chowk, Chhoti 37, Mana , Qadir Bakhsh Sharif <br>
                                    Total distance 30 KM
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="2" class="checkbox" type="checkbox" id="check-rout2" {{ $rout ? (in_array(2, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout2">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 2</strong>
                                    </span> <br>
                                    From Lindwell to Qadir Bakhsh Sharif <br>
                                    Via Inayat Shah, 664/5 Gab, Sugar Mill, Kot Khatran, Sarfraz Mor, Kamalia City, Kamalia
                                    Bypass, Mill Fatiana, Azmat Shah, Qadir Bakhsh Sharif <br>
                                    Total Distance 23 KM
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="3" class="checkbox" type="checkbox" id="check-rout3" {{ $rout ? (in_array(3, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout3">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 3</strong>
                                    </span> <br>
                                    From Aza Husi, Jakhar Road to Qadir Bakhsh Sharif <br>
                                    Via Jakhar GB, 734/GB, 735/GB, 742/GB 740/GB/733, Manof 738, Ranjhian Valadir and Anna,
                                    Kadir Bakhsh Sharif <br>
                                    Total distance 26 km
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="4" class="checkbox" type="checkbox" id="check-rout4" {{ $rout ? (in_array(4, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout4">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 4</strong>
                                    </span> <br>
                                    From Mamun Kanjan to Qadir Bakhsh Sharif <br>
                                    Via GB/504, Dholer Sharif, Vinsanwala Moradi Khokhar, Khod, Syed Moi, Sheikh Burhan,
                                    Mauza Member, Kadir Bakhsh Sharif <br>
                                    Total Distance 30 KM
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="5" class="checkbox" type="checkbox" id="check-rout5" {{ $rout ? (in_array(5, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout5">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 5</strong>
                                    </span> <br>
                                    From Mir Dad Maffi to Qadir Bakhsh Sharif <br>
                                    Via Dad Zed Bala, Murad Ki Har Pa Road, Murad K Kathian, Ravi Keil, Mill Fatiana, Bachi
                                    Kapil, Tar, Haveli, Qadir Bakhsh Sharif <br>
                                    Total Distance 48 KM
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="6" class="checkbox" type="checkbox" id="check-rout6" {{ $rout ? (in_array(6, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout6">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 6</strong>
                                    </span> <br>
                                    From Wangi Ada to Qadir Bakhsh Sharif <br>
                                    Via GB 724/GB718/GB 717/GB-716/GB, 715/GB: 714/GB/725, Jakhril, Veer and Anna, Qadir
                                    Bakhsh Sharif <br>
                                    Total distance 30 KM
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-25">
                            <div class="checkbox-theme-default custom-checkbox ">
                                <input name="rout[]" value="7" class="checkbox" type="checkbox" id="check-rout7" {{ $rout ? (in_array(7, $rout) ? 'checked' : '') : ''}}>
                                <label for="check-rout7">
                                    <span class="checkbox-text text-info">
                                        <strong>ROUT - 7</strong>
                                    </span> <br>
                                    From Mauza Ko Mill to Qadir Bakhsh Sharif <br>
                                    Via 665/5, 666/5, 662/5, 664/5, 663/5, Inayat Shah, Sugar Mill, Sarfraz Mor, Kamalia
                                    Bypass Kadir Bakhsh Sharif <br>
                                    Total distance 30 KM
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-3">
            <div class="d-flex justify-content-end align-items-center gap-3">
                <a href="{{ route('qualifications.index') }}" class="btn btn-white border-secondary border-2"
                    style="width: 160px">
                    Back
                </a>
                <button type="submit" class="btn btn-primary" style="width: 160px">
                    Save & Next
                </button>
            </div>
        </div>
    </form>
@endsection
