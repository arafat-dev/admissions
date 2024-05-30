<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramType;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $title = 'Scholarship';
        $programId = request('program');

        $programTypes = ProgramType::take(3)->get();

        if ($programId) {
            $programType = ProgramType::findOrFail($programId);
        } else {
            $programType = ProgramType::first();
        }

        return view('admin.scholarship', compact('title', 'programType', 'programTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'percentage' => 'required|numeric'
        ]);

        if ($request->program) {
            $programType = ProgramType::find($request->program);
        } else {
            $programType = ProgramType::first();
        }

        foreach ($programType->scholarships as $scholarship) {
            if ($scholarship->from == $request->from || $scholarship->to == $request->from) {
                $notify[] = ['error', 'Scholarship From Already Exist'];
                return back()->withNotify($notify);
            } elseif ($scholarship->to == $request->to || $scholarship->from == $request->to) {
                $notify[] = ['error', 'Scholarship To Already Exist'];
                return back()->withNotify($notify);
            }
        }

        Scholarship::create([
            'from' => $request->from,
            'to' => $request->to,
            'percentage' => $request->percentage,
            'program_type_id' => $programType->id
        ]);

        $notify[] = ['success', 'Scholarship Created Successfully'];
        return back()->withNotify($notify);
    }

    public function update(Request $request,Scholarship $scholarship)
    {
        $request->validate([
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'percentage' => 'required'
        ]);

        $programType = $scholarship->programType;

        $scholarship->update([
            'from' => $request->from,
            'to' => $request->to,
            'percentage' => $request->percentage
        ]);

        $notify[] = ['success', 'Scholarship Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function destroy(Scholarship $scholarship)
    {
        $scholarship->delete();
        $notify[] = ['success', 'Scholarship Deleted Successfully'];
        return back()->withNotify($notify);
    }
}
