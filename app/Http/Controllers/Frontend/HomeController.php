<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\BannerRepository;
use App\Http\Repository\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private $categoryRepository, $bannerRepository, $productRepository;
    public function __construct(CategoryRepository $categoryRepository, BannerRepository $bannerRepository, ProductRepository $productRepository) 
    {
        $this->categoryRepository = $categoryRepository;
        $this->bannerRepository = $bannerRepository;
        $this->productRepository = $productRepository;
    }
    public function home() {
        $banner = $this->bannerRepository->get_all_status();
        $categories = $this->categoryRepository->get_four_category_with_child();
        $category_prom_dresses = $this->categoryRepository->get_prom_dresses_category();
        $category_shape_a = $this->categoryRepository->get_shape_a_category();
        $category_dress_empty = $this->categoryRepository->get_dress_empty_category();
        $product_prom_dresses = $this->productRepository->get_product_your_parent($category_prom_dresses->id);
        $product_shape_a = $this->productRepository->get_product_your_parent($category_shape_a->id);
        $product_dress_empty = $this->productRepository->get_product_your_parent($category_dress_empty->id);
        $product_get_hot_product = $this->productRepository->get_hot_product();
        $category_hot = $this->categoryRepository->get_category_hot_favorite();
        $random_product = $this->productRepository->random_3();
        // foreach ($random_product as $key => $value) {
        //     $arrId[] = $value->id;
        // }
        // $random_product_2 = $this->productRepository->random_3_2($arrId);
        return view('frontend.home.index', compact('categories','banner', 'product_prom_dresses', 'product_shape_a', 'product_dress_empty', 'product_get_hot_product', 'category_hot', 'random_product',));
    }
}