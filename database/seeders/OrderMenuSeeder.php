<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_Menu;
use Illuminate\Database\Seeder;

class OrderMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuIds = Menu::query()->pluck('id');
        if ($menuIds->isEmpty()) {
            return;
        }

        $maxItemsPerOrder = min(3, $menuIds->count());
        Order::query()->each(function (Order $order) use ($menuIds, $maxItemsPerOrder): void {
            $selectedMenuIds = $menuIds->shuffle()->take(fake()->numberBetween(1, $maxItemsPerOrder));

            foreach ($selectedMenuIds as $menuId) {
                Order_Menu::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'menu_id' => $menuId,
                    ],
                    [
                        'quantity' => fake()->numberBetween(1, 5),
                    ]
                );
            }
        });
    }
}
