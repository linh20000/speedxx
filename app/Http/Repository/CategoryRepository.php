<?php

namespace App\Http\Repository;
use App\Models\Category;

class CategoryRepository
{
    public function save($category) 
    {
        Category::create($category);
    }
    public function getAll()
    {
        return Category::orderBy('updated_at', 'DESC')->where('status', '=', 1)->get();
    }
    public function get_parent_category() 
    {
        return Category::orderBy('updated_at', 'DESC')->where('parent_id', '=', 0)->where('status', '=', 1)->get();
    }
    public function get_four_category_with_child() {
        return Category::orderBy('created_at','ASC')->where('status' , '=', 1)->where('parent_id', '=', 0)->with('child')->take(4)->get();
    }
    public function find_by_id($id) {
        return Category::find($id);
    }
    public function update_category($old_data , $data) {
        return $old_data->update($data);
    }
}