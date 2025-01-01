<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\ContactUsSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function showContactUsForm()
    {
        $editModeData = ContactUsSetting::first();

        return view('admin.setting.contact_us_setting', compact('editModeData'));
    }

    public function updateContactUs(Request $request)
    {
        $contact_us_setting     = ContactUsSetting::first();

        $input                  = $request->all();
        $input['updated_by']    = session('logged_session_data.id');
        $input['updated_at']    = Carbon::now();

        try {

            if (isset($contact_us_setting) && !empty($contact_us_setting)) {
                $contact_us_setting->update($input);
            } else {
                ContactUsSetting::create($input);
            }

            return back()->with('success', 'Contact us setting updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
