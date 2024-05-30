@extends('admin.layout')

@section('content')
    <div class="dashboard-wrapper">

        <div class="container-fluid dashboard-content">
            <div class="">
                <div>
                    <h2>Student Record</h2>
                </div>
                <div class="row">

                    @include('admin.student.profile.inc.user-info')

                    <!--user info-->
                    <div class="col-md-2"></div>
                    <div class="col-md-10 pl-md-0">

                        <div class="mt-3">
                            @include('admin.student.profile.inc.nav-menu')
                        </div>

                        <form action="{{ route('admin.student.profile.update', $admissionApplication->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card mt-3">
                                <h3 class="card-header">Personal Information</h3>
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="profile" style="width: 120px">
                                                <img src="{{ asset('admission-documents/' . $admissionApplication->profile_image) }}"
                                                    alt="profile" loading="lazy" id="preview" />
                                            </div>
                                            <div>
                                                <ul class="p-0">
                                                    <li class="ml-5">Upload new image</li>
                                                    <li class="ml-5">Maximum size is 2MB</li>
                                                    <li class="ml-5">
                                                        To reduce your image size
                                                        <a class="link text-primary" href="#">Click here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="profile_image" class="mt-2"
                                        accept="image/jpg, image/jpeg, image/png"
                                        onchange="previewImage(event, 'preview')" />

                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Full Name (as per school, college or university
                                                    degree)<span> * </span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $admissionApplication?->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">National Identity Card CNIC /
                                                    B-Form <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" id="name" name="national_id"
                                                    value="{{ $admissionApplication?->national_id }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @php
                                                $gender = $admissionApplication?->gender;
                                            @endphp
                                            <div class="form-group">
                                                <label for="gender">Select Gender</label>
                                                <select class="form-control" id="gender">
                                                    <option value="male" {{ $gender == 'male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="female" {{ $gender == 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                    <option value="other" {{ $gender == 'other' ? 'selected' : '' }}>Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Applicant Phone Number <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ $admissionApplication->mobile }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Applicant Email <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $admissionApplication->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @php
                                                $blood_group = $admissionApplication?->blood_group;
                                            @endphp
                                            <div class="form-group">
                                                <label for="BloodGroup">Blood Group</label>
                                                <select class="form-control" name="blood_group" id="BloodGroup">
                                                    <option value="A-" {{ $blood_group == 'A-' ? 'selected' : '' }}>A
                                                        Negative (A-)</option>
                                                    <option value="A+" {{ $blood_group == 'A+' ? 'selected' : '' }}>A
                                                        Positive (A+)</option>
                                                    <option value="B-" {{ $blood_group == 'B-' ? 'selected' : '' }}>B
                                                        Negative (B-)</option>
                                                    <option value="B+" {{ $blood_group == 'B+' ? 'selected' : '' }}>B
                                                        Positive (B+)</option>
                                                    <option value="AB-" {{ $blood_group == 'AB-' ? 'selected' : '' }}>AB
                                                        Negative (AB-)</option>
                                                    <option value="AB+" {{ $blood_group == 'AB+' ? 'selected' : '' }}>AB
                                                        Positive (AB+)</option>
                                                    <option value="O-" {{ $blood_group == 'O-' ? 'selected' : '' }}>O
                                                        Negative (O-)</option>
                                                    <option value="O+" {{ $blood_group == 'O+' ? 'selected' : '' }}>O
                                                        Positive (O+)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Religion">Religion</label>
                                                <select class="form-control" id="Religion" name="religion">
                                                    @foreach ($religions as $religion)
                                                        <option value="{{ $religion->id }}"
                                                            {{ $admissionApplication->religion_record_id == $religion->id ? 'selected' : '' }}>
                                                            {{ $religion->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Date Of Birth<span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="dob"
                                                    value="{{ $admissionApplication->dob }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3 d-flex gap-4 flex-wrap">
                                            <label style="display: inline-block; margin-right: 10px;">
                                                Are you a special person *
                                            </label>
                                            <div class="d-flex gap-3">

                                                <div>
                                                    <input type="checkbox" name="special_person" value="1"
                                                        id="radio-un2"
                                                        {{ $admissionApplication->special_person == 1 ? 'checked' : '' }}>
                                                    <label for="radio-un2">
                                                        <span class="radio-text">Yes</span>
                                                    </label>
                                                </div>

                                                <div>
                                                    <input type="checkbox" name="special_person" value="0" id="radio-un3"
                                                    {{ $admissionApplication->special_person == 0 ? 'checked' : '' }}>
                                                <label for="radio-un3">
                                                    <span class="radio-text">No</span>
                                                </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @php
                                                $physical_disability = $admissionApplication->physical_disability;
                                            @endphp
                                            <div class="form-group">
                                                <label>Physical Disablity * </label>
                                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                    name="physical_disability">
                                                    <option value="">Select your physical disability</option>
                                                    <option value="Dyslexia"
                                                        {{ $physical_disability == 'Dyslexia' ? 'selected' : '' }}>Dyslexia
                                                    </option>
                                                    <option value="Hearing"
                                                        {{ $physical_disability == 'Hearing' ? 'selected' : '' }}>Hearing
                                                    </option>
                                                    <option value="Neuro/Intellectual"
                                                        {{ $physical_disability == 'Neuro/Intellectual' ? 'selected' : '' }}>
                                                        Neuro/Intellectual</option>
                                                    <option value="Mobility"
                                                        {{ $physical_disability == 'Mobility' ? 'selected' : '' }}>Mobility
                                                    </option>
                                                    <option value="Physical"
                                                        {{ $physical_disability == 'Physical' ? 'selected' : '' }}>Physical
                                                    </option>
                                                    <option value="Visual"
                                                        {{ $physical_disability == 'Visual' ? 'selected' : '' }}>Visual
                                                    </option>
                                                    <option value="Other"
                                                        {{ $physical_disability == 'Other' ? 'selected' : '' }}>Any Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="card-header mt-3">Parent Information</h3>
                                <div class="card-body">
                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="profile" style="width: 120px">
                                                <img src="{{ asset('admission-documents/' . $admissionApplication->parent_image) }}"
                                                    alt="" id="preview2">
                                            </div>
                                            <div>
                                                <ul class="p-0">
                                                    <li class="ml-5">Upload new image</li>
                                                    <li class="ml-5">Maximum size is 2MB</li>
                                                    <li class="ml-5">
                                                        To reduce your image size
                                                        <a class="link text-primary" href="#">Click here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="parent_image" class="mt-2"
                                        onchange="previewImage(event, 'preview2')" />

                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span>*</span></label>
                                                <select class="form-control form-select" name="relationship">
                                                    <option value="Father"
                                                        {{ $admissionApplication->guardian_relation == 'Father' ? 'selected' : '' }}>
                                                        Father</option>
                                                    <option value="Brother"
                                                        {{ $admissionApplication->guardian_relation == 'Brother' ? 'selected' : '' }}>
                                                        Brother</option>
                                                    <option value="Uncle"
                                                        {{ $admissionApplication->guardian_relation == 'Uncle' ? 'selected' : '' }}>
                                                        Uncle</option>
                                                    <option value="Aunt"
                                                        {{ $admissionApplication->guardian_relation == 'Aunt' ? 'selected' : '' }}>
                                                        Aunt</option>
                                                    <option value="Mother"
                                                        {{ $admissionApplication->guardian_relation == 'Mother' ? 'selected' : '' }}>
                                                        Mother</option>
                                                    <option value="Sister"
                                                        {{ $admissionApplication->guardian_relation == 'Sister' ? 'selected' : '' }}>
                                                        Sister</option>
                                                    <option value="Self"
                                                        {{ $admissionApplication->guardian_relation == 'Self' ? 'selected' : '' }}>
                                                        Self</option>
                                                    <option value="Grandfather"
                                                        {{ $admissionApplication->guardian_relation == 'Grandfather' ? 'selected' : '' }}>
                                                        Grandfather</option>
                                                    <option value="Grandmother"
                                                        {{ $admissionApplication->guardian_relation == 'Grandmother' ? 'selected' : '' }}>
                                                        Grandmother</option>
                                                    <option value="Other"
                                                        {{ $admissionApplication->guardian_relation == 'Other' ? 'selected' : '' }}>
                                                        Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="parent_name"
                                                    value="{{ $admissionApplication->guardian_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profession <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="parent_profession"
                                                    value="{{ $admissionApplication->guardian_occupation }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>National Identity Card CNIC /
                                                    B-Form <span> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="parent_national_id"
                                                    value="{{ $admissionApplication->guardian_national_id }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number <span> * </span></label>
                                                <input type="text" class="form-control" name="parent_phone"
                                                    value="{{ $admissionApplication->guardian_contact }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> Email <span> * </span></label>
                                                <input type="text" class="form-control" name="parent_email"
                                                    value="{{ $admissionApplication->guardian_email }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="card-header mt-3">Contact Information</h3>
                                <div class="card-body">
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            @php
                                                $province = $admissionApplication->province;
                                            @endphp
                                            <div class="form-group">
                                                <label for="">Province *</label>
                                                <select class="form-control form-select" name="province">
                                                    <option value="Punjab" {{ $province == 'Punjab' ? 'selected' : '' }}>
                                                        Punjab</option>
                                                    <option value="Sindh" {{ $province == 'Sindh' ? 'selected' : '' }}>
                                                        Sindh</option>
                                                    <option value="Balochistan"
                                                        {{ $province == 'Balochistan' ? 'selected' : '' }}>Balochistan
                                                    </option>
                                                    <option value="K.P.K" {{ $province == 'K.P.K' ? 'selected' : '' }}>
                                                        K.P.K</option>
                                                    <option value="AJK" {{ $province == 'AJK' ? 'selected' : '' }}>AJK
                                                    </option>
                                                    <option value="Gilgit Baltistan"
                                                        {{ $province == 'Gilgit Baltistan' ? 'selected' : '' }}>Gilgit
                                                        Baltistan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $district = $admissionApplication->district;
                                            @endphp
                                            <div class="form-group">
                                                <label>Domicile District *</label>
                                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                    name="district">
                                                    <option value="">Select your district</option>
                                                    <optgroup label="Balochistan">
                                                        <option value="Quetta"
                                                            {{ $district == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                                        <option value="Khuzdar"
                                                            {{ $district == 'Khuzdar' ? 'selected' : '' }}>Khuzdar</option>
                                                        <option value="Chagai"
                                                            {{ $district == 'Chagai' ? 'selected' : '' }}>Chagai</option>
                                                        <option value="Gwadar"
                                                            {{ $district == 'Gwadar' ? 'selected' : '' }}>Gwadar</option>
                                                        <option value="Lasbela"
                                                            {{ $district == 'Lasbela' ? 'selected' : '' }}>Lasbela</option>
                                                        <option value="Panjgur"
                                                            {{ $district == 'Panjgur' ? 'selected' : '' }}>Panjgur</option>
                                                        <option value="Zhob"
                                                            {{ $district == 'Zhob' ? 'selected' : '' }}>Zhob</option>
                                                    </optgroup>
                                                    <optgroup label="Khyber Pakhtunkhwa (KPK)">
                                                        <option value="Abbottabad"
                                                            {{ $district == 'Abbottabad' ? 'selected' : '' }}>Abbottabad
                                                        </option>
                                                        <option value="Bannu"
                                                            {{ $district == 'Bannu' ? 'selected' : '' }}>Bannu</option>
                                                        <option value="Charsadda"
                                                            {{ $district == 'Charsadda' ? 'selected' : '' }}>Charsadda
                                                        </option>
                                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                        <option value="Kohat"
                                                            {{ $district == 'Kohat' ? 'selected' : '' }}>Kohat</option>
                                                        <option value="Mardan"
                                                            {{ $district == 'Mardan' ? 'selected' : '' }}>Mardan</option>
                                                        <option value="Nowshera"
                                                            {{ $district == 'Nowshera' ? 'selected' : '' }}>Nowshera
                                                        </option>
                                                        <option value="Peshawar"
                                                            {{ $district == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                                        </option>
                                                        <option value="Swabi"
                                                            {{ $district == 'Swabi' ? 'selected' : '' }}>Swabi</option>
                                                        <option value="Swat"
                                                            {{ $district == 'Swat' ? 'selected' : '' }}>Swat</option>
                                                    </optgroup>
                                                    <optgroup label="Punjab">
                                                        <option value="Lahore"
                                                            {{ $district == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                                        <option value="Faisalabad"
                                                            {{ $district == 'Faisalabad' ? 'selected' : '' }}>Faisalabad
                                                        </option>
                                                        <option value="Rawalpindi"
                                                            {{ $district == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi
                                                        </option>
                                                        <option value="Multan"
                                                            {{ $district == 'Multan' ? 'selected' : '' }}>Multan</option>
                                                        <option value="Gujranwala"
                                                            {{ $district == 'Gujranwala' ? 'selected' : '' }}>Gujranwala
                                                        </option>
                                                        <option value="Bahawalpur"
                                                            {{ $district == 'Bahawalpur' ? 'selected' : '' }}>Bahawalpur
                                                        </option>
                                                        <option value="Sialkot"
                                                            {{ $district == 'Sialkot' ? 'selected' : '' }}>Sialkot</option>
                                                        <option value="Sheikhupura"
                                                            {{ $district == 'Sheikhupura' ? 'selected' : '' }}>Sheikhupura
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Sindh">
                                                        <option value="Karachi"
                                                            {{ $district == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                                        <option value="Hyderabad"
                                                            {{ $district == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                                                        </option>
                                                        <option value="Larkana"
                                                            {{ $district == 'Larkana' ? 'selected' : '' }}>Larkana</option>
                                                        <option value="Mirpur Khas"
                                                            {{ $district == 'Mirpur Khas' ? 'selected' : '' }}>Mirpur Khas
                                                        </option>
                                                        <option value="Sukkur"
                                                            {{ $district == 'Sukkur' ? 'selected' : '' }}>Sukkur</option>
                                                        <option value="Dadu"
                                                            {{ $district == 'Dadu' ? 'selected' : '' }}>Dadu</option>
                                                        <option value="Shikarpur"
                                                            {{ $district == 'Shikarpur' ? 'selected' : '' }}>Shikarpur
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Gilgit-Baltistan (GB)">
                                                        <option value="Gilgit"
                                                            {{ $district == 'Gilgit' ? 'selected' : '' }}>Gilgit</option>
                                                        <option value="Skardu"
                                                            {{ $district == 'Skardu' ? 'selected' : '' }}>Skardu</option>
                                                        <option value="Astore"
                                                            {{ $district == 'Astore' ? 'selected' : '' }}>Astore</option>
                                                        <option value="Diamer"
                                                            {{ $district == 'Diamer' ? 'selected' : '' }}>Diamer</option>
                                                        <option value="Ghizer"
                                                            {{ $district == 'Ghizer' ? 'selected' : '' }}>Ghizer</option>
                                                        <option value="Hunza-Nagar"
                                                            {{ $district == 'Hunza-Nagar' ? 'selected' : '' }}>Hunza-Nagar
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Azad Jammu and Kashmir (AJK)">
                                                        <option value="Muzaffarabad"
                                                            {{ $district == 'Muzaffarabad' ? 'selected' : '' }}>
                                                            Muzaffarabad</option>
                                                        <option value="Mirpur"
                                                            {{ $district == 'Mirpur' ? 'selected' : '' }}>Mirpur</option>
                                                        <option value="Bhimber"
                                                            {{ $district == 'Bhimber' ? 'selected' : '' }}>Bhimber</option>
                                                        <option value="Kotli"
                                                            {{ $district == 'Kotli' ? 'selected' : '' }}>Kotli</option>
                                                        <option value="Rawalakot"
                                                            {{ $district == 'Rawalakot' ? 'selected' : '' }}>Rawalakot
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Islamabad Capital Territory (ICT)">
                                                        <option value="Islamabad"
                                                            {{ $district == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @php
                                                    $city = $admissionApplication->city;
                                                @endphp
                                                <label>City *</label>
                                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                    name="city">
                                                    <option value="">Select your city</option>
                                                    <optgroup label="Balochistan">
                                                        <option value="Quetta" {{ $city == 'Quetta' ? 'selected' : '' }}>
                                                            Quetta</option>
                                                        <option value="Khuzdar"
                                                            {{ $city == 'Khuzdar' ? 'selected' : '' }}>Khuzdar</option>
                                                        <option value="Chaman" {{ $city == 'Chaman' ? 'selected' : '' }}>
                                                            Chaman</option>
                                                        <option value="Turbat" {{ $city == 'Turbat' ? 'selected' : '' }}>
                                                            Turbat</option>
                                                        <option value="Gwadar" {{ $city == 'Gwadar' ? 'selected' : '' }}>
                                                            Gwadar</option>
                                                        <option value="Sibi" {{ $city == 'Sibi' ? 'selected' : '' }}>
                                                            Sibi</option>
                                                        <option value="Pishin" {{ $city == 'Pishin' ? 'selected' : '' }}>
                                                            Pishin</option>
                                                        <option value="Zhob" {{ $city == 'Zhob' ? 'selected' : '' }}>
                                                            Zhob</option>
                                                    </optgroup>
                                                    <optgroup label="Khyber Pakhtunkhwa (KPK)">
                                                        <option value="Peshawar"
                                                            {{ $city == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>
                                                        <option value="Abbottabad"
                                                            {{ $city == 'Abbottabad' ? 'selected' : '' }}>Abbottabad
                                                        </option>
                                                        <option value="Mardan" {{ $city == 'Mardan' ? 'selected' : '' }}>
                                                            Mardan</option>
                                                        <option value="Swabi" {{ $city == 'Swabi' ? 'selected' : '' }}>
                                                            Swabi</option>
                                                        <option value="Charsadda"
                                                            {{ $city == 'Charsadda' ? 'selected' : '' }}>Charsadda
                                                        </option>
                                                        <option value="Nowshera"
                                                            {{ $city == 'Nowshera' ? 'selected' : '' }}>Nowshera</option>
                                                        <option value="Kohat" {{ $city == 'Kohat' ? 'selected' : '' }}>
                                                            Kohat</option>
                                                        <option value="Bannu" {{ $city == 'Bannu' ? 'selected' : '' }}>
                                                            Bannu</option>
                                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                        <option value="Haripur"
                                                            {{ $city == 'Haripur' ? 'selected' : '' }}>Haripur</option>
                                                        <option value="Mansehra"
                                                            {{ $city == 'Mansehra' ? 'selected' : '' }}>Mansehra</option>
                                                        <option value="Chitral"
                                                            {{ $city == 'Chitral' ? 'selected' : '' }}>Chitral</option>
                                                        <option value="Swat" {{ $city == 'Swat' ? 'selected' : '' }}>
                                                            Swat</option>
                                                        <option value="Peshawar"
                                                            {{ $city == 'Peshawar' ? 'selected' : '' }}>Peshawar</option>
                                                    </optgroup>
                                                    <optgroup label="Punjab">
                                                        <option value="Lahore" {{ $city == 'Lahore' ? 'selected' : '' }}>
                                                            Lahore</option>
                                                        <option value="Faisalabad"
                                                            {{ $city == 'Faisalabad' ? 'selected' : '' }}>Faisalabad
                                                        </option>
                                                        <option value="Rawalpindi"
                                                            {{ $city == 'Rawalpindi' ? 'selected' : '' }}>Rawalpindi
                                                        </option>
                                                        <option value="Multan" {{ $city == 'Multan' ? 'selected' : '' }}>
                                                            Multan</option>
                                                        <option value="Gujranwala"
                                                            {{ $city == 'Gujranwala' ? 'selected' : '' }}>Gujranwala
                                                        </option>
                                                        <option value="Bahawalpur"
                                                            {{ $city == 'Bahawalpur' ? 'selected' : '' }}>Bahawalpur
                                                        </option>
                                                        <option value="Sialkot"
                                                            {{ $city == 'Sialkot' ? 'selected' : '' }}>Sialkot</option>
                                                        <option value="Sheikhupura"
                                                            {{ $city == 'Sheikhupura' ? 'selected' : '' }}>Sheikhupura
                                                        </option>
                                                        <option value="Jhang" {{ $city == 'Jhang' ? 'selected' : '' }}>
                                                            Jhang</option>
                                                        <option value="Sargodha"
                                                            {{ $city == 'Sargodha' ? 'selected' : '' }}>Sargodha</option>
                                                        <option value="Gujrat" {{ $city == 'Gujrat' ? 'selected' : '' }}>
                                                            Gujrat</option>
                                                        <option value="Kasur" {{ $city == 'Kasur' ? 'selected' : '' }}>
                                                            Kasur</option>
                                                        <option value="Mianwali"
                                                            {{ $city == 'Mianwali' ? 'selected' : '' }}>Mianwali</option>
                                                        <option value="Toba Tek Singh"
                                                            {{ $city == 'Toba Tek Singh' ? 'selected' : '' }}>Toba Tek
                                                            Singh</option>
                                                        <option value="Rahim Yar Khan"
                                                            {{ $city == 'Rahim Yar Khan' ? 'selected' : '' }}>Rahim Yar
                                                            Khan</option>
                                                        <option value="Okara" {{ $city == 'Okara' ? 'selected' : '' }}>
                                                            Okara</option>
                                                        <option value="Nankana Sahib"
                                                            {{ $city == 'Nankana Sahib' ? 'selected' : '' }}>Nankana Sahib
                                                        </option>
                                                        <option value="Attock" {{ $city == 'Attock' ? 'selected' : '' }}>
                                                            Attock</option>
                                                        <option value="Layyah" {{ $city == 'Layyah' ? 'selected' : '' }}>
                                                            Layyah</option>
                                                        <option value="Khushab"
                                                            {{ $city == 'Khushab' ? 'selected' : '' }}>Khushab</option>
                                                        <option value="Chiniot"
                                                            {{ $city == 'Chiniot' ? 'selected' : '' }}>Chiniot</option>
                                                        <option value="Mandi Bahauddin"
                                                            {{ $city == 'Mandi Bahauddin' ? 'selected' : '' }}>Mandi
                                                            Bahauddin</option>
                                                    </optgroup>
                                                    <optgroup label="Sindh">
                                                        <option value="Karachi"
                                                            {{ $city == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                                                        <option value="Hyderabad"
                                                            {{ $city == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                                                        </option>
                                                        <option value="Larkana"
                                                            {{ $city == 'Larkana' ? 'selected' : '' }}>Larkana</option>
                                                        <option value="Nawabshah"
                                                            {{ $city == 'Nawabshah' ? 'selected' : '' }}>Nawabshah
                                                        </option>
                                                        <option value="Mirpur Khas"
                                                            {{ $city == 'Mirpur Khas' ? 'selected' : '' }}>Mirpur Khas
                                                        </option>
                                                        <option value="Sukkur" {{ $city == 'Sukkur' ? 'selected' : '' }}>
                                                            Sukkur</option>
                                                        <option value="Dadu" {{ $city == 'Dadu' ? 'selected' : '' }}>
                                                            Dadu</option>
                                                        <option value="Jacobabad"
                                                            {{ $city == 'Jacobabad' ? 'selected' : '' }}>Jacobabad
                                                        </option>
                                                        <option value="Shikarpur"
                                                            {{ $city == 'Shikarpur' ? 'selected' : '' }}>Shikarpur
                                                        </option>
                                                        <option value="Thatta" {{ $city == 'Thatta' ? 'selected' : '' }}>
                                                            Thatta</option>
                                                        <option value="Badin" {{ $city == 'Badin' ? 'selected' : '' }}>
                                                            Badin</option>
                                                        <option value="Ghotki" {{ $city == 'Ghotki' ? 'selected' : '' }}>
                                                            Ghotki</option>
                                                        <option value="Tando Muhammad Khan"
                                                            {{ $city == 'Tando Muhammad Khan' ? 'selected' : '' }}>Tando
                                                            Muhammad Khan</option>
                                                        <option value="Sanghar"
                                                            {{ $city == 'Sanghar' ? 'selected' : '' }}>Sanghar</option>
                                                        <option value="Kandhkot"
                                                            {{ $city == 'Kandhkot' ? 'selected' : '' }}>Kandhkot</option>
                                                        <option value="Matiari"
                                                            {{ $city == 'Matiari' ? 'selected' : '' }}>Matiari</option>
                                                        <option value="Dadu" {{ $city == 'Dadu' ? 'selected' : '' }}>
                                                            Dadu</option>
                                                        <option value="Shahdadkot"
                                                            {{ $city == 'Shahdadkot' ? 'selected' : '' }}>Shahdadkot
                                                        </option>
                                                        <option value="Umerkot"
                                                            {{ $city == 'Umerkot' ? 'selected' : '' }}>Umerkot</option>
                                                    </optgroup>
                                                    <optgroup label="Gilgit-Baltistan (GB)">
                                                        <option value="Gilgit" {{ $city == 'Gilgit' ? 'selected' : '' }}>
                                                            Gilgit</option>
                                                        <option value="Skardu" {{ $city == 'Skardu' ? 'selected' : '' }}>
                                                            Skardu</option>
                                                        <option value="Astore" {{ $city == 'Astore' ? 'selected' : '' }}>
                                                            Astore</option>
                                                        <option value="Diamer" {{ $city == 'Diamer' ? 'selected' : '' }}>
                                                            Diamer</option>
                                                        <option value="Ghizer" {{ $city == 'Ghizer' ? 'selected' : '' }}>
                                                            Ghizer</option>
                                                        <option value="Hunza-Nagar"
                                                            {{ $city == 'Hunza-Nagar' ? 'selected' : '' }}>Hunza-Nagar
                                                        </option>
                                                        <option value="Kharmang"
                                                            {{ $city == 'Kharmang' ? 'selected' : '' }}>Kharmang</option>
                                                        <option value="Ghanche"
                                                            {{ $city == 'Ghanche' ? 'selected' : '' }}>Ghanche</option>
                                                        <option value="Shigar" {{ $city == 'Shigar' ? 'selected' : '' }}>
                                                            Shigar</option>
                                                    </optgroup>
                                                    <optgroup label="Azad Jammu and Kashmir (AJK)">
                                                        <option value="Muzaffarabad"
                                                            {{ $city == 'Muzaffarabad' ? 'selected' : '' }}>Muzaffarabad
                                                        </option>
                                                        <option value="Mirpur" {{ $city == 'Mirpur' ? 'selected' : '' }}>
                                                            Mirpur</option>
                                                        <option value="Bhimber"
                                                            {{ $city == 'Bhimber' ? 'selected' : '' }}>Bhimber</option>
                                                        <option value="Kotli" {{ $city == 'Kotli' ? 'selected' : '' }}>
                                                            Kotli</option>
                                                        <option value="Rawalakot"
                                                            {{ $city == 'Rawalakot' ? 'selected' : '' }}>Rawalakot
                                                        </option>
                                                        <option value="Bagh" {{ $city == 'Bagh' ? 'selected' : '' }}>
                                                            Bagh</option>
                                                        <option value="Hajira" {{ $city == 'Hajira' ? 'selected' : '' }}>
                                                            Hajira</option>
                                                        <option value="Pallandri"
                                                            {{ $city == 'Pallandri' ? 'selected' : '' }}>Pallandri
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Islamabad Capital Territory (ICT)">
                                                        <option value="Islamabad"
                                                            {{ $city == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Permanent Home Address * </label>
                                                <textarea type="text" name="permanent_address" class="form-control">{{ $admissionApplication->permanent_address }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Postal Address * </label>
                                                <textarea type="text" name="postal_address" class="form-control">{{ $admissionApplication?->present_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h3 class="card-header mt-3">Academic Information</h3>
                                <div class="card-body">
                                    <h4>Matriculation / O-Level Information</h4>
                                    <hr />
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Certificate / Degree * </label>
                                                <select class="form-control" name="degree">
                                                    @foreach ($degrees as $degree)
                                                        <option value="{{ $degree->id }}"
                                                            {{ $admissionApplication?->o_level_degree_id == $degree->id ? 'selected' : '' }}>
                                                            {{ $degree->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="DegreeGroup">Degree Group <span> * </span></label>
                                                <select class="form-control" name="degree_group">
                                                    @foreach ($degreeGroups as $degreeGroup)
                                                        <option value="{{ $degreeGroup->id }}"
                                                            {{ $admissionApplication?->o_level_degree_group_id == $degreeGroup->id ? 'selected' : '' }}>
                                                            {{ $degreeGroup->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label>Board / University * </label>
                                                <select class="form-control" name="board">
                                                    @foreach ($boards as $board)
                                                        <option value="{{ $board->id }}"
                                                            {{ $admissionApplication->o_level_board_id == $board->id ? 'selected' : '' }}>
                                                            {{ $board->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>School / College / Institute Name * </label>
                                                <input type="text" class="form-control" name="institute_name"
                                                    value="{{ $admissionApplication->o_level_Institute }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Roll Number * </label>
                                                <input type="text" class="form-control" name="roll_number"
                                                    value="{{ $admissionApplication->o_level_roll }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Registration Number * </label>
                                                <input type="text" class="form-control" name="registration_number"
                                                    value="{{ $admissionApplication->o_level_registration }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="PassingYear">Passing Year <span> * </span></label>
                                                <input type="text" class="form-control" name="passing_year"
                                                    value="{{ $admissionApplication->o_level_passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="TotalMarks">Total Marks<span> *</span></label>
                                                <input type="text" class="form-control" name="total_marks"
                                                    value="{{ $admissionApplication->o_level_total_marks }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ObtainedMarks">Obtained Marks <span> * </span></label>
                                                <input type="text" class="form-control" name="obtained_marks"
                                                    value="{{ $admissionApplication->o_level_obtained_marks }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Percentage"> Percentage <span> * </span></label>
                                                <input type="text" class="form-control" name="percentage"
                                                    value="{{ $admissionApplication->o_level_percentage }}">
                                            </div>
                                        </div>
                                    </div>



                                    <h4>Intermediate / A-Level Information</h4>
                                    <hr />
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="CertificateDegree">Certificate / Degree<span> *</span></label>
                                                <select class="form-control form-select" name="a_level_degree">
                                                    @foreach ($degrees as $degree)
                                                        <option value="{{ $degree->id }}"
                                                            {{ $admissionApplication?->a_level_degree_id == $degree->id ? 'selected' : '' }}>
                                                            {{ $degree->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Major Subjects * </label>
                                                <input type="text" class="form-control " name="major_subject"
                                                    value="{{ $admissionApplication?->major_subject }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Board / University <span> * </span></label>
                                                <select class="form-control " name="a_level_board">
                                                    @foreach ($boards as $boards)
                                                        <option value="{{ $boards->id }}"
                                                            {{ $admissionApplication?->a_level_board_id == $boards->id ? 'selected' : '' }}>
                                                            {{ $boards->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>School / College / Institute Name * </label>
                                                <input type="text" class="form-control " name="a_level_institute_name"
                                                    value="{{ $admissionApplication?->a_level_Institute }}">
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3 d-flex gap-4 flex-wrap">
                                            <label style="display: inline-block; margin-right: 10px;">Have you completed
                                                Intermediate / Equivalent Degree *
                                            </label>
                                            <div class="mb-2 d-flex gap-3">

                                                <div>
                                                    <input type="checkbox" name="complate_intermediate" id="radio2"
                                                        value="1"
                                                        {{ $admissionApplication?->complated_intermediate == 1 ? 'checked' : '' }}>
                                                    <label class="m-0" for="radio2">
                                                        <span class="radio-text">Yes</span>
                                                    </label>
                                                </div>


                                                <div>
                                                    <input type="checkbox" name="complate_intermediate" id="radio3"
                                                        value="0"
                                                        {{ $admissionApplication?->complated_intermediate == 0 ? 'checked' : '' }}>
                                                    <label class="m-0" for="radio3">
                                                        <span class="radio-text">No</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="RollNumber">Roll Number<span> * </span></label>
                                                <input type="text" class="form-control" name="a_level_roll_number"
                                                    value="{{ $admissionApplication->a_level_roll }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="RegistrationNumber">Registration Number <span> *
                                                    </span></label>
                                                <input type="text" class="form-control"
                                                    name="a_level_registration_number"
                                                    value="{{ $admissionApplication->a_level_registration }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="PassingYear">Passing Year <span> *</span></label>
                                                <input type="text" class="form-control" name="a_level_passing_year"
                                                    value="{{ $admissionApplication->a_level_passing_year }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="TotalMarks">Total Marks<span> *</span></label>
                                                <input type="text" class="form-control" name="a_level_total_marks"
                                                    value="{{ $admissionApplication->a_level_total_marks }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ObtainedMarks">Obtained Marks <span> *</span></label>
                                                <input type="text" class="form-control" name="a_level_obtained_marks"
                                                    value="{{ $admissionApplication->a_level_obtained_marks }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Percentage"> Percentage <span> *</span></label>
                                                <input type="text" class="form-control" name="a_level_percentage"
                                                    value="{{ $admissionApplication->a_level_percentage }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn rounded bg-primary py-2 px-4">Save and Update</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
