<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\ProductRepository;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $categoryRepository, $productRepository;
    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function createProduct()
    {
        $category_parent = $this->categoryRepository->get_category_parent_product();
        return view('backend.product.create', ['breadcrumb'=>'Tạo mới sản phẩm'],compact('category_parent'));
    }
    public function post(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'subname'=>'required',
            'thumbnail_1'=>'required',
            'thumbnail_2'=>'required',
            'thumbnail_list'=>'required',
            'brand'=>'required',
            'tags'=>'required',
            'color'=>'required',
            'size'=>'required',
            'old_price'=>'required',
            'off'=>'required',
            'sale_price'=>'required',
            'description'=>'required',
            'quantity'=>'required',
            'seo_title'=>'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
        ],[
            'name.required'=>'Vui lòng nhập tên',
            'subname.required'=>'Vui lòng nhập mô tả',
            'thumbnail_1.required'=>'Vui lòng chọn ảnh đại diện 1',
            'thumbnail_2.required'=>'Vui lòng chọn ảnh đại diện 2',
            'thumbnail_list.required' => 'Vui lòng nhập danh sách hình ảnh',
            'brand.required'=>'Vui lòng nhập thương hiệu',
            'tags.reuquired'=>'Vui lòng nhập tags',
            'color.required'=>'Vui lòng nhập màu sắc',
            'size.required'=>'Vui lòng nhập các kích cỡ',
            'old_price.required'=>'Vui lòng nhập giá ',
            'off.required'=>'Vui lòng nhập giảm giá',
            'sale_price.required'=>'Vui lòng nhập giá sale',
            'description.required' => 'Vui lòng nhập mô tả',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm tìm kiếm',
        ]);
        $data = $request->all();
        $data['color'] = JSON_encode($data['color']);
        $data['size'] = JSON_encode($data['size']);
        $data['thumbnail_list'] = JSON_encode($data['thumbnail_list']);
        $this->productRepository->create($data);
        return back()->with('success', 'Thêm sản phẩm thành công');
    }

    public function showProductList() {
        $dataLength = count($this->productRepository->getAll());
        $product = $this->productRepository->get_product_paginate_8();
        return view('backend.product.list', ['breadcrumb'=>'Danh sách sản phẩm'], compact('product', 'dataLength'));
    }
    public function getUpdateProduct($id) 
    {
        $category_parent = $this->categoryRepository->get_category_parent_product();
        $product = $this->productRepository->find($id);
        return view('backend.product.update', ['breadcrumb'=>'Chỉnh sửa sản phẩm'], compact('product', 'category_parent'));
    }

    public function updateProduct($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'subname' => 'required',
            'thumbnail_1' => 'required',
            'thumbnail_2' => 'required',
            'thumbnail_list' => 'required',
            'brand' => 'required',
            'tags' => 'required',
            'color' => 'required',
            'size' => 'required',
            'old_price' => 'required',
            'off' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'seo_title' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'subname.required' => 'Vui lòng nhập mô tả',
            'thumbnail_1.required' => 'Vui lòng chọn ảnh đại diện 1',
            'thumbnail_2.required' => 'Vui lòng chọn ảnh đại diện 2',
            'thumbnail_list.required' => 'Vui lòng nhập danh sách hình ảnh',
            'brand.required' => 'Vui lòng nhập thương hiệu',
            'tags.reuquired' => 'Vui lòng nhập tags',
            'color.required' => 'Vui lòng nhập màu sắc',
            'size.required' => 'Vui lòng nhập các kích cỡ',
            'old_price.required' => 'Vui lòng nhập giá ',
            'off.required' => 'Vui lòng nhập giảm giá',
            'sale_price.required' => 'Vui lòng nhập giá sale',
            'description.required' => 'Vui lòng nhập mô tả',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm tìm kiếm',
        ]);
        $old_data = $this->productRepository->find($id);
        $data = $request->all();
        $this->productRepository->update_product($old_data, $data);
        return redirect(route('admin.showProductList'))->with('success', 'Chỉnh sửa thành công');
    }
    public function deleteProduct($id)
    {
        $product = $this->productRepository->find($id);
        $product->delete();
        return back()->with('success', 'Xóa sản phẩm thành công');
    }
}
