<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function showCart(): \Illuminate\View\View
    {
        return $this->orderService->getCartView();
    }

    public function createOrder(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->orderService->createOrder($request);
        return redirect()->route('product.index')->with('success', 'Заказ успешно создан!');
    }

    public function index(): \Illuminate\View\View
    {
        return $this->orderService->getOrdersView();
    }
}
