<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animation;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::all();
        return view('admin.slider.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animations = Animation::select('id', 'title')->get();
        return view('admin.slider.create', compact('animations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating data from the Request 
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'animation_id' => 'nullable',
            'title' => 'required|max:255',
            'sort_description' => 'required',
            'long_description' => 'nullable',
        ]);

        // Storing data from the Request 
        $slider = Slider::create($validated);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $slider->addMediaFromRequest('image')->toMediaCollection('slider');
        }
        // Redirecting to index view
        return redirect()->route('admin.slider.index')->with('success','Slide created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slider::where('id', $id)->first();
        $animations = Animation::all();
        return view('admin.slider.edit')
        ->with('animations', $animations)
        ->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validating data from the Request 
        $validated = $request->validate([
            'animation_id' => 'nullable',
            'title' => 'required|max:255',
            'sort_description' => 'required',
            'long_description' => 'nullable',
            'status' => 'required',
        ]);

        $slide = Slider::find($id);
        // Storing data from the Request 
        $slide->update($validated);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $slide->clearMediaCollection('slider');
            $slide->addMediaFromRequest('image')->toMediaCollection('slider');
        }
        // Redirecting to index view
        return redirect()->route('admin.slider.index')->with('success','Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        // Redirecting to index view
        return redirect()->route('admin.slider.index')->with('success','Slide updated successfully');
    }
}
