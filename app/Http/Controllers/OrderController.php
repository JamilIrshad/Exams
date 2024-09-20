<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;

class OrderController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($exam)
    {
        $exam=Exam::find($exam);
        // dd($exam);
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total= $exam->price;
        
        $order->save();
        
        $orderitem = new OrderItem();
        $orderitem->order_id = $order->id;
        $orderitem->exam_id = $exam->id;
        
        // dd($orderitem);
        $orderitem->save();
        //redirect to payment view and pass order
        return view('payments.create', ['order' => $order, 'exam' => $exam]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
