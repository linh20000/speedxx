<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    private  $productRepository , $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }
    public function show_details($id ,$slug) 
    {
        $product = $this->productRepository->find($id);
        $product_relation = $this->productRepository->relateionship_product( $product->id , $product->tags);
        $categories = $this->categoryRepository->get_four_category_with_child();
        return view('Frontend.details_product.index', compact('categories','product', 'product_relation'));
    }
}
