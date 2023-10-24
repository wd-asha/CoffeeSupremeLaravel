<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* -------------------- */
    /*    Show all brands   */
    /* -------------------- */
    public function index()
    {
        $brands = Brand::latest()->paginate(3);
        return view('admin.brand.index', compact('brands'));
    }
    /* end show all brands */

    /* -------------------- */
    /*    Save new brand    */
    /* -------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'title' => 'required|unique:brands|min:2'
        ],
        [
            'title.required' => 'Please input brand name',
            'title.min' => 'Brand name less then 2 chars'
        ]);

        /*$brand_image = $request->file('brand_logo');
        $location = 'images/brands/';
        $name_image = hexdec(uniqid());
        $ext_image = strtolower($brand_image->getClientOriginalExtension());
        $full_image = $location.$name_image.'.'.$ext_image;
        $brand_image->move($location, $full_image);*/

        /* create brand */
        Brand::create([
            'title' => $request->title,
            /*'brand_logo' => $full_image,*/
            'created_at' => Carbon::now()
        ]);
        /* to page with list brands */
        $notification = array(
            'message' => 'Brand added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end save new brand */

    /* ------------------ */
    /*    Delete brand    */
    /* ------------------ */
    public function delete($id)
    {
        /*unlink(Brand::find($id)->brand_logo);*/
        Brand::find($id)->delete();
        /* to page with list brands */
        $notification = array(
            'message' => 'Brand removed',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end delete brand */
}
