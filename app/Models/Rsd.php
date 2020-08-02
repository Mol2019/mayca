<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rsd extends Model
{
  use SoftDeletes;
  protected $fillable = ["statut","date_reception","montant","don","user"];
}
