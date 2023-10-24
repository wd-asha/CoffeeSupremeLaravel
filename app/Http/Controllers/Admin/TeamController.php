<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Coffee;
use App\Models\Country;
use App\Models\Town;
use Image;

class TeamController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------- */
    /*    Show all teem    */
    /* ------------------- */
    public function index()
    {
        $coffees = Coffee::all();
        $teams = Team::latest()->orderBy('id', 'asc')->paginate(5);
        $trashTeams = Team::onlyTrashed()->orderBy('id', 'asc')->paginate(5);
        return  view('admin.team.index', compact('coffees', 'teams', 'trashTeams'));
    }
    /* end show all team */

    /* ---------------------- */
    /*    Create new member   */
    /* ---------------------- */
    public function create()
    {
        $countries = Country::all();
        $towns = Town::all();
        /* show new member form */
        return view('admin.team.create', compact('countries', 'towns'));
    }
    /* end show new member form */

    /* --------------------- */
    /*    Save new member    */
    /* --------------------- */
    public function store(Request $request)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['team_title'] = $request->team_title;
        $data['country_id'] = $request->country_id;
        $data['town_id'] = $request->town_id;
        $data['team_dept'] = $request->team_dept;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        /* preparing the image for saving */
        $image_one = $request->team_image;
        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600, 400)->save('media/team/' . $image_one_name);
            $data['team_image'] = 'media/team/' . $image_one_name;
        }
        /* create new member */
        Team::create($data);
        $notification = array(
            'message' => 'Member successfully created',
            'alert-type' => 'success'
        );
        /* to the list members page */
        return Redirect()->route('admin.teams')->with($notification);
    }
    /* end save new member */

    /* -------------------- */
    /*    Trashed member    */
    /* -------------------- */
    public function delete($id)
    {
        Team::find($id)->delete();
        $notification = array(
            'message' => 'Member trashed',
            'alert-type' => 'success'
        );
        /* to the list members page */
        return Redirect()->back()->with($notification);
    }
    /* end trashed member */

    /* -------------------- */
    /*    Restore member    */
    /* -------------------- */
    public function restore($id)
    {
        Team::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Team restore',
            'alert-type' => 'success'
        );
        /* to the list members page */
        return Redirect()->back()->with($notification);
    }
    /* end restore member */
}
