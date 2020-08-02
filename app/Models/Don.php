<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Don extends Model
{
    use SoftDeletes;
    protected $fillable = ["user","pack","statut","reference","date_envoie"];

    public function rsds()
    {
      return $this->hasMany("App\Models\Rsd","don");
    }
}
