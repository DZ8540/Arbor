<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$columns = ['id', 'title', 'description', 'link', 'image'];
		$banners = Banner::select($columns)->get();
		return view('Admin.Banners.index', compact('banners'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('Admin.Banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(BannerRequest $request)
	{
		$params = $request->all();
		
		if ($request->has('image')) {
			$path = $request->file('image')->store("public/Banners");
			$params['image'] = $path;
		}

		Banner::create($params);
		return redirect()->route('admin.banners.index')->with('success', 'Баннер успешно создан');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Banner  $banner
	 * @return \Illuminate\Http\Response
	 */
	public function show(Banner $banner)
	{
		return view('Admin.Banners.show', compact('banner'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Banner  $banner
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Banner $banner)
	{
		return view('Admin.Banners.edit', compact('banner'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Banner  $banner
	 * @return \Illuminate\Http\Response
	 */
	public function update(BannerRequest $request, Banner $banner)
	{
		$params = $request->all();
		
		if ($request->has('image')) {
			Storage::delete($banner->image);
			$path = $request->file('image')->store("public/Banners");
			$params['image'] = $path;
		}

		$banner->update($params);
		return redirect()->route('admin.banners.index')->with('success', 'Баннер успешно отредактирован');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Banner  $banner
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Banner $banner)
	{
		$banner->delete();
		return redirect()->route('admin.banners.index')->with('danger', 'Баннер удален');
	}
}
