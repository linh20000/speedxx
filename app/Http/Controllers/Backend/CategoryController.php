<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use Illuminate\Http\Request;
use App\Models\Category;use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->middleware('auth');
    }

    public function createCategory() 
    {
        $category_parent = $this->categoryRepository->get_parent_category();
        return view('backend.category.create', ['breadcrumb'=>'Thêm danh mục'] , compact('category_parent'));
    }

    public function post(Request $request) 
    {
        $request->validate([
            'name' =>'required',
            'thumbnail' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keyword' => 'required',
        ],[
            'name.required'=> 'Vui lòng nhập tên',
            'thumbnail.required'=> 'Vui lòng nhập ảnh',
            'seo_title.required'=> 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_description.required'=> 'Vui lòng nhập miêu tả tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
        ]);
        $data = $request->all();
        $this->categoryRepository->save($data);
        return back()->with('success', 'Thêm danh mục thành công');
    }

    public function get_category() 
    {
        $categories_list = $this->categoryRepository->getAll();
        $dataLength = count($categories_list);
        return view('backend.category.list', ['breadcrumb'=>'Danh sách danh mục'], compact('categories_list', 'dataLength'));
    }
    public function get_update_category($id) 
    {
        $category = $this->categoryRepository->find_by_id($id);
        $category_parent = $this->categoryRepository->get_parent_category();
        return view('backend.category.update',['breadcrumb'=>'Chỉnh sửa danh mục'], compact('category', 'category_parent'));
    }
    public function update_category($id , Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keyword' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'thumbnail.required' => 'Vui lòng nhập ảnh',
            'seo_title.required' => 'Vui lòng nhập tiêu đề tìm kiếm',
            'seo_description.required' => 'Vui lòng nhập miêu tả tìm kiếm',
            'seo_keyword.required' => 'Vui lòng nhập từ khóa tìm kiếm',
        ]);
        $old_data = $this->categoryRepository->find_by_id($id);
        $data = $request->all();
        $this->categoryRepository->update_category($old_data, $data);
        return redirect(route('admin.category'))->with('success', 'Cập nhật thành công');
    }
}
