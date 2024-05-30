<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\FacilityRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProgramRequest;
use App\Http\Requests\QualificationRequest;
use App\Models\AdmissionApplication;
use App\Models\Board;
use App\Models\Category;
use App\Models\Course;
use App\Models\Degree;
use App\Models\DegreeGroup;
use App\Models\Gender;
use App\Models\ProgramAdmission;
use App\Models\ProgramType;
use App\Models\Religion;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;

class HomeController extends Controller
{

    protected $redirectTo = '/student/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('student.auth:student');
    }

    /**
     * Show the Student dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userStep = Auth::guard('student')->user()->where_am_i;

        $userId = Auth::guard('student')->user()->id;

        if ($userStep == 99) {
            $mobile = Auth::guard('student')->user()->mobile;
            return view('student.sendOTP', compact('mobile'));
        }
        if ($userStep == 98) {
            $mobile = Auth::guard('student')->user()->mobile;
            return view('student.verifyOTP', compact('mobile'));
        } elseif ($userStep == 0) {
            $courses = Course::all();
            return view('student.selectCourse', compact('courses'));
        } elseif ($userStep == 1) {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            $course = Course::find($student_course_id);
            return view('student.home', compact('course'));
        } elseif ($userStep == 2) {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            $genders = Gender::all();
            $categories = Category::all();
            $religions = Religion::all();
            return view('student.personal', compact('genders', 'categories', 'religions', 'student_course'));
        } elseif ($userStep == 3) {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            $boards = Board::all();
            return view('student.professional', compact('boards', 'student_course'));
        } elseif ($userStep == 4) {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            return view('student.upload', compact('student_course'));
        }
        if ($userStep == 5) {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            $course = Course::find($student_course_id);
            return view('student.confirm', compact('student_course', 'course'));
        } else {
            $student_courses = AdmissionApplication::where("student_id", "=", $userId)->get();
            foreach ($student_courses as $student_course) {
                $student_course_id = $student_course->course_record_id;
                break;
            }
            $course = Course::find($student_course_id);
            return view('student.submit', compact('student_course', 'course'));
        }
    }

    public function home()
    {
        $student = Auth::guard('student')->user();
        $religions = Religion::all();
        return view('student.application.dashboard', compact('student', 'religions'));
    }

    public function saveProfile(ProfileRequest $request)
    {
        $student = Auth::guard('student')->user();

        $admissionApplication = $student->admissionApplication;

        $profileImage = $admissionApplication?->profile_image;
        $parenImage = $admissionApplication?->parent_image;

        // Profile image manage
        if ($request->hasFile('profile_image')) {

            $file = $request->file('profile_image');
            $uploadPath = public_path('admission-documents/');

            if ($profileImage && file_exists($uploadPath . $profileImage)) {
                unlink($uploadPath . $profileImage);
            }
            $rando = Str::random(10) . $file->getSize() . date('YHis');

            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = $rando . '.' . $fileExtension;
            $file->move($uploadPath, $newFileName);

            $profileImage = $newFileName;
        }


        // Parent image manage
        if ($request->hasFile('parent_image')) {

            $file = $request->file('parent_image');
            $uploadPath = public_path('admission-documents/');

            if ($parenImage && file_exists($uploadPath . $parenImage)) {
                unlink($uploadPath . $parenImage);
            }
            $rando = Str::random(10) . $file->getSize() . date('YHis');

            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = $rando . '.' . $fileExtension;
            $file->move($uploadPath, $newFileName);

            $parenImage = $newFileName;
        }

        $lastId = AdmissionApplication::latest('id')->first()?->id ?? 0;

        $applicationNumber = 'HRISC-BSMT-' . date('Y') . '-' . str_pad($lastId + 1, 6, '0', STR_PAD_LEFT);

        AdmissionApplication::updateOrCreate([
            'id' => $admissionApplication->id ?? null
        ], [
            'application_number' => $admissionApplication?->application_id ?? $applicationNumber,
            'student_id' => $student->id,
            'name' => $request->name,
            'national_id' => $request->national_id,
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'mobile' => $request->phone,
            'email' => $request->email,
            'blood_group' => $request->blood_group,
            'dob' => Carbon::parse($request->dob)->format('Y-m-d'),
            'religion_record_id' => $request->religion,
            'special_person' => $request->special_person ? true : false,
            'physical_disability' => $request->physical_disability,
            'guardian_relation' => $request->relationship,
            'guardian_name' => $request->parent_name,
            'guardian_occupation' => $request->parent_profession,
            'guardian_national_id' => $request->parent_national_id,
            'guardian_contact' => $request->parent_phone,
            'guardian_email' => $request->parent_email,
            'permanent_address' => $request->permanent_address,
            'present_address' => $request->postal_address,
            'province' => $request->province,
            'district' => $request->district,
            'city' => $request->city,
            'profile_image' => $profileImage,
            'parent_image' => $parenImage
        ]);

        if ($student->where_am_i == 0) {
            $student->update(['where_am_i' => 1]);
        }

        $notify[] = ['success', 'Profile Saved Successfully'];
        return to_route('programs.index')->withNotify($notify);
    }

    public function programs()
    {
        $student = Auth::guard('student')->user();
        if ($student->where_am_i < 2) {
            $notify[] = ['error', 'Please complete your profile'];
            return back()->withNotify($notify);
        }
        $programTypes = ProgramType::all();
        $programAdmissions = ProgramAdmission::all();
        $sessions = Session::latest('id')->get();
        return view('student.application.programs', compact('programTypes', 'programAdmissions', 'student', 'sessions'));
    }

    public function savePrograms(ProgramRequest $request)
    {
        $student = Auth::guard('student')->user();
        if ($student->where_am_i < 2) {
            $notify[] = ['error', 'Please complete your profile'];
            return back()->withNotify($notify);
        }
        $admissionApplication = $student->admissionApplication;

        AdmissionApplication::updateOrCreate([
            'id' => $admissionApplication?->id ?? null
        ], [
            'student_id' => $student->id,
            'program_session' => $request->program_session,
            'program_type_id' => $request->program_type,
            'program_id_of_admission' => $request->program_admission,
            'session_id' => $request->session
        ]);

        if ($student->where_am_i == 1) {
            $student->update(['where_am_i' => 2]);
        }

        $notify[] = ['success', 'Programs Saved Successfully'];
        return to_route('qualifications.index')->withNotify($notify);
    }

    public function qualifications()
    {
        $student = Auth::guard('student')->user();
        if ($student->where_am_i < 2) {
            $notify[] = ['error', 'Please complete your programs'];
            return back()->withNotify($notify);
        }
        $boards = Board::all();
        $degrees = Degree::all();
        $degreeGroups = DegreeGroup::all();
        return view('student.application.qualifications', compact('student', 'boards', 'degrees', 'degreeGroups'));
    }

    public function saveQualifications(QualificationRequest $request)
    {
        $student = Auth::guard('student')->user();
        $admissionApplication = $student->admissionApplication;

        if ($student->where_am_i < 2) {
            $notify[] = ['error', 'Please complete your programs'];
            return back()->withNotify($notify);
        }

        $percentage = ($request->a_level_obtained_marks / $request->a_level_total_marks) * 100;

        if (($admissionApplication->programType->id == 1 || $admissionApplication->programType->id == 2 || $admissionApplication->programType->id == 3) && $percentage < 45) {
            $notify[] = ['error', 'Sorry! Your percentage is less than 45.!'];
            return back()->withNotify($notify);
        }

        $scholarship = $this->getShcolarshipPercentage($admissionApplication->programType, $percentage);

        AdmissionApplication::updateOrCreate([
            'id' => $admissionApplication?->id ?? null
        ], [
            'student_id' => $student->id,
            'o_level_degree_id' => $request->degree,
            'o_level_degree_group_id' => $request->degree_group,
            'o_level_board_id' => $request->board,
            'o_level_Institute' => $request->institute_name,
            'o_level_roll' => $request->roll_number,
            'o_level_registration' => $request->registration_number,
            'o_level_passing_year' => $request->passing_year,
            'o_level_total_marks' => $request->total_marks,
            'o_level_obtained_marks' => $request->obtained_marks,
            'o_level_percentage' => $request->percentage,
            'a_level_degree_id' => $request->a_level_degree,
            'a_level_degree_group_id' => $request->a_level_degree_group,
            'a_level_board_id' => $request->a_level_board,
            'a_level_Institute' => $request->a_level_institute_name,
            'a_level_roll' => $request->a_level_roll_number,
            'a_level_registration' => $request->a_level_registration_number,
            'a_level_passing_year' => $request->a_level_passing_year,
            'a_level_total_marks' => $request->a_level_total_marks,
            'a_level_obtained_marks' => $request->a_level_obtained_marks,
            'a_level_percentage' => $percentage,
            'major_subject' => $request->major_subject,
            'complated_intermediate' => $request->complate_intermediate ? true : false,
            'scholarship' => $scholarship
        ]);

        if ($student->where_am_i == 2) {
            $student->update(['where_am_i' => 3]);
        }

        $notify[] = ['success', 'Qualifications Saved Successfully'];
        return to_route('documents.index')->withNotify($notify);
    }


    public function documents()
    {
        $student = Auth::guard('student')->user();
        if ($student->where_am_i < 3) {
            $notify[] = ['error', 'Please complete your qualifications'];
            return back()->withNotify($notify);
        }
        return view('student.application.documents', compact('student'));
    }

    public function saveDocuments(DocumentRequest $request)
    {
        $student = Auth::guard('student')->user();
        $admissionApplication = $student->admissionApplication;

        if ($student->where_am_i < 3) {
            $notify[] = ['error', 'Please complete your qualifications'];
            return back()->withNotify($notify);
        }

        $studentBForm = $admissionApplication?->student_b_form;
        $guardianBForm = $admissionApplication?->guardian_b_form;
        $intermediateCertificate = $admissionApplication?->intermediate_certificate;
        $domicileCertificate = $admissionApplication?->domicile_certificate;
        $hafizEQuranCertificate = $admissionApplication?->quran_certificate_issued;
        $NocOtherBoard = $admissionApplication?->noc;
        $disabilityCertificate = $admissionApplication?->disability_certificate;

        if ($request->hasFile('cnic_image')) {
            $studentBForm = $this->uploadImage($request->cnic_image, $studentBForm, 'Cnic-S');
        }

        if ($request->hasFile('guardian_cnic_image')) {
            $guardianBForm = $this->uploadImage($request->guardian_cnic_image, $guardianBForm, 'Cnic-G');
        }

        if ($request->hasFile('a_level_certificate')) {
            $intermediateCertificate = $this->uploadImage($request->a_level_certificate, $intermediateCertificate, 'Inter');
        }

        if ($request->hasFile('domicile_certificate')) {
            $domicileCertificate = $this->uploadImage($request->domicile_certificate, $domicileCertificate, 'Domicile');
        }

        if ($request->hasFile('noc_from_other_board')) {
            $NocOtherBoard = $this->uploadImage($request->noc_from_other_board, $NocOtherBoard, 'Noc');
        }

        if ($request->hasFile('hafiz_e_quran_certificate')) {
            $hafizEQuranCertificate = $this->uploadImage($request->hafiz_e_quran_certificate, $hafizEQuranCertificate, 'Hafiz');
        }

        if ($request->hasFile('disability_certificate')) {
            $disabilityCertificate = $this->uploadImage($request->disability_certificate, $disabilityCertificate, 'Disable');
        }


        AdmissionApplication::updateOrCreate([
            'id' => $admissionApplication?->id ?? null
        ], [
            'student_id' => $student->id,
            'student_b_form' => $studentBForm,
            'guardian_b_form' => $guardianBForm,
            'intermediate_certificate' => $intermediateCertificate,
            'domicile_certificate' => $domicileCertificate,
            'quran_certificate_issued' => $hafizEQuranCertificate,
            'disability_certificate' => $disabilityCertificate,
            'noc' => $NocOtherBoard
        ]);

        if ($student->where_am_i == 3) {
            $student->update(['where_am_i' => 4]);
        }

        $notify[] = ['success', 'Documents Saved Successfully'];
        return to_route('facilities.index')->withNotify($notify);
    }


    public function facilities()
    {
        $student = Auth::guard('student')->user();
        if ($student->where_am_i < 4) {
            $notify[] = ['error', 'Please complete your documents'];
            return back()->withNotify($notify);
        }
        return view('student.application.facilities', compact('student'));
    }

    public function saveFacilities(FacilityRequest $request)
    {
        $student = Auth::guard('student')->user();

        if ($student->where_am_i < 4) {
            $notify[] = ['error', 'Please complete your documents'];
            return back()->withNotify($notify);
        }

        AdmissionApplication::updateOrCreate([
            'id' => $student->admissionApplication?->id
        ], [
            'transport_facility' => $request->transport_facility,
            'hostel_facility' => $request->hostel_facility,
            'route' => $request->rout
        ]);

        if ($student->where_am_i == 4) {
            $student->update(['where_am_i' => 5]);
        }

        $notify[] = ['success', 'Facilities Saved Successfully'];
        return to_route('submit.index')->withNotify($notify);
    }

    public function submit()
    {
        $student = Auth::guard('student')->user();

        if ($student->where_am_i < 5) {
            $notify[] = ['error', 'Please complete your facilities'];
            return back()->withNotify($notify);
        }

        $array = json_decode($student->admissionApplication?->hostel_facility) ?? [];
        $hostel = in_array('1', $array) ? true : false;

        $array = json_decode($student->admissionApplication?->transport_facility) ?? [];
        $transport = in_array('1', $array) ? true : false;


        return view('student.application.submit', compact('student', 'hostel', 'transport'));
    }

    public function saveSubmit(Request $request)
    {
        $student = Auth::guard('student')->user();

        if ($student->where_am_i < 5) {
            $notify[] = ['error', 'Please complete your facilities'];
            return back()->withNotify($notify);
        }

        AdmissionApplication::updateOrCreate([
            'id' => $student->admissionApplication?->id
        ], [
            'status' => 1
        ]);

        $student->update(['where_am_i' => 6]);

        $notify[] = ['success', 'Your information has been sent Successfully'];
        return to_route('downloads.index')->withNotify($notify);
    }

    public function downloads()
    {
        $student = Auth::guard('student')->user();
        if ($student->admissionApplication?->status != 1) {
            $notify[] = ['error', 'Please complete your application'];
            return back()->withNotify($notify);
        }
        return view('student.application.downloads');
    }

    private function uploadImage($file, $exitFile, $fileLastName)
    {
        $uploadPath = public_path('admission-documents/');

        if ($exitFile && file_exists($uploadPath . $exitFile)) {
            unlink($uploadPath . $exitFile);
        }

        $rando = 'HRIA-' . date('Y-m-d') . '-' . date('Hmis') . '-' . $fileLastName;

        $fileExtension = $file->getClientOriginalExtension();

        $newFileName = $rando . '.' . $fileExtension;

        $file->move($uploadPath, $newFileName);

        return $newFileName;
    }

    public function downloadOnlineApplicationPDF()
    {
        $student = Auth::guard('student')->user();
        $admissionApplication = $student->admissionApplication;
        $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'dpi' => 150, 'setPaper' => 'letter'])->loadView('student.pdf.admission', compact('student', 'admissionApplication'));

        return $pdf->download('Online-Application ' . $admissionApplication?->application_number . '.pdf');
    }

    private function getShcolarshipPercentage(ProgramType $programType, $percentage)
    {
        $discountPercent = 0;
        foreach ($programType->scholarships as $scholarship) {
            if ($scholarship->from <= $percentage && $scholarship->to >= $percentage) {
                $discountPercent = $scholarship->percentage;
            }
        }
        return $discountPercent;
    }

    public function scholarshipPercent(Request $request)
    {
        $request->validate([
            'percentage' => 'required|numeric',
        ]);

        $student = Auth::guard('student')->user();
        $programType = $student->admissionApplication->programType;

        $scholarship = $this->getShcolarshipPercentage($programType, $request->percentage);

        return response()->json(['scholarship' => $scholarship]);
    }
}
