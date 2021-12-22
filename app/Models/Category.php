<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'slug', 'image', 'category_type_id'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function getImageAttribute($val)
  {
    return $val ? Storage::url($val) : asset('img/placeholder.png');
  }

	public function category_type() {
		return $this->belongsTo(CategoryType::class);
	}

  public function products() {
    return $this->hasMany(Product::class);
  }
}