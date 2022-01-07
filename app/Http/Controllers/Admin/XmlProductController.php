<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\XmlProductRequest;
use App\Models\Category;
use App\Models\CategoryType;
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

		// foreach ($items as $item) {
    //   $slug = Str::slug($item['@attributes']['name']);

    //   $description = 'From XML';
    //   if (!empty($item['@attributes']['description'])) {
    //     $description = $item['@attributes']['description'];
    //   }
      
    //   $code = rand(10000000, 99999999);
    //   if (!empty($item['@attributes']['code'])) {
    //     $code = $item['@attributes']['code'];
    //   }

    //   $price = rand(1, 99999);
    //   if (!empty($item['@attributes']['price'])) {
    //     $price = $item['@attributes']['price'];
    //   }
      
    //   $format = 'XML';
    //   if (!empty($item['@attributes']['measure'])) {
    //     $format = $item['@attributes']['measure'];
    //   }

    //   $article = 'XML';
    //   if (!empty($item['@attributes']['article'])) {
    //     $article = $item['@attributes']['article'];
    //   }

    //   $photo = 'XML';
    //   if (!empty($item['@attributes']['photo'])) {
    //     $photo = $item['@attributes']['photo'];
    //     foreach ($request->images as $image) {
    //       if ($image->getClientOriginalName() == $photo) {
    //         $photo = Storage::putFile("{$this->directory}{$slug}/images", new File($image));
    //       }
    //     }
    //   }

    //   $count = 99;
    //   if (!empty($item['@attributes']['quantity'])) {
    //     $count = $item['@attributes']['quantity'];
    //   }

    //   $attrs = [
    //     'slug' => $slug,
    //     'name' => $item['@attributes']['name'],
    //     'description' => $description,
    //     'image' => $photo,
    //     'code' => $code,
    //     'price' => (int) $price,
    //     'format' => $format,
    //     'article' => $article,
    //     'count' => $count,
    //     'manufacturer_id' => Manufacturer::all()->random()->id,
    //     'color_id' => Color::all()->random()->id,
    //     'thickness_id' => Thickness::all()->random()->id,
    //     'category_id' => Category::all()->random()->id
    //   ];

    //   Product::create($attrs);
    // }

    foreach ($items as $item) {
      $attrs = $item['@attributes'];
      $slug = Str::slug($attrs['name']);
      
      $name = $attrs['name'];

      $code = rand(10000000, 99999999);
      if (!empty($attrs['code'])) {
        $code = $attrs['code'];
      }

      $description = 'From XML';
      if (!empty($attrs['description'])) {
        $description = $attrs['description'];
      }

      $count = 0;
      if (!empty($attrs['quantity'])) {
        $count = $attrs['quantity'];
      }

      $price = 0;
      if (!empty($attrs['price'])) {
        $price = $attrs['price'];
      }

      $format = 'XML';
      if (!empty($attrs['measure'])) {
        $format = $attrs['measure'];
      }

      $article = 'XML';
      if (!empty($attrs['article'])) {
        $article = $attrs['article'];
      }

      $photo = '';
      if (!empty($attrs['photo'])) {
        $photo = $attrs['photo'];
        foreach ($request->images as $image) {
          if ($image->getClientOriginalName() == $photo) {
            $photo = Storage::putFile("{$this->directory}{$slug}/images", new File($image));
          }
        }
      }

      $category_id = $this->addCategory($attrs['category']);

      $thickness = 'XML';
      if (!empty($attrs['thickness'])) {
        $thickness = $attrs['thickness'];
      }
      $thickness_id = $this->addThickness($thickness);

      $color = 'XML';
      if (!empty($attrs['color'])) {
        $color = $attrs['color'];
      }
      $color_id = $this->addColor($color);

      $producer = 'XML';
      if (!empty($attrs['producer'])) {
        $producer = $attrs['producer'];
      }
      $manufacturer_id = $this->addManufacturer($producer);

      Product::create([
        'slug' => $slug,
        'name' => $name,
        'description' => $description,
        'image' => $photo,
        'code' => $code,
        'price' => $price,
        'format' => $format,
        'article' => $article,
        'count' => $count,
        'manufacturer_id' => $manufacturer_id,
        'color_id' => $color_id,
        'thickness_id' => $thickness_id,
        'category_id' => $category_id
      ]);
    }

    return redirect()->route('admin.xml.products')->with('success', 'Продукты были успешно добавлены!');
  }

  private function addColor($color)
  {
    $slug = Str::slug($color);
    $name = $color;

    $color_item = Color::where('slug', $slug)->first();
    if (!empty($color_item))
      return $color_item->id;

    $color_item = Color::create([
      'slug' => $slug,
      'name' => $name
    ]);

    return $color_item->id;
  }

  private function addCategory($category)
  {
    $slug = Str::slug($category);
    $name = $category;

    $category_item = Category::where('slug', $slug)->first();
    if (!empty($category_item))
      return $category_item->id;

    $category_type = CategoryType::all()->random()->id;
    $category_item = Category::create([
      'slug' => $slug,
      'name' => $name,
      'category_type_id' => $category_type
    ]);

    return $category_item->id;
  }

  private function addThickness($thickness)
  {
    $slug = Str::slug($thickness);
    $name = $thickness . ' мм';

    $thickness_item = Thickness::where('slug', $slug)->first();
    if (!empty($thickness_item))
      return $thickness_item->id;

    $thickness_item = Thickness::create([
      'slug' => $slug,
      'name' => $name,
    ]);

    return $thickness_item->id;
  }

  private function addManufacturer($manufacturer)
  {
    $name = $manufacturer;

    $manufacturer_item = Manufacturer::where('name', $name)->first();
    if (!empty($manufacturer_item))
      return $manufacturer_item->id;

    $manufacturer_item = Manufacturer::create([
      'name' => $name
    ]);

    return $manufacturer_item->id;
  }
}
