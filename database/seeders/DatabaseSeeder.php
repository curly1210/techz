<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shipment;
use App\Models\StatusOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Status Order
        StatusOrder::factory()
            ->sequence(
                ['name' => 'Pending'],
                ['name' => 'Confirm'],
                ['name' => 'Delivering'],
                ['name' => 'Completed'],
            )
            ->count(4)
            ->create();

        PaymentMethod::factory()
            ->state(['name' => 'Thanh toán khi nhận hàng'])
            ->create();

        $categories = [
            "Điện thoại" => ["iPhone 15", "Galaxy S23", "Xiaomi 13", "Oppo Find X6"],
            "Laptop" => ["MacBook Air", "Dell XPS 13", "HP Spectre x360", "Lenovo ThinkPad X1"],
            "Phụ kiện máy tính" => ["Chuột Logitech MX Master 3", "Bàn phím cơ Keychron K2", "Tai nghe HyperX Cloud II", "Webcam Logitech C920"],
            "Máy tính" => ["iMac", "Dell OptiPlex 7080", "HP EliteDesk 800", "Lenovo IdeaCentre AIO"],
            "Âm thanh" => ["Loa JBL Charge 5", "Tai nghe Sony WH-1000XM5", "Amply Denon PMA-600NE", "Loa Bluetooth Bose SoundLink Mini"]
        ];

        // Category, Product, ImageProduct, Comment
        foreach ($categories as $categorie => $products) {
            Category::factory()
                ->state(['name' => $categorie])
                ->has(
                    Product::factory()
                        ->count(count($products))
                        ->sequence(...array_map(fn($product) => ['name' => $product], $products))
                        ->has(
                            ProductImage::factory()
                                ->count(5)
                                ->sequence(fn(Sequence $sequence) =>
                                ['position' => ($sequence->index) % 5 + 1]),
                            'images'
                        )
                        ->hasAttached(
                            User::factory()
                                ->has(
                                    Cart::factory()
                                        ->has(
                                            CartItem::factory()
                                                // ->state([])
                                                ->count(3)
                                                ->afterCreating(function (CartItem $cartItem) {
                                                    $product = Product::find($cartItem->product_id);
                                                    CartItem::where('id', '=', $cartItem->id)->update(['price' => $product['price']]);
                                                })

                                        )
                                        ->count(1)
                                )
                                ->has(Payment::factory())
                                ->has(Shipment::factory())
                                ->has(Order::factory()
                                    ->has(
                                        OrderItem::factory()
                                            ->count(2)
                                            ->afterCreating(function (OrderItem $item) {
                                                $data = Product::find($item->product_id);
                                                OrderItem::where('id', '=', $item->id)->update(['price' => $data['price']]);
                                            })
                                    )),
                            ['content' => fake()->text(50)],
                            'commented'
                        )
                )
                ->create();
        }


        // Fake shippment
        // User::factory()
        //     ->has(
        //         Shipment::factory()
        //             ->count(2)
        //     )
        //     ->count(3)
        //     ->create();



        // Cart, Cart Item
        // User::factory()
        // ->has(
        //     Cart::factory()
        //         ->has(
        //             CartItem::factory()
        //                 // ->state([])
        //                 ->count(3)
        //                 ->afterCreating(function (CartItem $cartItem) {
        //                     $product = Product::find($cartItem->product_id);
        //                     CartItem::where('id', '=', $cartItem->id)->update(['price' => $product['price']]);
        //                 })

        //         )
        //         ->count(1)
        // )
        //     ->count(2)
        //     ->create();



        // Order, order item
        // User::factory()
        //     ->has(Payment::factory())
        //     ->has(Shipment::factory())
        //     ->has(
        //         Order::factory()
        //             ->has(
        //                 OrderItem::factory()
        //                     ->count(2)
        //                     ->afterCreating(function (OrderItem $item) {
        //                         $data = Product::find($item->product_id);
        //                         OrderItem::where('id', '=', $item->id)->update(['price' => $data['price']]);
        //                     })
        //             )
        //     )
        //     ->create();
    }
}
