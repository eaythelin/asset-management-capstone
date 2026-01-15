<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Request as RequestModel;

class RequestsController extends Controller
{
    public function getRequests(){
        $role = Auth::user() -> getRoleNames() -> first();

        $desc = match($role) {
            'Department Head' => 'View and manage your requests',
            'General Manager' => 'View and approve/decline requests',
            default => 'View pending requests',
        };

        $requests = RequestModel::all();
        dd($requests);

        return view('pages.requests.index-requests', compact('desc', 'requests'));
    }
}
