<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository) 
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function home() {
        $categories = $this->categoryRepository->get_four_category_with_child();
        return view('frontend.home.index', compact('categories'));
    }
}