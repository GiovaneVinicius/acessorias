<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;
use PhpParser\Node\Stmt\Else_;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(Request $request)
    {
        return response()->json($this->createOrUpdate($request), 201);
    }

    public function show($id)
    {
        return $this->cartService->getCartByUser($id);
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->createOrUpdate($request));
    }

    public function destroy($id)
    {
        $this->cartService->deleteCart($id);
        return response()->json(null, 204);
    }

    public function createOrUpdate(Request $request){
        
        $cart = Cart::where('user_id', $request->user_id)->first();

        if($cart){
            return  $this->cartService->updateCart($cart->id, $request->all());
        }else{
            return $this->cartService->createCart($request->all());
        }
    }
}
