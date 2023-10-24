<?php

namespace App\Http\Controllers;

use App\Mail\Alerts;
use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Equipment;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\SubCategory;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /* ---------------------------------------- */
    /*       Show shopping cart contents        */
    /* ---------------------------------------- */
    public function index()
    {
        $cartItems = Cart::content();
        $coffees = Coffee::all();
        $equipments = Equipment::all();
        $subcategories = SubCategory::all();
        /* to the checkout page (with shopping cart) */
        return view('front.shop.cart', compact('cartItems', 'coffees', 'subcategories', 'equipments'));
    }
    /* ---- end Show shopping cart contents --- */

    /* ---------------------------------------- */
    /*        Add coffee to shopping cart       */
    /* ---------------------------------------- */
    public function addCart(Request $request, $id)
    {
        $coffee = Coffee::find($id);
        $price = $coffee->coffee_price;

        if($request->weightH === '150') {
            $price = $coffee->coffee_price * 0.61;
        }
        if($request->weightH === '500') {
            $price = $coffee->coffee_price * 2;
        }
        if($request->weightH === '1000') {
            $price = $coffee->coffee_price * 4;
        }

        Cart::add(
            [
                'id' => $coffee->id,
                'name' => $coffee->coffee_title,
                'qty' => $request->qtyH,
                'price' => $price,
                'weight' => $request->weightH,
                'options' => [
                    'image' => $coffee->coffee_image,
                    'grind' => $request->grindH,
                    'brand' => $coffee->brand->title,
                    'code' => $coffee->coffee_code,
                ]
            ]
        );

        $notification = array(
            'message' => 'Coffee added to cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -------- end Add coffee to shopping cart -------- */

    /* ------------------------------------------------- */
    /*           Add equipment to shopping cart          */
    /* ------------------------------------------------- */
    public function addCartEquipment(Request $request, $id)
    {
        $equipment = Equipment::find($id);
        $price = $equipment->equipment_price;

        Cart::add(
            [
                'id' => $equipment->id,
                'name' => $equipment->equipment_title,
                'qty' => $request->qtyH,
                'price' => $price,
                'weight' => 0,
                'options' => [
                    'image' => $equipment->equipment_image,
                    'firma' => $equipment->firma->title,
                    'code' => $equipment->equipment_code,
                ]
            ]
        );

        $notification = array(
            'message' => 'Equipment added to cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ----- end Add equipment to shopping cart ---- */

    /* --------------------------------------------- */
    /*       Remove an item from shopping cart       */
    /* --------------------------------------------- */
    public function delete($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Coffee removed from the cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* --- end Remove an item from shopping cart --- */

    /* --------------------------------------------- */
    /*          Recalculation of the cost            */
    /* --------------------------------------------- */
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        $notification = array(
            'message' => 'Product updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* ------- end Recalculation of the cost ------- */

    /* --------------------------------- */
    /*          Order formation          */
    /* --------------------------------- */
    public function check(Request $request)
    {
        $content = Cart::content();
        /* Prepare data for the order */
        $data = array();
        $data['user_id'] = Auth::id();
        $data['user_name'] = $request->user_name;
        $data['order_email'] = $request->email;
        $data['order_delivery'] = $request->delivery;
        $data['order_address'] = $request->apartment;
        $data['order_phone'] = $request->phone;
        $data['order_total'] = strval(Cart::priceTotal());
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $order_id = Order::insertGetId($data);
        /* Prepare data for a shopping list */
        $details = array();
        foreach($content as $row) {
            /* if purchased equipment */
            if($row->weight === 0) {
                $details['order_id'] = $order_id;
                $details['equipment_id'] = $row->id;
                $details['equipment_name'] = $row->name;
                $details['equipment_price'] = $row->price;
                $details['equipment_qty'] = $row->qty;
                $details['equipment_image'] = $row->options->image;
                $details['equipment_weight'] = $row->weight;
                $details['equipment_code'] = $row->options->code;
                $details['equipment_firma'] = $row->options->firma;
                $details['created_at'] = Now();
                $details['updated_at'] = Now();
                OrderItem::insert($details);
                $equipment = Equipment::find($row->id);
                $equipment->amount = $equipment->amount - (1 * $row->qty);
                $equipment->update();
            }
            /* if purchased coffee */
            if($row->weight !== 0) {
                $details['order_id'] = $order_id;
                $details['coffee_id'] = $row->id;
                $details['coffee_name'] = $row->name;
                $details['coffee_price'] = $row->price;
                $details['coffee_qty'] = $row->qty;
                $details['coffee_image'] = $row->options->image;
                $details['coffee_weight'] = $row->weight;
                $details['coffee_code'] = $row->options->code;
                $details['coffee_grind'] = $row->options->grind;
                $details['created_at'] = Now();
                $details['updated_at'] = Now();
                OrderItem::insert($details);
                $coffee = Coffee::find($row->id);
                $coffee->amount = $coffee->amount - (1 * $row->qty);
                $coffee->update();
            }
        };
        /* Notify the buyer about the purchase by email */
        /* preparing data for the letter */
        $name = $data['user_name'];
        $email = $data['order_email'];
        $body = Cart::content();
        $subject = $request->subject;
        $total = Cart::priceTotal();
        $orderid = $order_id;
        /* send a letter */
        Mail::to($email)->send(new Alerts($name, $body, $total, $orderid));
        /* Deleting the contents of the shopping cart */
        Cart::destroy();
        /* return to the user’s personal account */
        $notification = array(
            'message' => 'Order done',
            'alert-type' => 'success'
        );
        return Redirect()->to('/wishlist')->with($notification);
    }
    /* --------------- end Order formation ------------------ */
}
