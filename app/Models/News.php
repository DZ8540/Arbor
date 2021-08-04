<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	use HasFactory;

	protected $fillable = ['slug', 'name', 'description', 'image', 'publication_date', 'publication_time'];
}
