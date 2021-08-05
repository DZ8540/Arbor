<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
	use HasFactory;

	protected $fillable = ['slug', 'name', 'description', 'image'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

	public function newsImages()
	{
		return $this->hasMany(NewsImages::class);
	}

	public function getDateAttribute()
	{
		return $this->getDateOrTime(0);
	}

	public function getTimeAttribute()
	{
		return $this->getDateOrTime(1);
	}

	/**
	 * Get date or time function
	 * If you have get date, use 0
	 * If you have get time, use 1
	 *
	 * @param $date_time
	 * @return string
	 */
	private function getDateOrTime($date_time)
	{
		$created_at = Str::of($this->created_at)->explode(' ');
		return $date_time == 0 ? $created_at[0] : $created_at[1];
	}
}
