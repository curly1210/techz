<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Shipment;
use App\Models\StatusOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_time' => now(),
            // 'total_price' => 1,
            'user_id' =>  User::inRandomOrder()->first()->id,
            'shipment_id' => function (array $attributes) {
                return Shipment::where('user_id', $attributes['user_id'])->first()->id;
                // return Shipment::find($attributes['user_id'])->first()->id;
            },
            'payment_id' => function (array $attributes) {
                return Payment::where('user_id', $attributes['user_id'])->first()->id;
                // return Payment::find($attributes['user_id'])->first()->id;
            },
            // 'payment_id' => 1,
            'status_order_id' => StatusOrder::inRandomOrder()->first()->id,
        ];
    }
}
