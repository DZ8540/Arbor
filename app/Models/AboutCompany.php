<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
  use HasFactory;

  protected $table = 'about_company';

  protected $fillable = [
    'name',
    'description',
    'work_start',
    'work_end',
    'email',
    'phone',
    'image',
    'address',
    'vk',
    'facebook',
    'instagram',
    'telegram',
  ];
}