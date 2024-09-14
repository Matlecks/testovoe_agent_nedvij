<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Сервис */
use App\Services\ProductService;
use App\Services\CartService;

/* Реквесты */
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
/* Для тайпхинтов */
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;
    protected $cartService;

    public function __construct(ProductService $productService, CartService $cartService)
    {
        $this->productService = $productService;
        $this->cartService = $cartService;
    }



    public function index(): View
    {
        $products = $this->productService->getAllProducts();
        return view('pages.products.index', compact('products'));
    }

    public function edit($id): View
    {
        $data = $this->productService->getProductForEdit($id);
        $product = $data['product'];

        return view('pages.products.edit', compact('product',));
    }


    public function update(UpdateProductRequest $request, $id): RedirectResponse
    {
        $validated = $request->validated();

        $this->productService->updateProduct($id, $validated);

        $message = "Товар отредактирован";
        return redirect()->route('product.index')->with('message', $message);
    }

    public function create(): View
    {
        return view('pages.products.create', /* compact() */);
    }


    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->productService->storeProduct($validated);

        $message = "Товар создан";
        return redirect()->route('product.index')->with('message', $message);
    }

    public function destroy($id): RedirectResponse
    {
        $this->productService->destroyProduct($id);

        $message = "Товар удален";
        return redirect()->route('product.index')->with('message', $message);
    }

    public function addToCart(Request $request): RedirectResponse
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Используем CartService для добавления товара в корзину
        $this->cartService->addToCart($productId, $quantity);

        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }
}
