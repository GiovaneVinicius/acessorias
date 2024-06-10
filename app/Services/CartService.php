<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Str;

class CartService
{
    public function getAllCarts()
    {
        return Cart::with('products')->get();
    }

    public function getCartById($id)
    {
        return Cart::with('products')->findOrFail($id);
    }

    public function createCart($data)
    {
        $cart = Cart::create($data);

        if (isset($data['products'])) {
            $cart->products()->sync($this->formatProducts($data['products']));
        }

        return $cart->load('products');
    }

    public function updateCart($id, $data)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($data);

        if (isset($data['products'])) {
            $cart->products()->sync($this->formatProducts($data['products']));
        }

        return $cart->load('products');
    }

    public function deleteCart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->products()->detach();
        $cart->delete();

        return $cart;
    }

    private function formatProducts($products)
    {
        return collect($products)->mapWithKeys(function ($product) {
            return [$product['id'] => ['quantity' => $product['quantity']]];
        })->toArray();
    }
}
