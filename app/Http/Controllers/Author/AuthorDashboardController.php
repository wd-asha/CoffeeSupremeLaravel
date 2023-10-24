<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Wishlist;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AuthorDashboardController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------------------- */
    /* User's personal account after authorization (not admin) */
    /* ------------------------------------------------------- */
    /* duplicate HomeController */
    public function index()
    {
        $products = Coffee::all();
        $coffees = Coffee::all();
        $wishlists = Wishlist::all();
        $orders = Order::all();
        $subcategories = SubCategory::all();
        $userId = Auth::user()->id;
        $subscribers = Subscriber::where(['user_id'=> $userId])->get();
        if($subscribers->isEmpty()) {
            $flag = false;
        }else{
            $flag = true;
        }
        /* to User's personal account */
        return view('front.shop.wishlist', compact('subscribers', 'flag', 'subcategories', 'products', 'wishlists', 'coffees', 'orders'));
    }
}
