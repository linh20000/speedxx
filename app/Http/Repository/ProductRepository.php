<?php

namespace App\Http\Repository;
use App\Models\Product;

class ProductRepository
{
    public function create($data) {
        return Product::create($data);
    }
    
    public function get_product_paginate_8()
    {
        return Product::orderBy('created_at', 'ASC')->paginate(8);
    }
    public function get_product_paginate_12()
    {
        return Product::orderBy('created_at', 'DESC')->where('status','=', 1)->paginate(12);
    }
    public function get_product_your_parent($parent_id)
    {
        return Product::orderBy('created_at', 'DESC')->where('category_id', '=', $parent_id)->where('status', '=', 1)->take(6)->get();
    }
    public function getAll()
    {
        return Product::all();
    }
    public function get_hot_product()
    {
        return Product::orderBy('created_at', 'ASC')->where('tags', '=', 'bestSeller')->where('status', '=', 1)->take(6)->get();
    }
    public function find($id)
    {
        return Product::find($id);
    }
    public function relateionship_product( $id, $data)
    {
        return Product::orderBy('created_at', 'DESC')->where('status', '=', 1)->where('tags', '=', $data)->where('id', '!=' , $id)->take(4)->get();
    }
    public function update_product($old_data, $data)
    {
        return $old_data->update($data);
    }
    public function get_product_your_parent_12($parent_id)
    {
        return Product::orderBy('created_at', 'DESC')->where('category_id', '=', $parent_id)->where('status', '=', 1)->paginate(12);
    }
    public function random_3()
    {
        return Product::orderBy('created_at', 'DESC')->where('status', '=', 1)->get()->random(2);
    }
    public function random_3_2($id)
    {
        return Product::orderBy('created_at', 'DESC')->where('status', '=', 1)->whereIn('id', $id)->get()->random(2);
    }
}