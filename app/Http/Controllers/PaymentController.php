<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Order;

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
    public function create()
    {
        return view('payment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($order)
    {
        $payment = new Payment();
        $payment->order_id = $order;
        $order = Order::find($order);
        $payment->provider = 'Manual';
        $payment->save();

        return redirect()->intended('exams')->with('success', 'Payment successful');

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

    public function declined()
    {
        return redirect()->intended('exams')->with('error', 'Payment declined. Try again later.');
    }
}
