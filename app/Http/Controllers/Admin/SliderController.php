<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class SliderController extends Controller
{
    public function index()
    {
        $results = Slider::orderBy('id', 'DESC')->paginate(10);

        return view('admin.slider.index', ['results' => $results]);
    }

    public function create()
    {
        return view('admin.slider.form');
    }

    public function store(SliderRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = session('logged_session_data.id');
        $input['created_at'] = Carbon::now();

        $slider_image = $request->file('banner_img');

        if ($slider_image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/slider/', $imgName);
            $input['banner_img'] = $imgName;
        }

        try {

            unset($input['_token']);

            Slider::create($input);
            return redirect()->back()->with('success', 'Slider created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data['editModeData'] = Slider::findOrFail($id);

        return view('admin.slider.form', $data);
    }

    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $input = $request->all();
        $input['updated_by'] = session('logged_session_data.id');
        $input['updated_at'] = Carbon::now();

        $sliderImage = $request->file('banner_img');

        if ($sliderImage) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('banner_img')) . '.' . $request->file('banner_img')->getClientOriginalExtension();
            $request->file('banner_img')->move('uploads/slider/', $imgName);

            if (file_exists('uploads/slider/' . $slider->banner_img) && !empty($slider->banner_img)) {
                unlink('uploads/slider/' . $slider->banner_img);
            }

            $input['banner_img'] = $imgName;
        }

        try {
            $slider->update($input);
            return redirect(route('admin.slider.index'))->with('success', 'Slider updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $data = Slider::findOrFail($request->slider_id);
        $input['status'] = $request->status;

        try {
            $data->update($input);
            $bug = 0;
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()]);
        }

        if ($bug == 0) {
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }

    public function delete($id)
    {
        try {
            Slider::where('id', $id)->delete();
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Deleted successfully']);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'status' => 400, 'message' => $exception->getMessage()]);
        }
    }
}
