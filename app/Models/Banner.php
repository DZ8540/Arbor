<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	use HasFactory;

	protected $fillable = ['title', 'description', 'link', 'image', 'is_additional'];

  public function getIsAdditionalAttribute($val)
	{
		return $val ? 'Да' : 'Нет';
	}
}
