<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('order.customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::query()
            ->with('customer')
            ->doesntHave('invoice')
            ->orderByDesc('id')
            ->get();
        return view('invoices.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id|unique:invoices,order_id',
        ]);

        $order = Order::query()->with('menus')->findOrFail($request->order_id);
        $totalAmount = $order->menus->sum(function ($menu): float {
            return (float) $menu->price * (int) ($menu->pivot->quantity ?? 1);
        });

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('invoices.show', $invoice->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('order.customer', 'order.menus');
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
