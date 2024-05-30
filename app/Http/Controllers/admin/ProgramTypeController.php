<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramType;
use Illuminate\Http\Request;

class ProgramTypeController extends Controller
{
    public function index()
    {
        $title = 'Program Type';
        $programTypes = ProgramType::all();
        return view('admin.program-type', compact('title', 'programTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:program_type,name',
            'short_name' => 'required|string|max:255|unique:program_type,short_name',
            'session' => 'required|numeric',
        ]);

        ProgramType::create([
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'name' => $request->name,
            'short_name' => $request->short_name,
            'session' => $request->session
        ]);

        $notify[] = ['success', 'Program Type created successfully'];
        return back()->withNotify($notify);
    }

    public function update(Request $request, ProgramType $programType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:program_type,name,' . $programType->id,
            'short_name' => 'required|string|max:255|unique:program_type,short_name,' . $programType->id,
            'session' => 'required|numeric',
        ]);

        $programType->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'session' => $request->session
        ]);

        $notify[] = ['success', 'Program Type updated successfully'];
        return back()->withNotify($notify);
    }

    public function destroy(ProgramType $programType)
    {
        if ($programType->id > 6) {
            $programType->delete();
            $notify[] = ['success', 'Program Type deleted successfully'];
            return back()->withNotify($notify);
        }
        $notify[] = ['error', 'This Program Type cannot be deleted'];
        return back()->withNotify($notify);
    }
}
