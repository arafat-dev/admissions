<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\Board;
use App\Models\Degree;
use App\Models\DegreeGroup;
use App\Models\ProgramAdmission;
use App\Models\ProgramType;
use App\Models\Religion;
use App\Models\StudentFee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentProfileController extends Controller
{
    public function index(AdmissionApplication $admissionApplication)
    {

        $title = 'Student Profile';
        $religions = Religion::all();
        $programTypes = ProgramType::all();
        $programAdmissions = ProgramAdmission::all();
        $boards = Board::all();
        $degrees = Degree::all();
        $degreeGroups = DegreeGroup::all();

        return view('admin.student.profile.index', compact('admissionApplication', 'title', 'religions', 'programTypes', 'programAdmissions', 'boards', 'degrees', 'degreeGroups'));
    }

    public function profileUpdate(Request $request, AdmissionApplication $admissionApplication)
    {

        $profileImage = $admissionApplication->profile_image;
        $parenImage = $admissionApplication->parent_image;

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

        $admissionApplication->update([
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
            'parent_image' => $parenImage,
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
            'a_level_percentage' => $request->a_level_percentage,
            'major_subject' => $request->major_subject,
            'complated_intermediate' => $request->complate_intermediate ? true : false
        ]);

        $notify[] = ['success', 'Profile updated successfully'];

        return to_route('admin.student.profile.index', $admissionApplication)->withNotify($notify);
    }

    public function document(AdmissionApplication $admissionApplication)
    {
        $title = 'Student Document';

        return view('admin.student.profile.document', compact('admissionApplication', 'title'));
    }

    public function generatePaySlip(AdmissionApplication $admissionApplication)
    {
        $title = 'Student Generate PaySlip';

        return view('admin.student.profile.generate-payslip', compact('admissionApplication', 'title'));
    }

    public function submitFeeReceipt(AdmissionApplication $admissionApplication)
    {
        $title = 'Student Submit Fee Receipt';

        $fees = $admissionApplication->student->fees;

        $previousMonths = [];
        $currentMonth = Carbon::now();
        // Get previous months
        for ($i = 1; $i <= 2; $i++) {
            $previousMonth = $currentMonth->copy()->subMonths($i);
            $previousMonths[] = $previousMonth->format('F-Y');
        }
        $previousMonths[] = $currentMonth->format('F-Y');

        $dueMonths = [];
        foreach ($previousMonths as $month) {
            $fee = $admissionApplication->student->fees()->where('month', $month)->first();
            if (!$fee) {
                $dueMonths[] = $month;
            }
        }

        return view('admin.student.profile.submit-fee-recip', compact('admissionApplication', 'title', 'fees', 'dueMonths'));
    }

    public function submitFeeReceiptFile(AdmissionApplication $admissionApplication, Request $request)
    {
        $request->validate([
            'recip_file' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'amount' => 'required',
        ]);

        $recipName = $this->uploadImage($request->recip_file, $request->date);

        StudentFee::create([
            'student_id' => $admissionApplication->student_id,
            'month' => $request->date,
            'amount' => $request->amount,
            'receip_file' => $recipName
        ]);

        $notify[] = ['success', 'Fee receipt uploaded successfully'];
        return back()->withNotify($notify);
    }

    public function promote(AdmissionApplication $admissionApplication){
        $title = 'Student Promote';
        return view('admin.student.profile.promote', compact('admissionApplication', 'title'));
    }

    public function promoteUpdate(AdmissionApplication $admissionApplication, Request $request){

        $admissionApplication->student()->update([
            'course_semester' => $request->course_semester,
        ]);

        $notify[] = ['success', 'Student promoted successfully'];
        return back()->withNotify($notify);
    }

    public function deactivate(AdmissionApplication $admissionApplication){
        $title = 'Student Deactivate';
        return view('admin.student.profile.deactivate', compact('admissionApplication', 'title'));
    }

    public function deactivateUpdate(AdmissionApplication $admissionApplication, Request $request){

        $request->validate([
            'reason' => 'required'
        ]);

        $admissionApplication->update([
            'status' => 3,
            'deactive_reason' => $request->reason
        ]);
        $notify[] = ['success', 'Student deactivated successfully'];
        return back()->withNotify($notify);
    }

    public function archive(AdmissionApplication $admissionApplication){
        $title = 'Student Archive';
        return view('admin.student.profile.archive', compact('admissionApplication', 'title'));
    }


    public function archiveUpdate(AdmissionApplication $admissionApplication, Request $request){

        $request->validate([
            'reason' => 'required'
        ]);

        $admissionApplication->update([
            'archive' => 1,
            'archive_reason' => $request->reason
        ]);
        $notify[] = ['success', 'Student archived successfully'];
        return back()->withNotify($notify);
    }

    private function uploadImage($file, $date)
    {
        $uploadPath = public_path('studentFees/');

        $month = Carbon::parse($date)->format('F');

        $rando = 'HRIA-' . date('Y') . '-' . $month . date('-m-d') .'-'. date('Hmis') . '-feepay';

        $fileExtension = $file->getClientOriginalExtension();

        $newFileName = $rando . '.' . $fileExtension;

        $file->move($uploadPath, $newFileName);

        return $newFileName;
    }
}
