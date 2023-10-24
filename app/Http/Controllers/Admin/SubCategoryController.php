<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ---------------------------- */
    /*    Show all subcategories    */
    /* ---------------------------- */
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::latest()->paginate(10);
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }
    /*  end show all subcategories  */

    /* ------------------------------------ */
    /*         Create new subcategory       */
    /* ------------------------------------ */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'title' => 'required|unique:sub_categories|min:3'
        ],
            [
                'title.required' => 'SubCategory name is required',
                'title.unique' => 'This SubCategory already exists',
                'title.min' => 'SubCategory name is less than 3 characters'
            ]);

        if($request->parent === NULL)
            $parent = 0;
        else
            $parent = $request->parent;
        /* create category */
        SubCategory::create([
            'title' => $request->title,
            'category_id' => $parent,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to page with list subcategories */
        $notification = array(
            'message' => 'SubCategory added successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ----- end create new subcategory ----- */

    /* -------------------------------- */
    /*        Delete subcategory        */
    /* -------------------------------- */
    public function delete($id)
    {
        SubCategory::find($id)->forceDelete();
        $notification = array(
            'message' => 'Subcategory deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ---- end delete subcategory ---- */
}
