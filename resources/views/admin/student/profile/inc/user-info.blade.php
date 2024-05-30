<!--user profile info-->
<div class="col-md-2">
    <div class="profile">
        <img src="{{ asset('admission-documents/' . $admissionApplication?->profile_image) }}"
            alt="profile" loading="lazy" />
    </div>
</div>

<div class="col-md-10 pl-md-0">
    <h4 class="mb-1">{{ $admissionApplication?->name }}</h4>
    <div class="row">
        <div class="col-sm-6" style="border-right: 1px solid #ccc;">

            <table class="">

                <tbody>
                    <tr>
                        <td>Admission No.</td>
                        <td class="px-2">
                            {{ $admissionApplication->application_number }}
                        </td>

                    </tr>
                    <tr>
                        <td>Program</td>
                        <td class="px-2">
                            {{ $admissionApplication->programType?->short_name }} -
                            {{ $admissionApplication->programAdmission?->program }}
                        </td>

                    </tr>
                    <tr>
                        <td>Session</td>
                        <td class="px-2">{{ $admissionApplication->session?->name }}</td>
                    </tr>
                    <tr>
                        <td>Current Semester</td>
                        <td class="px-2">{{ $admissionApplication->student->course_semester }}
                        </td>
                    </tr>
                    <tr>
                        <td>Shift</td>
                        <td class="px-2">{{ $admissionApplication->program_session }}</td>
                    </tr>
                    <tr>
                        <td>Admission Date </td>
                        <td class="px-2">{{ $admissionApplication->created_at->format('d-m-Y') }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="">

                <tbody>
                    <tr>
                        <td style="width: 36%;">Student Phone No.</td>
                        <td class="px-2">{{ $admissionApplication->mobile }}</td>

                    </tr>
                    <tr>
                        <td>Father Contact No.</td>
                        <td class="px-2">{{ $admissionApplication->father_contact }}</td>

                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td class="px-2">{{ $admissionApplication->email }}</td>
                    </tr>
                    <tr>
                        <td>Postal Address</td>
                        <td class="px-2">{{ $admissionApplication->present_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
