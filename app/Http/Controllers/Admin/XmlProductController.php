<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\XmlProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Thickness;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class XmlProductController extends Controller
{
  public $directory = 'public/Products/';

  public function index()
  {
    return view('Admin.xml_product');
  }

  public function add(XmlProductRequest $request)
  {
    $xml = simplexml_load_string($request->file('xml')->getContent());
    $json = json_encode($xml);
    $items = json_decode($json, true)['item'];

		foreach ($items as $item) {
      $slug = Str::slug($item['@attributes']['name']);

      $description = 'From XML';
      if (!empty($item['@attributes']['description'])) {
        $description = $item['@attributes']['description'];
      }
      
      $code = rand(10000000, 99999999);
      if (!empty($item['@attributes']['code'])) {
        $code = $item['@attributes']['code'];
      }

      $price = rand(1, 99999);
      if (!empty($item['@attributes']['price'])) {
        $price = $item['@attributes']['price'];
      }
      
      $format = 'XML';
      if (!empty($item['@attributes']['measure'])) {
        $format = $item['@attributes']['measure'];
      }

      $article = 'XML';
      if (!empty($item['@attributes']['article'])) {
        $article = $item['@attributes']['article'];
      }

      $photo = 'XML';
      if (!empty($item['@attributes']['photo'])) {
        $photo = $item['@attributes']['photo'];
        foreach ($request->images as $image) {
          if ($image->getClientOriginalName() == $photo) {
            $photo = Storage::putFile("{$this->directory}{$slug}/images", new File($image));
          }
        }
      }

      $count = 99;
      if (!empty($item['@attributes']['quantity'])) {
        $count = $item['@attributes']['quantity'];
      }

      $attrs = [
        'slug' => $slug,
        'name' => $item['@attributes']['name'],
        'description' => $description,
        'image' => $photo,
        'code' => $code,
        'price' => (int) $price,
        'format' => $format,
        'article' => $article,
        'count' => $count,
        'manufacturer_id' => Manufacturer::all()->random()->id,
        'color_id' => Color::all()->random()->id,
        'thickness_id' => Thickness::all()->random()->id,
        'category_id' => Category::all()->random()->id
      ];

      Product::create($attrs);
    }

    return redirect()->route('admin.xml.products')->with('success', 'Продукты были успешно добавлены!');
  }
}
