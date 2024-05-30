@extends('student.layouts.user')
@section('title')
    Student | Dashboard
@endsection
@section('panel')
    @include('student.application.header')

    <form action="{{ route('profile.save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">

                    <div class="card-header">
                        <h6>Personal Information </h6>
                    </div>

                    <div class="card-body py-md-30">
                        <div style="display:flex; align-items:center;">
                            <img id="preview"
                                src={{ $student->admissionApplication?->profile_image ? asset('admission-documents/' . $student->admissionApplication?->profile_image) : asset('hria/user/profile.png') }}
                                style="margin-right: 10px;" width="130" height="140" />
                            <div>
                                <li>Upload clear image</li>
                                <li>Maximum size is 2MB</li>
                                <li>To reduce your image size
                                    <a href="https://imagecompressor.11zon.com/en/image-compressor/compress-image-to-20kb-online.php"
                                        target="_blank">Click here</a>
                                </li>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-25">
                                <div>
                                    <input type="file" name="profile_image" class="mb-4 mt-2"
                                        accept="image/jpg, image/jpeg, image/png"
                                        onchange="previewImage(event, 'preview')" />
                                    @error('profile_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label>Full Name (as per school, college or university degree) * </label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="name" value="{{ $student->admissionApplication?->name ?? old('name') }}">
                                @error('name')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-25">
                                <label>National Identity Card CNIC / B-Form * </label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="national_id"
                                    value="{{ $student->admissionApplication?->national_id ?? old('national_id') }}">
                                @error('national_id')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Father Name * </label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="father_name"
                                    value="{{ $student->admissionApplication?->father_name ?? old('father_name') }}">
                                @error('father_name')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                @php
                                    $gender = $student->admissionApplication?->gender ?? old('gender');
                                @endphp
                                <label>Select Gender * </label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="gender">
                                    <option value="">Select an option</option>
                                    <option value="male" {{ $gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Applicant Phone Number * </label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="phone" placeholder="Enter phone number like 0300-1234567"
                                    value="{{ $student->admissionApplication?->mobile ?? old('phone') }}">
                                @error('phone')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Applicant Email * </label>
                                <input type="email" name="email"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    value="{{ $student->admissionApplication?->email ?? old('email') }}">
                                @error('email')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            @php
                                $blood_group = $student->admissionApplication?->blood_group ?? old('blood_group');
                            @endphp
                            <div class="col-md-4 mb-25">
                                <label>Blood Group </label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="blood_group">
                                    <option value="">Select your blood group</option>
                                    <option value="A-" {{ $blood_group == 'A-' ? 'selected' : '' }}>A Negative (A-)
                                    </option>
                                    <option value="A+" {{ $blood_group == 'A+' ? 'selected' : '' }}>A Positive (A+)
                                    </option>
                                    <option value="B-" {{ $blood_group == 'B-' ? 'selected' : '' }}>B Negative (B-)
                                    </option>
                                    <option value="B+" {{ $blood_group == 'B+' ? 'selected' : '' }}>B Positive (B+)
                                    </option>
                                    <option value="AB-" {{ $blood_group == 'AB-' ? 'selected' : '' }}>AB Negative (AB-)
                                    </option>
                                    <option value="AB+" {{ $blood_group == 'AB+' ? 'selected' : '' }}>AB Positive (AB+)
                                    </option>
                                    <option value="O-" {{ $blood_group == 'O-' ? 'selected' : '' }}>O Negative (O-)
                                    </option>
                                    <option value="O+" {{ $blood_group == 'O+' ? 'selected' : '' }}>O Positive (O+)
                                    </option>
                                </select>
                                @error('blood_group')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-25">
                                <label>Religion *</label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="religion">
                                    <option value="">Select an option</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}"
                                            {{ $student->admissionApplication?->religion_record_id == $religion->id ? 'selected' : '' }}>
                                            {{ $religion->name }}</option>
                                    @endforeach
                                </select>
                                @error('religion')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-25">
                                <label>Date of Birth * </label>
                                <input type="date" name="dob" class="form-control hasDatepicker" id="datepicker"
                                    value="{{ $student->admissionApplication?->dob ?? old('dob') }}">
                                @error('dob')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-25" style="display: inline-block;">
                                <label style="display: inline-block; margin-right: 10px;">Are you a special person *</label>
                                <div style="display: inline-block;">

                                    <input class="radio-theme-default custom-radio radio" type="radio"
                                        name="special_person" value="1" id="radio-un2"
                                        {{ $student->admissionApplication?->special_person == 1 ? 'checked' : '' }}>
                                    <label for="radio-un2">
                                        <span class="radio-text">Yes</span>
                                    </label>


                                    <input class="radio-theme-default custom-radio radio" type="radio"
                                        name="special_person" value="0" id="radio-un3"
                                        {{ $student->admissionApplication?->special_person == 0 ? 'checked' : '' }}>
                                    <label for="radio-un3">
                                        <span class="radio-text">No</span>
                                    </label>

                                </div>
                                @error('special_person')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            @php
                                $physical_disability =
                                    $student->admissionApplication?->physical_disability ?? old('physical_disability');
                            @endphp
                            <div class="col-md-4 mb-25">
                                <label>Physical Disablity * </label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="physical_disability">
                                    <option value="">Select your physical disability</option>
                                    <option value="Dyslexia" {{ $physical_disability == 'Dyslexia' ? 'selected' : '' }}>
                                        Dyslexia</option>
                                    <option value="Hearing" {{ $physical_disability == 'Hearing' ? 'selected' : '' }}>
                                        Hearing</option>
                                    <option value="Neuro/Intellectual"
                                        {{ $physical_disability == 'Neuro/Intellectual' ? 'selected' : '' }}>
                                        Neuro/Intellectual</option>
                                    <option value="Mobility" {{ $physical_disability == 'Mobility' ? 'selected' : '' }}>
                                        Mobility</option>
                                    <option value="Physical" {{ $physical_disability == 'Physical' ? 'selected' : '' }}>
                                        Physical</option>
                                    <option value="Visual" {{ $physical_disability == 'Visual' ? 'selected' : '' }}>Visual
                                    </option>
                                    <option value="Other" {{ $physical_disability == 'Other' ? 'selected' : '' }}>Any
                                        Other</option>
                                </select>
                                @error('physical_disability')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-25">
                                <ol>
                                    <li>The selection would be on merit and the candidate would not be discriminated
                                        because of this disclosure</li>
                                    <li>Do you have certificate issued by NCRDP/PCRDP? If not, obtain the same as it
                                        will be required to be submitted soon after merit declaration</li>
                                    <li>For any assistance required to submit your request to helpdesk@hria.edu.pk
                                        or you may also contact at Telephone No: +92 300 9652742, +92 346 7377307,
                                        +92 304-0820082</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-header">
                        <h6>Parent / Guardian Information</h6>
                    </div>
                    <div class="card-body py-md-30">
                        <div style="display:flex; align-items:center;">
                            <img id="preview2"
                                src={{ $student->admissionApplication?->parent_image ? asset('admission-documents/' . $student->admissionApplication?->parent_image) : asset('hria/user/profile.png') }}
                                style="margin-right: 10px;" width="130" height="140" />
                            <div>
                                <li>Upload clear image</li>
                                <li>Maximum size is 2MB</li>
                                <li>To reduce your image size <a
                                        href="https://imagecompressor.11zon.com/en/image-compressor/compress-image-to-20kb-online.php"
                                        target="_blank">Click here</a></li>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-25">
                                <input type="file" name="parent_image" class="mb-4 mt-2"
                                    onchange="previewImage(event, 'preview2')" />
                                @error('parent_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Relationship * </label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    name="relationship">
                                    <option value="">Select an option</option>
                                    <option value="Father"
                                        {{ $student->admissionApplication?->guardian_relation == 'Father' ? 'selected' : '' }}>
                                        Father</option>
                                    <option value="Brother"
                                        {{ $student->admissionApplication?->guardian_relation == 'Brother' ? 'selected' : '' }}>
                                        Brother</option>
                                    <option value="Uncle"
                                        {{ $student->admissionApplication?->guardian_relation == 'Uncle' ? 'selected' : '' }}>
                                        Uncle</option>
                                    <option value="Aunt"
                                        {{ $student->admissionApplication?->guardian_relation == 'Aunt' ? 'selected' : '' }}>
                                        Aunt</option>
                                    <option value="Mother"
                                        {{ $student->admissionApplication?->guardian_relation == 'Mother' ? 'selected' : '' }}>
                                        Mother</option>
                                    <option value="Sister"
                                        {{ $student->admissionApplication?->guardian_relation == 'Sister' ? 'selected' : '' }}>
                                        Sister</option>
                                    <option value="Self"
                                        {{ $student->admissionApplication?->guardian_relation == 'Self' ? 'selected' : '' }}>
                                        Self</option>
                                    <option value="Grandfather"
                                        {{ $student->admissionApplication?->guardian_relation == 'Grandfather' ? 'selected' : '' }}>
                                        Grandfather</option>
                                    <option value="Grandmother"
                                        {{ $student->admissionApplication?->guardian_relation == 'Grandmother' ? 'selected' : '' }}>
                                        Grandmother</option>
                                    <option value="Other"
                                        {{ $student->admissionApplication?->guardian_relation == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                                @error('relationship')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Full Name * </label>
                                <input type="text" name="parent_name"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    value="{{ $student->admissionApplication?->guardian_name ?? old('parent_name') }}">
                                @error('parent_name')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Profession * </label>
                                <input type="text" name="parent_profession"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    value="{{ $student->admissionApplication?->guardian_occupation ?? old('parent_profession') }}">
                                @error('parent_profession')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>National Identity Card CNIC / B-Form * </label>
                                <input type="text" name="parent_national_id"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    value="{{ $student->admissionApplication?->guardian_national_id ?? old('parent_national_id') }}">
                                @error('parent_national_id')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Phone Number * </label>
                                <input type="text" name="parent_phone"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    placeholder="Enter phone number like 0300-1234567"
                                    value="{{ $student->admissionApplication?->guardian_contact ?? old('parent_phone') }}">
                                @error('parent_phone')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Email </label>
                                <input type="email" name="parent_email"
                                    class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                    value="{{ $student->admissionApplication?->guardian_email ?? old('parent_email') }}">
                                @error('parent_email')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-header">
                        <h6>Contact Information</h6>
                    </div>
                    <div class="card-body py-md-30">
                        <div class="row">
                            <div class="col-md-4 mb-25">
                                @php
                                    $province = $student->admissionApplication?->province ?? old('province');
                                @endphp
                                <label>Province * </label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="province">
                                    <option value="">Select an option</option>
                                    <option value="Punjab" {{ $province == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                                    <option value="Sindh" {{ $province == 'Sindh' ? 'selected' : '' }}>Sindh</option>
                                    <option value="Balochistan" {{ $province == 'Balochistan' ? 'selected' : '' }}>
                                        Balochistan</option>
                                    <option value="K.P.K" {{ $province == 'K.P.K' ? 'selected' : '' }}>K.P.K</option>
                                    <option value="AJK" {{ $province == 'AJK' ? 'selected' : '' }}>AJK</option>
                                    <option value="Gilgit Baltistan"
                                        {{ $province == 'Gilgit Baltistan' ? 'selected' : '' }}>Gilgit Baltistan</option>
                                </select>
                                @error('province')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            @php
                                $district = $student->admissionApplication?->district ?? old('district');
                            @endphp
                            <div class="col-md-4 mb-25">
                                <label>Domicile District *</label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="district">
                                    <option value="">Select your district</option>
                                    <optgroup label="Balochistan">
                                        <option value="Quetta" {{ $district == 'Quetta' ? 'selected' : '' }}>Quetta
                                        </option>
                                        <option value="Khuzdar" {{ $district == 'Khuzdar' ? 'selected' : '' }}>Khuzdar
                                        </option>
                                        <option value="Chagai" {{ $district == 'Chagai' ? 'selected' : '' }}>Chagai
                                        </option>
                                        <option value="Gwadar" {{ $district == 'Gwadar' ? 'selected' : '' }}>Gwadar
                                        </option>
                                        <option value="Lasbela" {{ $district == 'Lasbela' ? 'selected' : '' }}>Lasbela
                                        </option>
                                        <option value="Panjgur" {{ $district == 'Panjgur' ? 'selected' : '' }}>Panjgur
                                        </option>
                                        <option value="Zhob" {{ $district == 'Zhob' ? 'selected' : '' }}>Zhob</option>
                                    </optgroup>
                                    <optgroup label="Khyber Pakhtunkhwa (KPK)">
                                        <option value="Abbottabad" {{ $district == 'Abbottabad' ? 'selected' : '' }}>
                                            Abbottabad</option>
                                        <option value="Bannu" {{ $district == 'Bannu' ? 'selected' : '' }}>Bannu</option>
                                        <option value="Charsadda" {{ $district == 'Charsadda' ? 'selected' : '' }}>
                                            Charsadda</option>
                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                        <option value="Kohat" {{ $district == 'Kohat' ? 'selected' : '' }}>Kohat</option>
                                        <option value="Mardan" {{ $district == 'Mardan' ? 'selected' : '' }}>Mardan
                                        </option>
                                        <option value="Nowshera" {{ $district == 'Nowshera' ? 'selected' : '' }}>Nowshera
                                        </option>
                                        <option value="Peshawar" {{ $district == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                        </option>
                                        <option value="Swabi" {{ $district == 'Swabi' ? 'selected' : '' }}>Swabi</option>
                                        <option value="Swat" {{ $district == 'Swat' ? 'selected' : '' }}>Swat</option>
                                    </optgroup>
                                    <optgroup label="Punjab">
                                        <option value="Lahore" {{ $district == 'Lahore' ? 'selected' : '' }}>Lahore
                                        </option>
                                        <option value="Faisalabad" {{ $district == 'Faisalabad' ? 'selected' : '' }}>
                                            Faisalabad</option>
                                        <option value="Rawalpindi" {{ $district == 'Rawalpindi' ? 'selected' : '' }}>
                                            Rawalpindi</option>
                                        <option value="Multan" {{ $district == 'Multan' ? 'selected' : '' }}>Multan
                                        </option>
                                        <option value="Gujranwala" {{ $district == 'Gujranwala' ? 'selected' : '' }}>
                                            Gujranwala</option>
                                        <option value="Bahawalpur" {{ $district == 'Bahawalpur' ? 'selected' : '' }}>
                                            Bahawalpur</option>
                                        <option value="Sialkot" {{ $district == 'Sialkot' ? 'selected' : '' }}>Sialkot
                                        </option>
                                        <option value="Sheikhupura" {{ $district == 'Sheikhupura' ? 'selected' : '' }}>
                                            Sheikhupura</option>
                                    </optgroup>
                                    <optgroup label="Sindh">
                                        <option value="Karachi" {{ $district == 'Karachi' ? 'selected' : '' }}>Karachi
                                        </option>
                                        <option value="Hyderabad" {{ $district == 'Hyderabad' ? 'selected' : '' }}>
                                            Hyderabad</option>
                                        <option value="Larkana" {{ $district == 'Larkana' ? 'selected' : '' }}>Larkana
                                        </option>
                                        <option value="Mirpur Khas" {{ $district == 'Mirpur Khas' ? 'selected' : '' }}>
                                            Mirpur Khas</option>
                                        <option value="Sukkur" {{ $district == 'Sukkur' ? 'selected' : '' }}>Sukkur
                                        </option>
                                        <option value="Dadu" {{ $district == 'Dadu' ? 'selected' : '' }}>Dadu</option>
                                        <option value="Shikarpur" {{ $district == 'Shikarpur' ? 'selected' : '' }}>
                                            Shikarpur</option>
                                    </optgroup>
                                    <optgroup label="Gilgit-Baltistan (GB)">
                                        <option value="Gilgit" {{ $district == 'Gilgit' ? 'selected' : '' }}>Gilgit
                                        </option>
                                        <option value="Skardu" {{ $district == 'Skardu' ? 'selected' : '' }}>Skardu
                                        </option>
                                        <option value="Astore" {{ $district == 'Astore' ? 'selected' : '' }}>Astore
                                        </option>
                                        <option value="Diamer" {{ $district == 'Diamer' ? 'selected' : '' }}>Diamer
                                        </option>
                                        <option value="Ghizer" {{ $district == 'Ghizer' ? 'selected' : '' }}>Ghizer
                                        </option>
                                        <option value="Hunza-Nagar" {{ $district == 'Hunza-Nagar' ? 'selected' : '' }}>
                                            Hunza-Nagar</option>
                                    </optgroup>
                                    <optgroup label="Azad Jammu and Kashmir (AJK)">
                                        <option value="Muzaffarabad" {{ $district == 'Muzaffarabad' ? 'selected' : '' }}>
                                            Muzaffarabad</option>
                                        <option value="Mirpur" {{ $district == 'Mirpur' ? 'selected' : '' }}>Mirpur
                                        </option>
                                        <option value="Bhimber" {{ $district == 'Bhimber' ? 'selected' : '' }}>Bhimber
                                        </option>
                                        <option value="Kotli" {{ $district == 'Kotli' ? 'selected' : '' }}>Kotli
                                        </option>
                                        <option value="Rawalakot" {{ $district == 'Rawalakot' ? 'selected' : '' }}>
                                            Rawalakot</option>
                                    </optgroup>
                                    <optgroup label="Islamabad Capital Territory (ICT)">
                                        <option value="Islamabad" {{ $district == 'Islamabad' ? 'selected' : '' }}>
                                            Islamabad</option>
                                    </optgroup>
                                </select>
                                @error('district')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-25">
                                @php
                                    $city = $student->admissionApplication?->city ?? old('city');
                                @endphp
                                <label>City *</label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="city">
                                    <option value="">Select your city</option>
                                    <optgroup label="Balochistan">
                                        <option value="Quetta" {{ $city == 'Quetta' ? 'selected' : '' }}>Quetta</option>
                                        <option value="Khuzdar" {{ $city == 'Khuzdar' ? 'selected' : '' }}>Khuzdar
                                        </option>
                                        <option value="Chaman" {{ $city == 'Chaman' ? 'selected' : '' }}>Chaman</option>
                                        <option value="Turbat" {{ $city == 'Turbat' ? 'selected' : '' }}>Turbat</option>
                                        <option value="Gwadar" {{ $city == 'Gwadar' ? 'selected' : '' }}>Gwadar</option>
                                        <option value="Sibi" {{ $city == 'Sibi' ? 'selected' : '' }}>Sibi</option>
                                        <option value="Pishin" {{ $city == 'Pishin' ? 'selected' : '' }}>Pishin</option>
                                        <option value="Zhob" {{ $city == 'Zhob' ? 'selected' : '' }}>Zhob</option>
                                    </optgroup>
                                    <optgroup label="Khyber Pakhtunkhwa (KPK)">
                                        <option value="Peshawar" {{ $city == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                        </option>
                                        <option value="Abbottabad" {{ $city == 'Abbottabad' ? 'selected' : '' }}>
                                            Abbottabad</option>
                                        <option value="Mardan" {{ $city == 'Mardan' ? 'selected' : '' }}>Mardan</option>
                                        <option value="Swabi" {{ $city == 'Swabi' ? 'selected' : '' }}>Swabi</option>
                                        <option value="Charsadda" {{ $city == 'Charsadda' ? 'selected' : '' }}>Charsadda
                                        </option>
                                        <option value="Nowshera" {{ $city == 'Nowshera' ? 'selected' : '' }}>Nowshera
                                        </option>
                                        <option value="Kohat" {{ $city == 'Kohat' ? 'selected' : '' }}>Kohat</option>
                                        <option value="Bannu" {{ $city == 'Bannu' ? 'selected' : '' }}>Bannu</option>
                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                        <option value="Haripur" {{ $city == 'Haripur' ? 'selected' : '' }}>Haripur
                                        </option>
                                        <option value="Mansehra" {{ $city == 'Mansehra' ? 'selected' : '' }}>Mansehra
                                        </option>
                                        <option value="Chitral" {{ $city == 'Chitral' ? 'selected' : '' }}>Chitral
                                        </option>
                                        <option value="Swat" {{ $city == 'Swat' ? 'selected' : '' }}>Swat</option>
                                        <option value="Peshawar" {{ $city == 'Peshawar' ? 'selected' : '' }}>Peshawar
                                        </option>
                                    </optgroup>
                                    <optgroup label="Punjab">
                                        <option value="Lahore" {{ $city == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                                        <option value="Faisalabad" {{ $city == 'Faisalabad' ? 'selected' : '' }}>
                                            Faisalabad</option>
                                        <option value="Rawalpindi" {{ $city == 'Rawalpindi' ? 'selected' : '' }}>
                                            Rawalpindi</option>
                                        <option value="Multan" {{ $city == 'Multan' ? 'selected' : '' }}>Multan</option>
                                        <option value="Gujranwala" {{ $city == 'Gujranwala' ? 'selected' : '' }}>
                                            Gujranwala</option>
                                        <option value="Bahawalpur" {{ $city == 'Bahawalpur' ? 'selected' : '' }}>
                                            Bahawalpur</option>
                                        <option value="Sialkot" {{ $city == 'Sialkot' ? 'selected' : '' }}>Sialkot
                                        </option>
                                        <option value="Sheikhupura" {{ $city == 'Sheikhupura' ? 'selected' : '' }}>
                                            Sheikhupura</option>
                                        <option value="Jhang" {{ $city == 'Jhang' ? 'selected' : '' }}>Jhang</option>
                                        <option value="Sargodha" {{ $city == 'Sargodha' ? 'selected' : '' }}>Sargodha
                                        </option>
                                        <option value="Gujrat" {{ $city == 'Gujrat' ? 'selected' : '' }}>Gujrat</option>
                                        <option value="Kasur" {{ $city == 'Kasur' ? 'selected' : '' }}>Kasur</option>
                                        <option value="Mianwali" {{ $city == 'Mianwali' ? 'selected' : '' }}>Mianwali
                                        </option>
                                        <option value="Toba Tek Singh" {{ $city == 'Toba Tek Singh' ? 'selected' : '' }}>
                                            Toba Tek Singh</option>
                                        <option value="Rahim Yar Khan" {{ $city == 'Rahim Yar Khan' ? 'selected' : '' }}>
                                            Rahim Yar Khan</option>
                                        <option value="Okara" {{ $city == 'Okara' ? 'selected' : '' }}>Okara</option>
                                        <option value="Nankana Sahib" {{ $city == 'Nankana Sahib' ? 'selected' : '' }}>
                                            Nankana Sahib</option>
                                        <option value="Attock" {{ $city == 'Attock' ? 'selected' : '' }}>Attock</option>
                                        <option value="Layyah" {{ $city == 'Layyah' ? 'selected' : '' }}>Layyah</option>
                                        <option value="Khushab" {{ $city == 'Khushab' ? 'selected' : '' }}>Khushab
                                        </option>
                                        <option value="Chiniot" {{ $city == 'Chiniot' ? 'selected' : '' }}>Chiniot
                                        </option>
                                        <option value="Mandi Bahauddin"
                                            {{ $city == 'Mandi Bahauddin' ? 'selected' : '' }}>Mandi Bahauddin</option>
                                    </optgroup>
                                    <optgroup label="Sindh">
                                        <option value="Karachi" {{ $city == 'Karachi' ? 'selected' : '' }}>Karachi
                                        </option>
                                        <option value="Hyderabad" {{ $city == 'Hyderabad' ? 'selected' : '' }}>Hyderabad
                                        </option>
                                        <option value="Larkana" {{ $city == 'Larkana' ? 'selected' : '' }}>Larkana
                                        </option>
                                        <option value="Nawabshah" {{ $city == 'Nawabshah' ? 'selected' : '' }}>Nawabshah
                                        </option>
                                        <option value="Mirpur Khas" {{ $city == 'Mirpur Khas' ? 'selected' : '' }}>Mirpur
                                            Khas</option>
                                        <option value="Sukkur" {{ $city == 'Sukkur' ? 'selected' : '' }}>Sukkur</option>
                                        <option value="Dadu" {{ $city == 'Dadu' ? 'selected' : '' }}>Dadu</option>
                                        <option value="Jacobabad" {{ $city == 'Jacobabad' ? 'selected' : '' }}>Jacobabad
                                        </option>
                                        <option value="Shikarpur" {{ $city == 'Shikarpur' ? 'selected' : '' }}>Shikarpur
                                        </option>
                                        <option value="Thatta" {{ $city == 'Thatta' ? 'selected' : '' }}>Thatta</option>
                                        <option value="Badin" {{ $city == 'Badin' ? 'selected' : '' }}>Badin</option>
                                        <option value="Ghotki" {{ $city == 'Ghotki' ? 'selected' : '' }}>Ghotki</option>
                                        <option value="Tando Muhammad Khan"
                                            {{ $city == 'Tando Muhammad Khan' ? 'selected' : '' }}>Tando Muhammad Khan
                                        </option>
                                        <option value="Sanghar" {{ $city == 'Sanghar' ? 'selected' : '' }}>Sanghar
                                        </option>
                                        <option value="Kandhkot" {{ $city == 'Kandhkot' ? 'selected' : '' }}>Kandhkot
                                        </option>
                                        <option value="Matiari" {{ $city == 'Matiari' ? 'selected' : '' }}>Matiari
                                        </option>
                                        <option value="Dadu" {{ $city == 'Dadu' ? 'selected' : '' }}>Dadu</option>
                                        <option value="Shahdadkot" {{ $city == 'Shahdadkot' ? 'selected' : '' }}>
                                            Shahdadkot</option>
                                        <option value="Umerkot" {{ $city == 'Umerkot' ? 'selected' : '' }}>Umerkot
                                        </option>
                                    </optgroup>
                                    <optgroup label="Gilgit-Baltistan (GB)">
                                        <option value="Gilgit" {{ $city == 'Gilgit' ? 'selected' : '' }}>Gilgit</option>
                                        <option value="Skardu" {{ $city == 'Skardu' ? 'selected' : '' }}>Skardu</option>
                                        <option value="Astore" {{ $city == 'Astore' ? 'selected' : '' }}>Astore</option>
                                        <option value="Diamer" {{ $city == 'Diamer' ? 'selected' : '' }}>Diamer</option>
                                        <option value="Ghizer" {{ $city == 'Ghizer' ? 'selected' : '' }}>Ghizer</option>
                                        <option value="Hunza-Nagar" {{ $city == 'Hunza-Nagar' ? 'selected' : '' }}>
                                            Hunza-Nagar</option>
                                        <option value="Kharmang" {{ $city == 'Kharmang' ? 'selected' : '' }}>Kharmang
                                        </option>
                                        <option value="Ghanche" {{ $city == 'Ghanche' ? 'selected' : '' }}>Ghanche
                                        </option>
                                        <option value="Shigar" {{ $city == 'Shigar' ? 'selected' : '' }}>Shigar</option>
                                    </optgroup>
                                    <optgroup label="Azad Jammu and Kashmir (AJK)">
                                        <option value="Muzaffarabad" {{ $city == 'Muzaffarabad' ? 'selected' : '' }}>
                                            Muzaffarabad</option>
                                        <option value="Mirpur" {{ $city == 'Mirpur' ? 'selected' : '' }}>Mirpur</option>
                                        <option value="Bhimber" {{ $city == 'Bhimber' ? 'selected' : '' }}>Bhimber
                                        </option>
                                        <option value="Kotli" {{ $city == 'Kotli' ? 'selected' : '' }}>Kotli</option>
                                        <option value="Rawalakot" {{ $city == 'Rawalakot' ? 'selected' : '' }}>Rawalakot
                                        </option>
                                        <option value="Bagh" {{ $city == 'Bagh' ? 'selected' : '' }}>Bagh</option>
                                        <option value="Hajira" {{ $city == 'Hajira' ? 'selected' : '' }}>Hajira</option>
                                        <option value="Pallandri" {{ $city == 'Pallandri' ? 'selected' : '' }}>Pallandri
                                        </option>
                                    </optgroup>
                                    <optgroup label="Islamabad Capital Territory (ICT)">
                                        <option value="Islamabad" {{ $city == 'Islamabad' ? 'selected' : '' }}>Islamabad
                                        </option>
                                    </optgroup>
                                </select>
                                @error('city')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-25">
                                <label>Permanent Home Address * </label>
                                <textarea type="text" name="permanent_address" class="form-control ih-medium ip-gray radius-xs b-light px-15">{{ $student->admissionApplication?->permanent_address ?? old('permanent_address') }}</textarea>
                                @error('permanent_address')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-25">
                                <label>Postal Address * </label>
                                <textarea type="text" name="postal_address" class="form-control ih-medium ip-gray radius-xs b-light px-15">{{ $student->admissionApplication?->present_address ?? old('postal_address') }}</textarea>
                                @error('postal_address')
                                    <p class="text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-3">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <button type="submit" class="btn btn-primary" style="width: 160px">
                        Save & Next
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
