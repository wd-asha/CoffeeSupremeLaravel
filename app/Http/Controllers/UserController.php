<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function personal(Request $request)
    {
        $data = array();
        $data['name'] = $request->first_user;
        $data['email'] = $request->email_user;
        $data['birthday_user'] = $request->birt_user;

        $update = User::find(Auth::user()->id)->update($data);

            $notification = array(
                'message' => 'Personal information updated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

    }


    public function shipping(Request $request)
    {
        $data = $request->validate([
            'shipping_user' => 'required',
            'apartment_user' => 'required',
            'phone_user' => 'required',
        ],
            [
                'shipping_user.required' => 'Address is required',
                'apartment_user.required' => 'Apartment is required',
                'phone_user.required' => 'Phone is required',
            ]);

        $data = array();
        $data['shipping_user'] = $request->shipping_user;
        $data['apartment_user'] = $request->apartment_user;
        $data['phone_user'] = $request->phone_user;

        $update = User::find(Auth::user()->id)->update($data);

        $notification = array(
            'message' => 'Shipping information updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
}
