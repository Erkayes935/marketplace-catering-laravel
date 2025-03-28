<?php

namespace App\Http\Controllers;

use App\Models\Order_Menu;
use Illuminate\Http\Request;

class OrderMenuController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //
        $request->validate([
            'order_id' => 'required',
            'menu_id' => 'required',
            'quantity' => 'required',
        ]);

        $order_menu = Order_Menu::create([
            'order_id' => $request->order_id,
            'menu_id' => $request->menu_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order_Menu $order_Menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_Menu $order_Menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order_Menu $order_Menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_Menu $order_Menu)
    {
        //
    }
}
