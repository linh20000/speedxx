<?php

namespace App\Http\Repository;
use App\Models\Banner;

class BannerRepository
{
    public function save($data) {
        return Banner::create($data);
    }
    public function getAll() 
    {
        return Banner::all();
    }
    public function get_all_status()
    {
        return Banner::orderBy('created_at', 'ASC')->where('status', '=', '1')->get();
    }
    public function get_paginate_8() 
    {
        return Banner::orderBy('created_at', 'ASC')->paginate(8);
    }
    public function find($id)
    {
        return Banner::find($id);
    }
    public function update($old_data, $data)
    {
        return $old_data->update($data);
    }
}