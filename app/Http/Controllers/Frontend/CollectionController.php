<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $productRepository , $categoryRepository;
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;

    }

    public function collectionAll()
    {
        $product = $this->productRepository->get_product_paginate_12();
        $count = count($this->productRepository->getAll());
        $categories = $this->categoryRepository->get_four_category_with_child();
        return view('Frontend.collection.index', compact('categories', 'product', 'count'));
    }
    public function collectionCategory($id, $slug)
    {
        $category_breadcrumb = $this->categoryRepository->find_by_id($id);
        // dd($category_breadcrumb);
        $product = $this->productRepository->get_product_your_parent_12($id);
        $count = count($product);
        $categories = $this->categoryRepository->get_four_category_with_child();
        return view('Frontend.collection.index', compact('categories', 'product', 'count', 'category_breadcrumb'));

    }
}
