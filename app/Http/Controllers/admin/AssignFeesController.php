<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProgrameFee;
use App\Models\ProgramType;
use Illuminate\Http\Request;
use DB;

class AssignFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id=null)
    {
        $title = 'Assign Program Fees';

        if ($id) {
           $programType = ProgramType::findOrFail($id);
        }else{
            $programType = ProgramType::first();
        }

        $programTypes = ProgramType::all();

        return view('admin.student.assign_fees', compact('title', 'programType', 'programTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramType $programType, Request $request)
    {
        $request->validate([
            'description' => 'required',
            'fee' => 'required',
        ]);

        ProgrameFee::create([
            'program_type_id' => $programType->id,
            'name' => $request->description,
            'fee' => $request->fee,
            'status' => true,
            'type' => $request->type
        ]);

        $notify[] = ['success', 'Fee assigned successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgrameFee $programeFee)
    {
        $request->validate([
            'description' => 'required',
            'fee' => 'required',
        ]);

        $programeFee->update([
            'name' => $request->description,
            'fee' => $request->fee,
        ]);

        $notify[] = ['success', 'Fee updated successfully'];
        return back()->withNotify($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgrameFee $programeFee)
    {
        $programeFee->delete();
        $notify[] = ['success', 'Fee deleted successfully'];
        return back()->withNotify($notify);
    }
}
