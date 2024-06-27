<?php

namespace App\Http\Controllers;

use App\Mail\TransactionCompleted;
use App\Models\Course;
use App\Models\StudentEnrolledCourse;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $merchant_id = '1224284';
        $order_id = uniqid('ITEM');
        $amount = 2000;
        $currency = 'LKR';
        $merchant_secret = 'MTQ2NjY1NjE4OTE2ODU1OTg4MDA3NTQ4Mzc0Mzk1Njc2NDE1MA==';


        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $arr = [
            "merchant_id" => $merchant_id,
            "order_id" => $order_id,
            "amount" => $amount,
            "currency" => $currency,
            "hash" => $hash,
        ];
        return view('Pages.Public.cart', compact('cart', 'arr'));
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

    public function checkout(Request $request){
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        };
        $amount = array_sum(array_column($cart, 'price'));
        $order_id = uniqid('CRS');
        $currency = "LKR";
        $merchant_id = '1224284';
        $merchant_secret = 'MTQ2NjY1NjE4OTE2ODU1OTg4MDA3NTQ4Mzc0Mzk1Njc2NDE1MA==';
        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );
        return response()->json([
            "hash" => $hash,
            "order_id" => $order_id,
            "amount" => $amount,
            "currency" => $currency,
            "merchant_id" => $merchant_id,
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "thamo@gmail.com",
            "phone" => "0771234567",
            "address" => "No. 1, Galle Road",
            "city" => "Colombo",
            "country" => "Sri Lanka",
            "items" => array_column($cart, 'title'),
            "itemData" => $cart
        ], 200);
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        $order_id = $request->order_id;

        DB::beginTransaction();

        try {

            foreach ($cart as $course) {
                // Get course details
                $getCourseDetails = Course::where('course_no', $course['course_no'])->first();
                $getCourseDetails->increment('student_count');

                $transaction = Transaction::create(
                    [
                        'transaction_no' => (string)Str::uuid(),
                        'order_id' => $order_id,
                        'course_id' => $getCourseDetails->course_id,
                        'payment_method_id' => 1,
                        'total_paid' => $getCourseDetails->total_price,
                        'user_id' => auth()->user()->user_id,
                        'payment_status_id' => 1,
                    ]
                );

                StudentEnrolledCourse::create(
                    [
                        'course_id' => $getCourseDetails->course_id,
                        'user_id' => auth()->id(),
                        'enrollment_date' => now(),
                        'transaction_id' => $transaction->transaction_id,
                        'completed' => 0,
                        'status' => 'Active',
                    ]
                );

                // Send email notification
                Mail::to(auth()->user()->email)->send(new TransactionCompleted($transaction, auth()->user()));

            }

            DB::commit();

//            Clear the cart
            session()->forget('cart');

            return response()->json([
                "message" => "success",
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to store transaction and enrollment.', 'details' => $e->getMessage()], 500);
        }
    }
}
