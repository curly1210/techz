<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //     Category::factory()->count(3)->create();
        //     Product::factory()->count(5)->create();
        // User::factory()->count(1)->create();
        //     User::factory()
        //         ->hasAttached(
        //             Product::factory()->count(1),
        //             ['quantity' => 1, 'total_price' => '2'],
        //             'putProductInCart'
        //         )
        //         ->afterCreating(function (User $user) {
        //             $datas = Cart::where('user_id', '=', $user->id)
        //                 ->join('products', 'products.id', '=', 'carts.product_id')
        //                 ->get(['quantity', 'price']);
        //             // dd($datas);
        //             $total = 0;
        //             foreach ($datas as  $data) {
        //                 $total += $data->price * $data->quantity;
        //             }

        //             Cart::where('user_id', '=', $user->id)->first()->update(['total_price' => $total]);

        //         })
        //         ->create();


        return view('index');
    }
}
