<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
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
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found']);
        }
        Cart::add([
            'id' => $product->id,
            'name'=> $product->name,
            'price' => (int)($product->sale_price),
            'qty'=> (int)$request['quantity'],
            'weight'=>1,
            'options'=>[
                'thumbnail'=>$product->thumbnail_1,
                'old_price'=>(int)($product->old_price),
                'color' => $request['color'],
                'size'=>$request['size'],
            ]
        ]);
        $cartHtml = $this->getCartHtml();
        return response()->json(['success'=>'Thêm giỏ hàng thành công', 'quantity' => Cart::count(), 'cart_html' => $cartHtml, 'content' => Cart::content()]);
    }
    public function deleteAjax(Request $request)
    {
        Cart::remove($request->rowId);
        return response()->json(['status'=> 'success', 'quantity' => Cart::count()]);
    }
    public function getCartHtml()
    {
        $cartHtml = view('Frontend.cart')->render();
        return response()->json(['cartHtml' => $cartHtml]);
    }

    public function payment() 
    {
        $categories = $this->categoryRepository->get_four_category_with_child();
        return view('Frontend.payment.index', compact('categories'));
    }
}
