<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TutionFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['title'] = 'Assign Program Fees';
        $data['active'] = 1;
        $data['allCoures'] = DB::table('course_record')->where('active',1)->get();
        $data['bsc_fees'] = DB::table('tuition_fees')->where('active',1)->where('course_record_id',5)->get();
        $data['adp_fees'] = DB::table('tuition_fees')->where('active',1)->where('course_record_id',6)->get();
        $data['hsc_fees'] = DB::table('tuition_fees')->where('active',1)->where('course_record_id',7)->get();
        $data['ssc_fees'] = DB::table('tuition_fees')->where('active',1)->where('course_record_id',8)->get();
        

        return view('admin.student.tution_fees',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}