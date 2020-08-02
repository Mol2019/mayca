<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adhesion extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ["user","is_new","date_demande","date_debut","nombre_mois"];
}
