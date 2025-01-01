<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutUsController extends Controller
{
    public function showAboutUsForm()
    {
        $editModeData = AboutUsSetting::first();

        return view('admin.setting.about_us_setting', compact('editModeData'));
    }

        //Update AboutUs Setting
        public function updateAboutUs(Request $request)
        {
            $about_us_setting         = AboutUsSetting::first();

            $input                  = $request->all();
            $input['updated_by']    = session('logged_session_data.id');
            $input['updated_at']    = Carbon::now();

            $about_us_setting_image = $request->file('image');

            if ($about_us_setting_image) {

                $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('uploads/about_us_setting/', $imgName);

                if (!empty($about_us_setting->image) && file_exists('uploads/about_us_setting/' . $about_us_setting->image)) {
                    unlink('uploads/about_us_setting/' . $about_us_setting->image);
                }

                $input['image'] = $imgName;
            }

            try {

                if (isset($about_us_setting) && !empty($about_us_setting)) {
                    $about_us_setting->update($input);
                } else {
                    AboutUsSetting::create($input);
                }

                return back()->with('success', 'About us setting updated successfully.');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
}
