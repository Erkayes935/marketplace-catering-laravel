<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Menu>
 */
class OrderMenuFactory extends Factory
{
    protected $model = Order_Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::query()->inRandomOrder()->value('id') ?? Order::factory(),
            'menu_id' => Menu::query()->inRandomOrder()->value('id') ?? Menu::factory(),
            'quantity' => fake()->numberBetween(1, 5),
        ];
    }
}
