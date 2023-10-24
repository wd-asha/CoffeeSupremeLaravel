<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Coffee;
use App\Models\SubCategory;
use App\Models\Equipment;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1) {
            $this->redirectTo = route('admin.index');
        }else{
            $this->redirectTo = route('author.index');
        }

        $this->middleware('guest')->except('logout');

    }

    public function showLoginForm()
    {
        $coffees = Coffee::all();
        $subcategories = SubCategory::all();
        $equipments = Equipment::all();
        return view ('front.login', compact('coffees', 'equipments', 'subcategories'));
    }
}
