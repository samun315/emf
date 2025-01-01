<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use App\Models\MissionVissionSetting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function showMissionVisionForm()
    {
        $editModeData = MissionVissionSetting::first();

        return view('admin.setting.mission_vision', compact('editModeData'));
    }

    public function showFooterForm()
    {
        $editModeData = FooterSetting::first();

        return view('admin.setting.footer', compact('editModeData'));
    }

    //Update Mission & Vision Setting
    public function updateMissionVision(Request $request)
    {
        $mission_vision         = MissionVissionSetting::first();

        $input                  = $request->all();
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        $mission_vision_image = $request->file('image');

        if ($mission_vision_image) {

            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/mission_vision/', $imgName);

            if (!empty($mission_vision->image) && file_exists('uploads/mission_vision/' . $mission_vision->image)) {
                unlink('uploads/mission_vision/' . $mission_vision->image);
            }

            $input['image'] = $imgName;
        }

        try {

            if (isset($mission_vision) && !empty($mission_vision)) {
                $mission_vision->update($input);
            } else {
                MissionVissionSetting::create($input);
            }

            return back()->with('success', 'Mission vision updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    //Update Footer Setting
    public function updateFooter(Request $request)
    {
        $footer_setting         = FooterSetting::first();

        $input                  = $request->all();
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        try {
            if (!empty($footer_setting)) {
                $footer_setting->update($input);
            } else {
                FooterSetting::create($input);
            }

            return back()->with('success', 'Footer setting updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
