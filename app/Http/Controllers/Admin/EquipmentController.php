<?php

namespace App\Http\Controllers\Admin;

use App\Filters\EquipmentFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Firma;
use Image;

class EquipmentController extends Controller
{
    public function __construct()
    {
        /* actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------------------ */
    /* Show all equipments no filters */
    /* ------------------------------ */
    public function index()
    {
        $equipments = Equipment::latest()->orderBy('id', 'desc')->paginate(5);
        $trashed = Equipment::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        return view('admin.equipment.index', compact('equipments', 'categories', 'subcategories', 'firmas', 'trashed'));
    }
    /* end show all equipments no filters */

    /* ------------------------------------------- */
    /* Show all equipments with filter SubCategory */
    /* ------------------------------------------- */
    public function indexS(EquipmentFilter $request){
        $equipments = Equipment::filter($request)->orderBy('id', 'desc')->paginate(5);
        $subcategories = SubCategory::all();
        $categories = Category::all();
        $trashed = Equipment::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $firmas = Firma::all();
        return view('admin.equipment.index', compact('equipments', 'categories', 'subcategories', 'firmas', 'trashed'));
    }
    /* end show all equipments with filter subcategory */

    /* ------------------------------------- */
    /* Show all equipments with filter Firma */
    /* ------------------------------------- */
    public function indexF(EquipmentFilter $request){
        $equipments = Equipment::filter($request)->orderBy('id', 'desc')->paginate(5);
        $subcategories = SubCategory::all();
        $categories = Category::all();
        $trashed = Equipment::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $firmas = Firma::all();
        return view('admin.equipment.index', compact('equipments', 'categories', 'subcategories', 'firmas', 'trashed'));
    }
    /* end show all equipments with filter firma */

    /* ------------------------------------- */
    /* Show all equipments with filter Amount */
    /* ------------------------------------- */
    public function indexA(EquipmentFilter $request){
        $equipments = Equipment::filter($request)->orderBy('id', 'desc')->paginate(5);
        $subcategories = SubCategory::all();
        $categories = Category::all();
        $trashed = Equipment::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $firmas = Firma::all();
        return view('admin.equipment.index', compact('equipments', 'categories', 'subcategories', 'firmas', 'trashed'));
    }
    /* end show all equipments with filter amount */

    /* -------------------------- */
    /*    Create new equipment    */
    /* -------------------------- */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        /* show page with form */
        return view('admin.equipment.create', compact('categories', 'firmas', 'subcategories'));
    }
    /*  end create new equipment  */

