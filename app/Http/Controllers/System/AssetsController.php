<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AssetsController extends Controller
{
    public function getAssets(){

        $role = auth()->user()->getRoleNames()->first();

        $desc = $role === "System Supervisor" ? "View and manage assets" : "View assets information";

        return view('pages.assets.index-assets', compact('desc'));
    }

    public function getAsset(){
        return view('pages.assets.show-asset');
    }
}
