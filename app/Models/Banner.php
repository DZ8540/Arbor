<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
	use HasFactory;

	protected $fillable = ['title', 'description', 'link', 'image', 'is_additional'];

  public function getIsAdditionalAttribute($val)
	{
		return $val ? 'Да' : 'Нет';
	}

  public function getImageAttribute($val)
  {
    return $val ? Storage::url($val) : asset('img/placeholder.png');
  }
}
