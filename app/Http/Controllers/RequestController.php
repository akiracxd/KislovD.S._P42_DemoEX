<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as WashRequest; //asfdasfasdfsadgasdgsdafhd
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $requests = WashRequest::all();

        return view('request.index', compact('requests'));
    }

    public function show(WashRequest $washRequest)
    {
        return view('request.show', compact('washRequest'));
    }

    public function create()
    {
        return view("request.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'string',
            'date' => 'date'
        ]);
        WashRequest::create([
            'number' => $data['number'],
            'date' => $data['date'],
            'status_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('dashboard');
    }

    public function destroy(WashRequest $washRequest)
    {
        $washRequest->delete();
        return redirect()->back();
    }
}
