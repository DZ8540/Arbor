<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThicknessRequest;
use App\Models\Thickness;
use Illuminate\Http\Request;

class ThicknessController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $columns = ['id', 'slug', 'name'];
    $thicknesses = Thickness::select($columns)->get();
    return view('Admin.Thicknesses.index', compact('thicknesses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Admin.Thicknesses.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ThicknessRequest $request)
  {
    Thickness::create($request->all());
    return redirect()->route('admin.thicknesses.index')->with('success', 'Толщина была успешно создана');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Thickness  $thickness
   * @return \Illuminate\Http\Response
   */
  public function show(Thickness $thickness)
  {
    return view('Admin.Thicknesses.show', compact('thickness'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Thickness  $thickness
   * @return \Illuminate\Http\Response
   */
  public function edit(Thickness $thickness)
  {
    return view('Admin.Thicknesses.edit', compact('thickness'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Thickness  $thickness
   * @return \Illuminate\Http\Response
   */
  public function update(ThicknessRequest $request, Thickness $thickness)
  {
    $thickness->update($request->all());
    return redirect()->route('admin.thicknesses.index')->with('success', 'Толщина была успешно изменена');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Thickness  $thickness
   * @return \Illuminate\Http\Response
   */
  public function destroy(Thickness $thickness)
  {
    $thickness->delete();
    return redirect()->route('admin.thicknesses.index')->with('danger', 'Толщина была успешно удалена');
  }
}