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
    'call_email',

    'phone',
    'commercial_phone',
    'other_phone_1',
    'other_phone_2',
    'other_phone_3',

    'image',
    'address',
    'vk',
    'facebook',
    'instagram',
    'telegram',
  ];
}