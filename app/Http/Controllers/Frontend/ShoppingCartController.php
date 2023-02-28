<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    private  $productRepository, $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    public function shopping_cart() 
    {
        $categories = $this->categoryRepository->get_four_category_with_child();

        return view('Frontend.shopping_cart.index', compact('categories'));
    }
    public function addCartAjax(Request $request)
    {
        $request->validate([
            'size'=>'required',
            'color'=>'required'
        ], [
            'size.required'=>'Vui lòng chọn kích cỡ',
            'color.required' => 'Vui lòng chọn màu sắc',
        ]);
        $product = $this->productRepository->find($request->productId);
    }
}
