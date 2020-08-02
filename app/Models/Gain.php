<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gain extends Model
{
  use SoftDeletes;
  protected $fillable = ["master","don","montant"];
}
