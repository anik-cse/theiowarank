<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Throwable;

class SliderDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {

        $details = Slider::select('long_description')->where('slug', $slug)->first();
        if (!$details) {
            abort(404);
        }
        return view('guest.slide-details', compact('details'));
    }
}
