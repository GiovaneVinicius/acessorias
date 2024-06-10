<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Str;

class OrderService
{
    public function getAllOrders()
    {
        return Order::with('products')->get();
    }

    public function getOrderById($id)
    {
        return Order::with('products')->findOrFail($id);
    }

    public function createOrder($data)
    {
        $order = Order::create($data);

        if (isset($data['products'])) {
            $order->products()->sync($this->formatProducts($data['products']));
        }

        return $order->load('products');
    }

    public function updateOrder($id, $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);

        if (isset($data['products'])) {
            $order->products()->sync($this->formatProducts($data['products']));
        }

        return $order->load('products');
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->products()->detach();
        $order->delete();

        return $order;
    }

    private function formatProducts($products)
    {
        return collect($products)->mapWithKeys(function ($product) {
            return [$product['id'] => ['quantity' => $product['quantity']]];
        })->toArray();
    }
}
