<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdmissionApplication;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $title = 'session';
        $sessions = Session::latest('id')->paginate(10);
        return view('admin.session', compact('title', 'sessions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sessions,name'
        ]);

        Session::create([
            'name' => $request->name
        ]);

        $notify[] = ['success', 'Session Created successfully'];
        return to_route('admin.session')->withNotify($notify);
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sessions,name,' . $session->id
        ]);

        $session->update([
            'name' => $request->name
        ]);

        $notify[] = ['success', 'Session updated successfully'];
        return to_route('admin.session')->withNotify($notify);
    }

    public function destroy(Session $session)
    {
        $sessionIds = AdmissionApplication::query()->pluck('session_id')->toArray();
        if (in_array($session->id, $sessionIds)) {
            $notify[] = ['error', 'This Session is cannot be deleted because it is in use!'];
            return back()->withNotify($notify);
        }

        $session->delete();
        $notify[] = ['success', 'Session deleted successfully'];
        return back()->withNotify($notify);
    }
}
