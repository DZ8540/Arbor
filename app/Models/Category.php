<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'slug', 'image', 'category_type_id'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

	public function category_type() {
		return $this->belongsTo(CategoryType::class);
	}
}