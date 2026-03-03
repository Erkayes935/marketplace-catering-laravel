<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Order_Menu;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::query()->each(function (Order $order): void {
            $totalAmount = Order_Menu::query()
                ->with('menu')
                ->where('order_id', $order->id)
                ->get()
                ->sum(function (Order_Menu $orderMenu): float {
                    return (float) $orderMenu->menu->price * $orderMenu->quantity;
                });

            Invoice::updateOrCreate(
                ['order_id' => $order->id],
                ['total_amount' => $totalAmount > 0 ? $totalAmount : fake()->randomFloat(2, 15000, 250000)]
            );
        });
    }
}
