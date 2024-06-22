<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('Pages.Public.cart', compact('cart'));
    }

    public function add($id)
    {
        $cart = session()->get('cart', []);
        $course = Course::where("course_no", $id)->first();
        $cart[$id] = [
            'title' => $course->title,
            'price' => $course->total_price,
            'quantity' => 1,
            'course_no' => $course->course_no,
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return response()->json(['error' => 'Your cart is empty.'], 400);
        }

        $amount = array_sum(array_column($cart, 'price'));
        $formattedTotalAmount = number_format($amount, 2, '.', '');
        $order_id = hexdec(hash('crc32b', Str::uuid()));

        $merchant_id = "1224284";
        $currency = "LKR";
        $merchant_secret = "NDYyMzQ4NTQzMzM1OTI1MjEzNTI4OTUwNzY2NDMyNjk2NDU2OTM2";

        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $data = [
            'first_name' => "Thamoddya",
            'last_name' => "Rashmitha",
            'email' => "thamo@gmail.com",
            'phone' => "0769458554",
            'address' => 'Main Rd , Anuradhapura , Eriyagama',
            'city' => 'Anuradhapura',
            'country' => 'Sri lanka',
            'order_id' => $order_id,
            'items' => "ITEMS FOR PURCHASE",
            'currency' => 'LKR',
            'amount' => $amount,
            'return_url'=>"www.thamoddya.cloud",
            'notify_url'=>'www.notify_url.com',
            'cancel_url'=>'www.cancel_url.com',
        ];

        return response()->json([
            'merchant_id'=>$merchant_id,
            'first_name' => "Thamoddya",
            'last_name' => "Rashmitha",
            'email' => "thamo@gmail.com",
            'phone' => "0769458554",
            'address'=>"Main Rd , Anuradhapura , Eriyagama",
            'city'=>"Anuradhapura",
            'country'=>"Sri lanka",
            'items' => "ITEMS FOR PURCHASE",
            'currency'=>$currency,
            'amount'=>$amount,
            'hash'=>$hash,
            'order_id' => $order_id,
        ]);
    }
//public function checkout()
//    {
//        $cart = session()->get('cart', []);
//        if (empty($cart)) {
//            return redirect()->back()->with('error', 'Your cart is empty.');
//        };
//
//        $totalAmount = array_sum(array_column($cart, 'price'));
//        $formattedTotalAmount = 'Rs.' . number_format($totalAmount, 2, '.', '');
//        $uniqueOrderId = 'ORD' . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
//
//        $merchant_id = "1224284";
//        $currency = "LKR";
//        $merchant_secret = "NDEyNzg1MjgzNzMxODk3NTk0ODcxMTA2ODEyNzY4MjkyODk1OTEzNA==";
//
//        $hash = strtoupper(md5($merchant_id . $uniqueOrderId . number_format($totalAmount, 2, '.', '') . $currency . strtoupper(md5($merchant_secret))));
//
//        return response([
//            'cart' => $cart,
//            'totalAmount' => $formattedTotalAmount,
//            'orderID' => $uniqueOrderId,
//            'hash' => $hash,
//            'merchantID' => $merchant_id,
//            'currency' => $currency,
//        ]);
//
//    }
}
