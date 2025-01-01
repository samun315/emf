<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonationRequest;
use App\Models\Blog;
use App\Models\Programs;
use App\Models\ContactUsSetting;
use App\Models\Donation;
use App\Models\Event;
use App\Models\FooterSetting;
use App\Models\MissionVissionSetting;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectFollowUp;
use App\Models\ProjectGallery;
use App\Models\Quote;
use App\Models\Slider;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $data['sliders']                = Slider::orderBy('id', 'ASC')->where('status', 'YES')->get();
        $data['programs']               = Programs::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['projects']               = Project::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['upcoming_projects']      = Project::orderBy('id', 'DESC')->where('status', 'YES')->where('project_status', 'Upcoming')->get();
        $data['project_follow_ups']     = ProjectFollowUp::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['events']                 = Event::orderBy('id', 'DESC')->where('status', 'YES')->where('event_status', 'Upcoming')->get();
        $data['blogs']                  = Blog::orderBy('id', 'DESC')->where('status', 'YES')->where('blog_type', 'PUBLIC')->get();
        $data['partners']               = Partner::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['volunteers']             = Volunteer::orderBy('id', 'ASC')->where('status', 'YES')->get();
        $data['quotes']                 = Quote::orderBy('id', 'ASC')->where('status', 'YES')->get();

        //Setting Data
        $data['featured_project']       = Project::where('featured', 'YES')->first();
        $data['mission_vision']         = MissionVissionSetting::first();
        $data['footer_setting']         = FooterSetting::first();

        return view('frontend.home', $data);
    }

    public function aboutUs()
    {
        $data['volunteers'] = DB::table('volunteers')->get();

        return view('frontend.about.index', $data);
    }

    public function events(Request $request)
    {
        $event_project_query = $request->query('project');

        $results = DB::table('events');

        if (!empty($event_project_query)) {
            $results = $results->where('project_id', $event_project_query);
        }

        $data['results'] = $results->orderBy('id', 'DESC')->paginate(10);

        $data['upcoming_events'] = DB::table('events')->where('event_status', 'Upcoming')->orderBy('id', 'DESC')->get();

        return view('frontend.event.index', $data);
    }

    public function eventDetails(Request $request)
    {
        $event_id = null;

        $upcoming_event_query = $request->query('upcoming-event');
        $event_query = $request->query('event');

        if (!empty($upcoming_event_query)) {
            $event_id =  $upcoming_event_query;
        } else if (!empty($event_query)) {
            $event_id =  $event_query;
        }

        $data['event'] =  DB::table('events as a')
            ->select('a.*', 'b.title as project_title')
            ->leftJoin('projects as b', 'a.project_id', '=', 'b.id')
            ->where('a.id', $event_id)
            ->first();

        $data['upcoming_events'] = DB::table('events')->where('event_status', 'Upcoming')->orderBy('id', 'DESC')->get();

        return view('frontend.event.details', $data);
    }

    public function contactUs()
    {
        $contact_us_setting = ContactUsSetting::first();

        return view('frontend.contact.index', compact('contact_us_setting'));
    }

    public function project(Request $request)
    {
        $project_program_query = $request->query('category');

        $results = DB::table('projects');

        if (!empty($project_program_query)) {
            $results = $results->where('program_id', $project_program_query);
        }

        $data['results'] = $results->orderBy('id', 'DESC')->paginate(10);

        $data['projects'] = DB::table('projects')->where('project_status', 'Upcoming')->orderBy('id', 'DESC')->get();
        $data['programs'] = DB::table('programs')->where('program_status', 'Upcoming')->orderBy('id', 'DESC')->get();

        return view('frontend.project.index', $data);
    }

    public function projectDetails(Request $request)
    {
        $project_id = null;

        $upcoming_project_query = $request->query('upcoming-project');
        $project_query = $request->query('project');

        if (!empty($upcoming_project_query)) {
            $project_id =  $upcoming_project_query;
        } else if (!empty($project_query)) {
            $project_id =  $project_query;
        }

        $data['project'] =  DB::table('projects as a')
            ->select('a.*', 'b.name as category_name')
            ->leftJoin('programs as b', 'a.program_id', '=', 'b.id')
            ->where('a.id', $project_id)
            ->first();

        $data['projects'] = DB::table('projects')->where('project_status', 'Upcoming')->orderBy('id', 'DESC')->get();
        $data['programs'] = DB::table('programs')->where('program_status', 'Upcoming')->orderBy('id', 'DESC')->get();

        return view('frontend.project.details', $data);
    }

    public function projectDonationRequestStore(Request $request)
    {
        $this->validate($request, [
            'project_or_program_name' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        $input                  = $request->all();

        // Split the string by underscore
        $parts = explode("_", $input['project_or_program_name']);

        $input['project_program_id'] = (int)$parts[1];
        $input['type'] = strtolower($parts[0]);
        $input['status'] = "YES";
        $input['created_at']    = Carbon::now();

        try {
            unset($input['project_or_program_name']);

            Donation::create($input);
            return back()->with('success', 'Donation information added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function projectFollowUpDetails($project_follow_up_id)
    {
        $project_follow_up = DB::table('project_followup')->where('id', $project_follow_up_id)->first();

        return view('frontend.project_follow_up.details', compact('project_follow_up'));
    }

    public function gallery()
    {
        $data['programs'] = Programs::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['projects'] = ProjectGallery::orderBy('id', 'DESC')->where('status', 'YES')->get();
        $data['events'] = Event::orderBy('id', 'DESC')->where('status', 'YES')->get();

        return view('frontend.gallery.index', $data);
    }

    public function blog()
    {
        $results = DB::table('blogs')->where('status', 'YES')->where('blog_type', 'PUBLIC')->orderBy('id', 'DESC')->paginate(10);

        return view('frontend.blog.index', compact('results'));
    }

    public function blogDetails($blog_id)
    {
        // $data['blog'] = DB::table('blogs')->where('id', $blog_id)->first();

        $data['blog_details'] = DB::table('blogs as a')
            ->select('a.*', 'b.title as category_name', 'c.name as writter', 'd.passport_photo')
            ->leftJoin('blog_categories as b', 'a.category_id', '=', 'b.id')
            ->leftJoin('users as c', 'a.created_by', '=', 'c.id')
            ->leftJoin('member_details as d', 'a.created_by', '=', 'd.user_id')
            ->where('a.id', $blog_id)
            ->where('blog_type', 'PUBLIC')
            ->first();

        $data['blog_categories'] = DB::table('blog_categories')->orderBy('id', 'DESC')->take(5)->get();
        $data['latest_blogs'] = DB::table('blogs')->orderBy('id', 'DESC')->take(3)->get();

        return view('frontend.blog.details', $data);
    }

    public function chairmanMessage()
    {
        $chairman_message = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('executive_status', 'Chairmen')
            ->first();

        return view('frontend.about.chairmanMessage', compact('chairman_message'));
    }

    public function executiveCommittee()
    {
        $committees = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('executive_status', 'Committee')
            ->get();
        // dd($committees);
        return view('frontend.about.executiveCommittee', compact('committees'));
    }

    public function ourMembers()
    {
        $members = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('executive_status', 'Members')
            ->get();

        return view('frontend.about.ourMembers', compact('members'));
    }

    public function memberDetails($member_id)
    {
        $member = DB::table('member_details as a')
            ->select('a.*', 'b.name as user_name', 'b.email as user_email', 'b.phone_number as user_phone_number',)
            ->leftJoin('users as b', 'a.user_id', '=', 'b.id')
            ->where('a.id', $member_id)
            ->first();
        //dd($member);
        return view('frontend.about.memberDetails', compact('member'));
    }


    public function privacyPolicy()
    {

        return view('frontend.about.privacyPolicy');
    }

    public function resolution()
    {

        return view('frontend.about.resolution');
    }

    public function faq()
    {

        return view('frontend.about.faq');
    }

    public function disclaimer()
    {

        return view('frontend.about.disclaimer');
    }

    public function whatMakesUsApart()
    {

        return view('frontend.about.whatMakesUsApart');
    }
    public function howWeSpendMony()
    {

        return view('frontend.about.howWeSpendMony');
    }

    public function program(Request $request)
    {

        $results = DB::table('programs');

        $results = $results->orderBy('id', 'ASC')->paginate(10);

        return view('frontend.program.index', compact('results'));
    }

    public function programDetails(Request $request)
    {
        $program_id = null;

        $program_query = $request->query('program');

        if (!empty($program_query)) {
            $program_id =  $program_query;
        }

        $data['program'] =  DB::table('programs')
            ->where('id', $program_id)
            ->first();

        $data['programs'] = DB::table('programs')->where('program_status', 'Upcoming')->orderBy('id', 'DESC')->get();
        //dd($project_query);
        return view('frontend.program.details', $data);
    }

    public function howWeHelp()
    {

        return view('frontend.about.howWeHelp');
    }


    public function inspireAndHelp()
    {

        return view('frontend.about.inspireAndHelp');
    }

    public function sendUsDonation()
    {

        return view('frontend.about.sendUsDonation');
    }

    public function becomeVolunteer()
    {

        return view('frontend.about.becomeVolunteer');
    }
}
