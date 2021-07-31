<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManufacturerRequest;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $manufacturers = Manufacturer::select('id', 'name')->get();
    return view('Admin.Manufacturers.index', compact('manufacturers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('Admin.Manufacturers.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ManufacturerRequest $request)
  {
    Manufacturer::create($request->all());
    return redirect()->route('admin.manufacturers.index')->with('success', 'Производитель добавлен');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Manufacturer  $manufacturer
   * @return \Illuminate\Http\Response
   */
  public function show(Manufacturer $manufacturer)
  {
    return view('Admin.Manufacturers.show', compact('manufacturer'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Manufacturer  $manufacturer
   * @return \Illuminate\Http\Response
   */
  public function edit(Manufacturer $manufacturer)
  {
    return view('Admin.Manufacturers.edit', compact('manufacturer'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Manufacturer  $manufacturer
   * @return \Illuminate\Http\Response
   */
  public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
  {
    $manufacturer->update($request->all());
    return redirect()->route('admin.manufacturers.index')->with('success', 'Производитель изменен');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Manufacturer  $manufacturer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Manufacturer $manufacturer)
  {
    $manufacturer->delete();
    return redirect()->route('admin.manufacturers.index')->with('danger', 'Производитель удален');
  }
}