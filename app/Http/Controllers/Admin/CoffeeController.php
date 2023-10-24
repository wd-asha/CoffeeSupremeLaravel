<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\CoffeeFilter;
use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Grind;
use App\Models\Weight;
use Illuminate\Support\Facades\DB;
use Image;

class CoffeeController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ---------------------- */
    /*    Show all coffees    */
    /* ---------------------- */
    public function index()
    {
        $coffees = Coffee::latest()->orderBy('id', 'desc')->paginate(5);
        $trashed = Coffee::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        /* to the coffees list page */
        return view('admin.coffee.index', compact('coffees', 'categories', 'grinds', 'brands', 'weights', 'trashed'));
    }
    /*  end show all coffees  */

    /* -------------------------------------- */
    /* Show all equipments with filter Amount */
    /* -------------------------------------- */
    public function indexA(CoffeeFilter $request){
        $coffees = Coffee::filter($request)->paginate(10);
        $categories = Category::all();
        $trashed = Coffee::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        return view('admin.coffee.index', compact('coffees', 'categories', 'grinds', 'brands', 'weights', 'trashed'));
    }
    /* end show all equipments with filter amount */

    /* ----------------------- */
    /*    Create new coffee    */
    /* ----------------------- */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        /* show page with form */
        return view('admin.coffee.create', compact('categories', 'brands', 'grinds', 'weights'));
    }
    /*  end create new coffee  */

    /* ------------------- */
    /*   Save new coffee   */
    /* ------------------- */
    public function store(Request $request)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['coffee_title'] = $request->coffee_title;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['grind_id'] = $request->grind_id;
        $data['weight_id'] = $request->weight_id;
        $data['coffee_code'] = $request->coffee_code;
        $data['coffee_price'] = $request->coffee_price;
        $data['coffee_aroma'] = $request->coffee_aroma;
        $data['coffee_finish'] = $request->coffee_finish;
        $data['coffee_taste'] = $request->coffee_taste;
        $data['coffee_acidity'] = $request->coffee_acidity;
        $data['coffee_body'] = $request->coffee_body;
        $data['coffee_dise'] = $request->coffee_dize;
        $data['coffee_time'] = $request->coffee_time;
        $data['coffee_yield'] = $request->coffee_yield;
        $data['coffee_temp'] = $request->coffee_temp;
        $data['coffee_about'] = $request->coffee_about;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        if($request->coffee_status) {
            $data['coffee_status'] = 1;
        }else{
            $data['coffee_status'] = 0;
        };
        if($request->coffee_home) {
            $data['coffee_home'] = 1;
        }else{
            $data['coffee_home'] = 0;
        };
        /* preparing the image for saving */
        $image_one = $request->coffee_image;
        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600, 600)->save('media/product/' . $image_one_name);
            $data['coffee_image'] = 'media/product/' . $image_one_name;
        }
        /* save new coffee */
        Coffee::create($data);
        $notification = array(
            'message' => 'Coffee successfully created',
            'alert-type' => 'success'
        );
        /* to the coffees list page */
        return Redirect()->route('admin.coffees')->with($notification);
    }
    /*  end save new coffee  */

    /* ------------------- */
    /*   Activate coffee   */
    /* ------------------- */
    public function active($id)
    {
        Coffee::find($id)->update([
            'coffee_status' => 1
        ]);
        $notification = array(
            'message' => 'Coffee activated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end activate coffee */

    /* --------------------- */
    /*   Inactivate coffee   */
    /* --------------------- */
    public function inactive($id)
    {
        Coffee::find($id)->update([
            'coffee_status' => 0
        ]);
        $notification = array(
            'message' => 'Coffee deactivated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end inactivate coffee */

    /* --------------------- */
    /*      Edit coffee      */
    /* --------------------- */
    public function edit($id)
    {
        $coffee = Coffee::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        /* show the coffee edit page */
        return view('admin.coffee.edit', compact('coffee', 'categories', 'grinds', 'brands', 'weights'));
    }

    /* ---------------- */
    /*  Trashed Coffee  */
    /* ---------------- */
    public function delete($id)
    {
        Coffee::find($id)->delete();
        $notification = array(
            'message' => 'Coffee trashed',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end trashed Coffee */

    /* ------------------------ */
    /*      Destroy coffee      */
    /* ------------------------ */
    public function destroy($id)
    {
        $coffee = Coffee::onlyTrashed()->find($id);
        $image_one = $coffee->coffee_image;
        unlink($image_one);

        Coffee::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Coffee removed',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy coffee -- */

    /* ------------------------ */
    /*      Restore coffee      */
    /* ------------------------ */
    public function restore($id)
    {
        Coffee::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Coffee restore',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end restore coffee -- */

    /* ---------------------------- */
    /*      Show single coffee      */
    /* ---------------------------- */
    public function show($id)
    {
        $coffee = Coffee::find($id);
        $categories = Category::all();
        $grinds = Grind::all();
        $brands = Brand::all();
        $weights = Weight::all();

        return view('admin.coffee.show', compact('coffee', 'categories', 'grinds', 'brands', 'weights'));
    }
    /* -- end show single coffee -- */

    /* ----------------------------- */
    /*      Update coffee image      */
    /* ----------------------------- */
    public function updatePhoto(Request $request, $id)
    {
        $old_image_one = $request->old_image_one;
        $image_one = $request->file('image_one');
        $data = array();
        if($image_one) {
            /* delete the previous image if there was one */
            if($old_image_one !== 'media/product/empty-image.png') {
                unlink($old_image_one);
            };
            /* prepare and save a new image */
            $image_one = $request->file('image_one');
            $location = 'media/product/';
            $name_image_one = hexdec(uniqid());
            $ext_image = strtolower($image_one->getClientOriginalExtension());
            $full_image = $location.$name_image_one.'.'.$ext_image;
            $image_one->move($location, $full_image);
            $data['coffee_image'] = $full_image;
            /* updating coffee */
            Coffee::find($id)->update($data);
            $notification = array(
                'message' => 'Image updated',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Image not updated',
                'alert-type' => 'error'
            );
        }
        /* to the coffees list page */
        return Redirect()->route('admin.coffees')->with($notification);
    }
    /* ---- end update coffee image ---- */

    /* ------------------------ */
    /*       Update coffee      */
    /* ------------------------ */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['coffee_title'] = $request->coffee_title;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['grind_id'] = $request->grind_id;
        $data['coffee_code'] = $request->coffee_code;
        $data['coffee_price'] = $request->coffee_price;
        $data['coffee_aroma'] = $request->coffee_aroma;
        $data['coffee_finish'] = $request->coffee_finish;
        $data['coffee_taste'] = $request->coffee_taste;
        $data['coffee_about'] = $request->coffee_about;
        if($request->coffee_status) {
            $data['coffee_status'] = 1;
        }else{
            $data['coffee_status'] = 0;
        };
        if($request->coffee_home) {
            $data['coffee_home'] = 1;
        }else{
            $data['coffee_home'] = 0;
        };
        /* update coffee */
        $update = Coffee::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Coffee updated successfully',
                'alert-type' => 'success'
            );
            /* to the coffees list page */
            return Redirect()->route('admin.coffees')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'success'
            );
            /* to the coffees list page */
            return Redirect()->route('admin.coffees')->with($notification);
        }
    }
    /* ---- end update coffee ---- */

    /* ------------------------------------------ */
    /*   Change in quantity of coffee available   */
    /* ------------------------------------------ */
    public function amount(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['amount'] = (int)$request->amount;
        /* update quantity coffee */
        $update = Coffee::find($id)->update($data);
        if($update && $data['amount'] != NULL) {
            $notification = array(
                'message' => 'Coffee updated successfully',
                'alert-type' => 'success'
            );
            /* to the coffees list page */
            return Redirect()->route('admin.coffees')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'success'
            );
            /* to the coffees list page */
            return Redirect()->route('admin.coffees')->with($notification);
        }
    }
    /* end change in quantity of coffee available */
}
