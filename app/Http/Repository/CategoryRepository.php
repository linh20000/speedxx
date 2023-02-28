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
    public function get_category_parent_product()
    {
        return Category::orderBy('created_at', 'ASC')->where('status', '=', 1)->where('parent_id', '!=', 0)->with('childs')->get();
    }
    public function get_shape_a_category() {
        return Category::orderBy('created_at', 'ASC')->where('status', '=', 1)->where('name', '=', 'Đầm dáng a')->with('childs')->first();
    }
    public function get_prom_dresses_category()
    {
        return Category::orderBy('created_at', 'ASC')->where('status', '=', 1)->where('name', '=', 'Đầm dạ tiệc')->with('childs')->first();
    }
    public function get_dress_empty_category()
    {
        return Category::orderBy('created_at', 'ASC')->where('status', '=', 1)->where('name', '=', 'Đầm xuông')->with('childs')->first();
    }
    public function find_by_id($id) {
        return Category::find($id);
    }
    public function update_category($old_data , $data) {
        return $old_data->update($data);
    }
    public function get_paginate_8()
    {
        return Category::orderBy('created_at', 'ASC')->paginate(8);
    }
    public function get_category_hot_favorite()
    {
        return Category::where('parent_id', '=', 0)->where('name', '=', 'Bộ sưu tập hot')->where('status', '=', 1)->with('child')->first();
    }
}