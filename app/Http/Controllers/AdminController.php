<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as WashRequest;
use App\Models\Status;

class AdminController extends Controller
{
    public function index()
    {
        $requests = WashRequest::all();
        $statuses = Status::all();

        return view('admin.index', compact('requests', 'statuses'));
    }
}
