<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $carts = $this->cartService->getAllCarts();
        return response()->json($carts);
    }

    public function store(Request $request)
    {
        $cart = $this->cartService->createCart($request->all());
        return response()->json($cart, 201);
    }

    public function show($id)
    {
        $cart = $this->cartService->getCartById($id);
        return response()->json($cart);
    }

    public function update(Request $request, $id)
    {
        $cart = $this->cartService->updateCart($id, $request->all());
        return response()->json($cart);
    }

    public function destroy($id)
    {
        $this->cartService->deleteCart($id);
        return response()->json(null, 204);
    }
}
