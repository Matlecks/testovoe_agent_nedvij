<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderService
{
    public function getCartView(): \Illuminate\View\View
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['cost'] * $item['quantity'];
        }

        return view('pages.orders.cart', compact('cart', 'totalPrice'));
    }

    public function createOrder(Request $request): void
    {
        $cartItems = session()->get('cart', []);
        $productNames = [];
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $productNames[] = $item['name'];
            $totalPrice += $item['cost'] * $item['quantity'];
        }

        $order = new Order();
        $order->product_names = implode(', ', $productNames);
        $order->total_price = $totalPrice;
        $order->save();

        // Очистка корзины
        session()->forget('cart');
    }

    public function getOrdersView(): \Illuminate\View\View
    {
        $orders = Order::all();
        $totalOrdersPrice = Order::sum('total_price');

        return view('pages.orders.index', compact('orders', 'totalOrdersPrice'));
    }
}
