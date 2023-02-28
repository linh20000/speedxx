<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\BannerRepository;

class BannerController extends Controller
{
    private $bannerRepository;
    public function __construct(BannerRepository $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
        $this->middleware('auth');
    } 
    public function createBanner() {
        return view('backend.banner.create', ['breadcrumb'=>'Thêm banner']);
    }
    public function post(Request $request) {
        $request->validate([
            'title'=>'required',
            'thumbnail'=>'required',
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
        ]);
        $data = $request->all();
        $this->bannerRepository->save($data);
        return back()->with('success', 'Thêm thành công banner');
    } 
    public  function get_Banner() 
    {
        $banner = $this->bannerRepository->get_paginate_8();
        $dataLength = count($this->bannerRepository->getAll());
        return view('backend.banner.list', ['breadcrumb'=>'Danh sách banner'], compact('banner', 'dataLength'));
    }

    public function get_update_Banner($id) 
    {
        $banner = $this->bannerRepository->find($id);
        return view('backend.banner.update',['breadcrumb'=>'Chỉnh sửa banner'], compact('banner'));
    }
    public function update_Banner($id, Request $request) 
    {
        $old_data = $this->bannerRepository->find($id);
        $request->validate([
            'title' => 'required',
            'header' => 'required',
            'thumbnail' => 'required',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'header.required' => 'Vui lòng nhập phần mô tả',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
        ]);
        $data = $request->all();
        $this->bannerRepository->update($old_data, $data);
        return redirect(route('admin.Banner'))->with('success', 'Chỉnh sửa banner thành công');
    }
    public function deleteBanner($id)
    {
        $banner = $this->bannerRepository->find($id);
        $banner->delete();
        return back()->with('success', 'Xóa thành công banner');
    }
}
