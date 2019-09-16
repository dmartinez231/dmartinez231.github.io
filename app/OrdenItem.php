<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrdenItem extends Model
{
  protected $table = 'orden_items';
  protected $guarded = [];
  public $timestamps = false;
}
