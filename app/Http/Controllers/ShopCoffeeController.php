<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Grind;
use App\Models\Weight;
use App\Models\Coffee;
use App\Models\Equipment;
use App\Models\Wishlist;
use Cart;

class ShopCoffeeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        return view('front.shop.coffees', compact('categories', 'subcategories', 'brands', 'grinds', 'weights', 'coffees' ,'equipments'));
    }

    public function coffeeSingle($id)
    {
        $wishlist = Wishlist::all();
        $cartPanels = Cart::content();
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        $coffees = Coffee::all();
        $coffeeSingle = Coffee::find($id);
        return view('front.shop.coffee-single', compact('subcategories', 'wishlist', 'coffeeSingle', 'categories', 'brands', 'grinds', 'weights', 'cartPanels', 'coffees'));
    }
}
