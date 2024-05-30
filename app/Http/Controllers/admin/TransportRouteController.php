<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\TransportRoute;
use Illuminate\Http\Request;

class TransportRouteController extends Controller
{
    public function index()
    {
        $title = 'Transport Routes & Fare';
        $transportRoutes = TransportRoute::paginate(10);
        return view('admin.student.transport-route', compact('title', 'transportRoutes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'route_no' => 'required|numeric|unique:transport_routes,route_no',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'distance' => 'required|numeric|min:0',
            'per_day' => 'required|numeric|min:0',
            'total_days' => 'required|numeric|min:0',
            'per_month' => 'required|numeric|min:0',
        ]);

        TransportRoute::create([
            'route_no' => $request->route_no,
            'title' => $request->title,
            'description' => $request->description,
            'distance' => $request->distance,
            'per_day_fee' => $request->per_day,
            'total_days' => $request->total_days,
            'per_month_fee' => $request->per_month,
        ]);

        $notify[] = ['success', 'Transport Route created successfully'];
        return to_route('admin.transport.route')->withNotify($notify);
    }

    public function update(Request $request, TransportRoute $transportRoute)
    {
        $request->validate([
            'route_no' => 'required|numeric|unique:transport_routes,route_no,' . $transportRoute->id,
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'distance' => 'required|numeric|min:0',
            'per_day' => 'required|numeric|min:0',
            'total_days' => 'required|numeric|min:0',
            'per_month' => 'required|numeric|min:0',
        ]);

        $transportRoute->update([
            'title' => $request->title,
            'description' => $request->description,
            'distance' => $request->distance,
            'per_day_fee' => $request->per_day,
            'total_days' => $request->total_days,
            'per_month_fee' => $request->per_month,
        ]);

        $notify[] = ['success', 'Transport Route updated successfully'];
        return to_route('admin.transport.route')->withNotify($notify);
    }

    public function destroy(TransportRoute $transportRoute)
    {
        $useRoutes = AdmissionApplication::query()->pluck('route')->toArray();
        foreach ($useRoutes as $route) {
            if (in_array($transportRoute->id, json_decode($route))) {
                $notify[] = ['error', 'This Route is cannot be deleted because it is in use!'];
                return back()->withNotify($notify);
            }
        }
        $transportRoute->delete();
        $notify[] = ['success', 'Transport Route deleted successfully'];
        return back()->withNotify($notify);
    }
}
