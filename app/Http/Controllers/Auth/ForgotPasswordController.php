<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Coffee;
use App\Models\Equipment;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function create()
    {
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        return view ('front.forgot-password', compact('coffees', 'equipments', 'subcategories'));
    }


    public function store(Request $request)
    {
        $request->session()->put('status', 'true');
    }
}
