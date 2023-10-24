<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Grind;

class GrindController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* -------------------- */
    /*    Show all grinds   */
    /* -------------------- */
    public function index()
    {
        $grinds = Grind::latest()->paginate(10);
        return view('admin.grind.index', compact('grinds'));
    }
    /* end show all grinds */

    /* --------------------- */
    /*    Create new grind   */
    /* --------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'grind_name' => 'required|unique:categories|min:3'
        ],
            [
                'grind_name.required' => 'An error occurred while creating a grind. Name is required',
                'grind_name.unique' => 'An error occurred while creating a grind. This name already exists',
                'grind_name.min' => 'An error occurred while creating a grind. Name is less than 3 characters'
            ]);
        /* create new grind */
        Grind::create([
            'title' => $request->grind_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to page with list grinds */
        $notification = array(
            'message' => 'Grind added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end create new grind */
}
