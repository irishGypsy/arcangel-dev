<?php

namespace App\Http\Controllers;

use App\Models\Banner;
//use App\Models\Slider;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliderImg = Banner::get();
        return response()->json($sliderImg);

    }
}
