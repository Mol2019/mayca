<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsd;

class RsdsController extends Controller
{
    //
    public function index()
    {
      $data = Rsd::all();
      return view("app.backoffice.users.rsds")->with("data",$data);
    }
}
