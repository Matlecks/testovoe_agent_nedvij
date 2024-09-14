<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function addToCart($productId, $quantity)
    {
        // Получаем текущую корзину
        $cart = session()->get('cart', []);

        // Если товар уже в корзине, увеличиваем количество
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Если товара нет в корзине, добавляем его
            $product = Product::find($productId);
            if ($product) {
                $cart[$productId] = [
                    'name' => $product->title,
                    'quantity' => $quantity,
                    'cost' => $product->cost,
                ];
            }
        }

        // Сохраняем корзину в сессии
        session()->put('cart', $cart);
    }
}
