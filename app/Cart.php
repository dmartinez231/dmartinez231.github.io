<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
  protected $table = 'carts';
  protected $guarded = [];

  public $timestamps = true;
}
