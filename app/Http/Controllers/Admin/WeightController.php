<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Weight;

class WeightController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ---------------------- */
    /*    Show all weights    */
    /* ---------------------- */
    public function index()
    {
        $weights = Weight::latest()->paginate(10);
        return view('admin.weight.index', compact('weights'));
    }
    /* end show all weights */

    /* ----------------------- */
    /*    Create new weight    */
    /* ----------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'weight_name' => 'required|unique:weights|min:3'
        ],
            [
                'weight_name.required' => 'An error occurred while creating a weight. Name is required',
                'weight_name.unique' => 'An error occurred while creating a weight. This name already exists',
                'weight_name.min' => 'An error occurred while creating a weight. Name is less than 3 characters'
            ]);
        /* create new weight */
        Weight::create([
            'title' => $request->weight_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to the list weights */
        $notification = array(
            'message' => 'Weight added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end create new weight */
}
