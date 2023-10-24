<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Grind;
use App\Models\Weight;
use App\Models\Coffee;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* ------------------------------------------------------- */
    /* User's personal account after authorization (not admin) */
    /* ------------------------------------------------------- */
    /* duplicate AuthorDashboardController */
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $grinds = Grind::all();
        $weights = Weight::all();
        $coffees = Coffee::all();
        $products = Coffee::all();
        $things = Equipment::all();
        $orders = Order::all();
        $wishlists = Wishlist::all();
        $userId = Auth::user()->id;
        $subscribers = Subscriber::where(['user_id'=> $userId])->get();
        if($subscribers->isEmpty()) {
            $flag = false;
        }else{
            $flag = true;
        }
        /* to User's personal account */
        return view('front.shop.wishlist', compact('subcategories', 'categories', 'brands', 'grinds', 'weights', 'coffees', 'wishlists', 'orders', 'flag', 'products', 'things', 'subscribers'));
    }

    /* or change
    public const HOME = 'wishlist
    in RouteServiceProvider */
}
