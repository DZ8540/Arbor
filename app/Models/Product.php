<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
	use HasFactory;

	protected $fillable = [
		'slug',
		'name',
		'description',
		'image',
		'code',
		'price',
		'format',
		'article',
		'count',
		'manufacturer_id',
		'color_id',
		'thickness_id',
		'category_id'
	];

	public function getRouteKeyName()
	{
		return 'slug';
	}

  public function getImageAttribute($val)
  {
    return $val ? Storage::url($val) : asset('img/placeholder.png');
  }

	public function category() 
	{
		return $this->belongsTo(Category::class);
	}

	public function manufacturer() 
	{
		return $this->belongsTo(Manufacturer::class);
	}

	public function color() 
	{
		return $this->belongsTo(Color::class);
	}

	public function thickness() 
	{
		return $this->belongsTo(Thickness::class);
	}

	public function productImages() {
		return $this->hasMany(ProductImage::class);
	}
}
