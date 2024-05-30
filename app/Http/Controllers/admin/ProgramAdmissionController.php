<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\ProgramAdmission;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProgramAdmissionController extends Controller
{
    public function index()
    {
        $title = 'Program Admission';
        $programAdmissions = ProgramAdmission::all();
        return view('admin.program-admission', compact('title', 'programAdmissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:program_of_admission,program',
            'admission_deadline' => 'required|date',
            'time' => 'required',
        ]);

        //format Monday April 23, 2023 - 17:00 (Pakistan Std. Time)
        ProgramAdmission::create([
            'program' => $request->name,
            'admission_deadline' => $request->admission_deadline.' '.$request->time,
        ]);

        $notify[] = ['success', 'Program Admission created successfully'];
        return to_route('admin.program.admission')->withNotify($notify);
    }

    public function update(Request $request, ProgramAdmission $programAdmission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:program_of_admission,program,' . $programAdmission->id,
            'admission_deadline' => 'required|date',
            'time' => 'required',
        ]);

        $programAdmission->update([
            'program' => $request->name,
            'admission_deadline' => $request->admission_deadline.' '.$request->time,
        ]);

        $notify[] = ['success', 'Program Admission updated successfully'];
        return to_route('admin.program.admission')->withNotify($notify);
    }

    public function destroy(ProgramAdmission $programAdmission)
    {
        $ids = AdmissionApplication::query()->pluck('program_id_of_admission')->toArray();
        if (in_array($programAdmission->id, $ids)) {
            $notify[] = ['error', 'This Program Admission is cannot be deleted because it is in use!'];
            return back()->withNotify($notify);
        }

        $programAdmission->delete();

        $notify[] = ['success', 'Program Admission deleted successfully'];
        return back()->withNotify($notify);
    }
}
