<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Asset;

class AssetsController extends Controller
{
    public function getAssets(){

        $role = auth()->user()->getRoleNames()->first();

        $desc = $role === "System Supervisor" ? "View and manage assets" : "View assets information";

        $assets = Asset::with(['category', 'custodian', 'department', 'subCategory', 'supplier'])->paginate(5);
        $columns = ["Asset Code", "Asset Name", "Serial Name","Department", "Custodian", "Category", "Status", "Actions"];

        return view('pages.assets.index-assets', compact('desc', 'assets', 'columns'));
    }

    public function getAsset(){
        return view('pages.assets.show-asset');
    }
}
