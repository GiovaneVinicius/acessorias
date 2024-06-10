<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class orderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllorders();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = $this->orderService->createorder($request->all());
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = $this->orderService->getorderById($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderService->updateorder($id, $request->all());
        return response()->json($order);
    }

    public function destroy($id)
    {
        $this->orderService->deleteorder($id);
        return response()->json(null, 204);
    }
}
