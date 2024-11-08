<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'description',
    'unit',
    'class',
    'weight',
    'max',
    'class_time',
    'day_month_year',
  ];

  public function sub_activity(): HasOne
  {
    return $this->hasOne(SubActivity::class);
  }
}
