<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $columns = ['id', 'slug', 'name', 'hex_code'];
    $colors = Color::select($columns)->get();
    return view('Admin.Colors.index', compact('colors'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Admin.Colors.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ColorRequest $request)
  {
    Color::create($request->all());
    return redirect()->route('admin.colors.index')->with('success', 'Цвет продукта успешно создан');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Color  $color
   * @return \Illuminate\Http\Response
   */
  public function show(Color $color)
  {
    return view('Admin.Colors.show', compact('color'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Color  $color
   * @return \Illuminate\Http\Response
   */
  public function edit(Color $color)
  {
    return view('Admin.Colors.edit', compact('color'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Color  $color
   * @return \Illuminate\Http\Response
   */
  public function update(ColorRequest $request, Color $color)
  {
    $color->update($request->all());
    return redirect()->route('admin.colors.index')->with('success', 'Цвет продукта успешно изменен');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Color  $color
   * @return \Illuminate\Http\Response
   */
  public function destroy(Color $color)
  {
    $color->delete();
    return redirect()->route('admin.colors.index')->with('danger', 'Цвет продукта удален');
  }
}