<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannersAddition extends Model
{
	use HasFactory;

  protected $table = 'banners_addition';

	protected $fillable = ['title', 'description', 'link'];
}
