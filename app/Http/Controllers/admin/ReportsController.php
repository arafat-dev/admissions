<?php
 
namespace App\Http\Controllers\admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
class ReportsController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
    	$data['title'] = 'Report';
    	$data['active'] = 1;
        return view('admin.reports', $data);
    }
}