    /* ---------------------- */
    /*   Save new equipment   */
    /* ---------------------- */
    public function store(Request $request)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['equipment_title'] = $request->equipment_title;
        $data['firma_id'] = $request->firma_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['equipment_code'] = $request->equipment_code;
        $data['equipment_price'] = $request->equipment_price;
        $data['equipment_desc'] = $request->equipment_desc;
        $data['equipment_about'] = $request->equipment_about;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        if($request->equipment_status) {
            $data['equipment_status'] = 1;
        }else{
            $data['equipment_status'] = 0;
        };
        if($request->equipment_home) {
            $data['equipment_home'] = 1;
        }else{
            $data['equipment_home'] = 0;
        };
        /* preparing the image for saving */
        $image_one = $request->equipment_image;
        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600, 600)->save('media/product/' . $image_one_name);
            $data['equipment_image'] = 'media/product/' . $image_one_name;
        }
        /* save new equipment */
        Equipment::create($data);
        /* to the equipments list page */
        $notification = array(
            'message' => 'Equipment successfully created',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.equipments')->with($notification);
    }
    /*  end save new equipment  */

    /* ---------------------- */
    /*   Activate equipment   */
    /* ---------------------- */
    public function active($id)
    {
        Equipment::find($id)->update([
            'equipment_status' => 1
        ]);
        /* to the equipments list page */
        $notification = array(
            'message' => 'Equipment activated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end activate equipment */

    /* ------------------------ */
    /*   Inactivate equipment   */
    /* ------------------------ */
    public function inactive($id)
    {
        Equipment::find($id)->update([
            'equipment_status' => 0
        ]);
        /* to the equipments list page */
        $notification = array(
            'message' => 'Equipment deactivated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end inactivate equipment */

    /* ----------------------- */
    /*    Trashed equipment    */
    /* ----------------------- */
    public function delete($id)
    {
        Equipment::find($id)->delete();
        /* to the equipments list page */
        $notification = array(
            'message' => 'Equipment trashed',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end trashed equipment */

    /* ----------------------- */
    /*    Restore equipment    */
    /* ----------------------- */
    public function restore($id)
    {
        Equipment::withTrashed()->find($id)->restore();
        /* to the equipments list page */
        $notification = array(
            'message' => 'Equipment restore',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end restore equipment */

    /* ---------------------- */
    /*     Show equipment     */
    /* ---------------------- */
    public function show($id)
    {
        $equipment = Equipment::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        /* to the equipments show page */
        return view('admin.equipment.show', compact('equipment', 'categories', 'subcategories', 'firmas'));
    }
    /* end show equipment */

    /* ------------------ */
    /*   Edit equipment   */
    /* ------------------ */
    public function edit($id)
    {
        $equipment= Equipment::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        /* to the equipments edit page */
        return view('admin.equipment.edit', compact('equipment', 'categories', 'subcategories', 'firmas'));
    }
    /* end edit equipment */

    /* ---------------------- */
    /*    Update equipment    */
    /* ---------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['equipment_title'] = $request->equipment_title;
        $data['firma_id'] = $request->firma_id;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['equipment_code'] = $request->equipment_code;
        $data['equipment_price'] = $request->equipment_price;
        $data['equipment_desc'] = $request->equipment_desc;
        $data['equipment_about'] = $request->equipment_about;
        if($request->equipment_status) {
            $data['equipment_status'] = 1;
        }else{
            $data['equipment_status'] = 0;
        };
        if($request->equipment_home) {
            $data['equipment_home'] = 1;
        }else{
            $data['equipment_home'] = 0;
        };
        /* update equipment */
        $update = Equipment::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Equipment updated successfully',
                'alert-type' => 'success'
            );
            /* to the equipments list page */
            return Redirect()->route('admin.equipments')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'success'
            );
            /* to the equipments list page */
            return Redirect()->route('admin.equipments')->with($notification);
        }
    }
    /* end update equipment */

    /* -------------------------- */
    /*   Update photo equipment   */
    /* -------------------------- */
    public function updatePhoto(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $old_image_one = $request->old_image_one;
        $image_one = $request->file('image_one');
        $data = array();
        if($image_one) {
            if($old_image_one !== 'media/product/empty-image.png') {
                unlink($old_image_one);
            };
            $image_one = $request->file('image_one');
            $location = 'media/product/';
            $name_image_one = hexdec(uniqid());
            $ext_image = strtolower($image_one->getClientOriginalExtension());
            $full_image = $location.$name_image_one.'.'.$ext_image;
            $image_one->move($location, $full_image);
            $data['equipment_image'] = $full_image;
            /* update equipment */
            Equipment::find($id)->update($data);
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
        /* to the equipments list page */
        return Redirect()->route('admin.equipments')->with($notification);
    }
    /* end update photo equipment */

    /* --------------------------- */
    /*   Change amount equipment   */
    /* --------------------------- */
    public function amount(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['amount'] = (int)$request->amount;
        /* update equipment */
        $update = Equipment::find($id)->update($data);
        if($update && $data['amount'] != NULL) {
            $notification = array(
                'message' => 'Equipment updated successfully',
                'alert-type' => 'success'
            );
            /* to the equipments list page */
            return Redirect()->route('admin.equipments')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'success'
            );
            /* to the equipments list page */
            return Redirect()->route('admin.equipments')->with($notification);
        }
    }
    /* end change amount equipment */
}
