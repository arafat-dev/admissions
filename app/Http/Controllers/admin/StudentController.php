<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\ProgramType;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function index(Request $request){
        $title = 'Active Student';
        $programTypes = ProgramType::all();
        $sessions = Session::latest('id')->get();

        $programType = $request->program;
        $gender = $request->gender;
        $session = $request->session;

        $admissionApplications = AdmissionApplication::where('status', '!=', 0)->where('status', '!=', 3)->where('archive', 0)
        ->when($programType, function ($query) use ($programType) {
            return $query->where('program_type_id', $programType);
        })->when($gender, function ($query) use ($gender) {
            return $query->where('gender', $gender);
        })->when($session, function ($query) use ($session) {
            return $query->where('session_id', $session);
        })->paginate(10)->withQueryString();

        return view('admin.student.active_student', compact('admissionApplications', 'title', 'programTypes', 'sessions'));
    }

    public function archievedStudent(Request $request){
        $title = 'Archived Student';
        $programTypes = ProgramType::all();
        $sessions = Session::latest('id')->get();

        $programType = $request->program;
        $gender = $request->gender;
        $session = $request->session;

        $admissionApplications = AdmissionApplication::where('status', '!=', 3)->where('archive', 1)
        ->when($programType, function ($query) use ($programType) {
            return $query->where('program_type_id', $programType);
        })->when($gender, function ($query) use ($gender) {
            return $query->where('gender', $gender);
        })->when($session, function ($query) use ($session) {
            return $query->where('session_id', $session);
        })->paginate(10)->withQueryString();

        return view('admin.student.archieved_student', compact('admissionApplications', 'title', 'programTypes', 'sessions'));
    }

    public function hotelRecord(){
        $data['title'] = 'Hotel Record';
        $data['active'] = 1;

        $data['student'] = DB::table('application_record')->paginate(10);
        return view('admin.student.active_student',$data);
    }
}
