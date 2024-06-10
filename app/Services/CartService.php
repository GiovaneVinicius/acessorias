<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Support\Str;

class CartService
{


    public function getCartById($id)
    {
        return Cart::with('products')->findOrFail($id);
    }

    public function getCartByUser($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();

        if ($cart) {
            return response()->json(Cart::with('products', 'products.product')->find($cart->id), 200);
        }
        return response()->json(null, 401);
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
        $cartProduct = CartProduct::where('product_id', $data['products'][0]['id'])->where('cart_id', $id)->first();


        if ($cartProduct) {
            $cartProduct->quantity = $data['products'][0]['quantity'];

            $cartProduct->save();
            return $cartProduct;
        }else{

            $cartProduct = CartProduct::create([
                'cart_id' => $id,
                'product_id' => $data['products'][0]['id'],
                'quantity' => $data['products'][0]['quantity']
            ]);

            return $cartProduct;
        }
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
