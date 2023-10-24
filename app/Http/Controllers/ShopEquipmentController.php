<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Firma;
use App\Models\Coffee;
use App\Models\Equipment;
use App\Models\Wishlist;
use Cart;

class ShopEquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        $coffees = Coffee::all();
        return view('front.shop.equipments', compact('categories', 'firmas', 'subcategories', 'equipments', 'coffees'));
    }

    public function pantry()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        return view('front.shop.pantries', compact('categories', 'firmas', 'subcategories', 'coffees', 'equipments'));
    }

    public function merchandise()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        return view('front.shop.merchandise', compact('categories', 'firmas', 'subcategories', 'coffees', 'equipments'));
    }

    public function equipmentSingle($id)
    {
        $wishlist = Wishlist::all();
        $cartPanels = Cart::content();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $firmas = Firma::all();
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $equipmentSingle = Equipment::find($id);
        return view('front.shop.equipment-single', compact('wishlist', 'equipmentSingle', 'categories', 'firmas', 'subcategories', 'equipments', 'cartPanels', 'coffees'));
    }

}
