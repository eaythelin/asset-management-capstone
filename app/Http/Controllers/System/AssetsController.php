<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function getAssets(){
        return view('pages.assets.index-assets');
    }

    public function getAsset(){
        return view('pages.assets.show-asset');
    }
}
