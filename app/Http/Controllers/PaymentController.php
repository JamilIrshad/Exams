<?php

namespace App\Http\Controllers;

use App\Mail\purchase;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $order)
    {
        // dd($request);
        // return $request->user()->checkout('price_1Q29hY2LGCeUFNaGbn34seNt',[
        //     'success_url' => route('exams.list'),
        //     'cancel_url' => route('exams.list'),
        // ]);

        //get order
        $order = Order::find($order);
        $exam = $order->orderItems->first()->exam;
        // dd($exam);
        $cents = $exam->price * 100;

        return $request->user()->checkoutCharge($cents, $exam->name, 1, [
            'metadata' => ['order_id' => $order->id],
            'success_url' => route('payment.store').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.declined').'?checkout=cancelled',
        ]);
    }

    public function declined()
    {
        return redirect()->route('exams')->with('error', 'Payment declined. Try again later.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sessionId = $request->get('session_id');
        if ($sessionId === null) {
            return redirect()->intended('exams')->with('error', 'Payment declined. Try again later.');
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId, []);
        if ($session->payment_status !== 'paid') {
            return redirect()->intended('exams')->with('error', 'Payment declined. Try again later.');

        }
        $orderId = $session['metadata']['order_id'] ?? null;

        //send email to user
        $order = Order::find($orderId);
        Mail::to($request->user()->email)->send(new purchase($orderId, $order->orderItems->first()->exam));
        // dd($request);

        $payment = new Payment;
        $payment->order_id = $orderId;
        $payment->provider = 'Stripe';
        $payment->save();

        // dd($email, $exam, $order);

        return redirect()->route('exams.list')->with('success', 'Payment successful');

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
