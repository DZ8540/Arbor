<?php

namespace App\Models;

use Carbon\Translator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class News extends Model
{
  use HasFactory;

  protected $fillable = ['slug', 'name', 'description', 'image', 'views_count'];

  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function newsImages()
  {
    return $this->hasMany(NewsImages::class);
  }

  public function getDateTimeAttribute()
  {
    $date = strtotime($this->getDateOrTime(0));
    $time = strtotime($this->getDateOrTime(1));
    return date('H:i', $time) . ' ' . date('d.m', $date);
  }

  public function getDateAttribute()
  {
    return Carbon::parse($this->getDateOrTime(0))->translatedFormat('j F Y');
  }

  /**
   * Get date or time function
   * If you have get date, use 0
   * If you have get time, use 1
   *
   * @param boolean $date_time
   * @return string
   */
  private function getDateOrTime($date_time)
  {
    $created_at = Str::of($this->created_at)->explode(' ');
    return $date_time == 0 ? $created_at[0] : $created_at[1];
  }
}
