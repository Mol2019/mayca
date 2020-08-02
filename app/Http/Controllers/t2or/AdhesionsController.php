<?php

namespace App\Http\Controllers\t2or;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adhesion;
use Auth;
use Carbon\Carbon;
use App\User;

class AdhesionsController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Adhesion Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the users adhesions.
  |
  */

  //Get all adhesions
  public function index()
  {
    if(Auth::user()->role == "admin" || Auth::user()->role == "st2or"):
        $data = Adhesion::all();
        foreach ($data as $adhesion) {
          $adhesion->user = User::findOrFail($adhesion->user);
        }
        return view('app.administration.adhesion')->with("data",$data);
    endif;
  }

  public function delete($id)
  {
    $adhesion = Adhesion::findOrFail($id);
    $adhesion->delete();
    return response()->json(["success" => "Adhesion supprimé avec succès"]);
  }

  public function ask($id)
  {
    $adhesion = Adhesion::whereUser($id)->get();
    if($adhesion->count()) :
      $adhesion[0]->is_new = true;
      $adhesion[0]->save();
    else :
      Adhesion::create([
          "user" =>Auth::user()->id,
          "is_new" => true,
          "date_demande" => Carbon::now(),
          "nombre_mois" => 1
        ]
      );
    endif;


    //return response()->json(['success' => "Votre demande a été reçu avec succès"]);
    return back()->with('success',"Votre demande a été reçu avec succès");
  }

  public function treat($id)
  {
    $adhesion = Adhesion::findOrFail($id);
    $adhesion->is_new = false;
    $adhesion->date_debut = date('Y-m-d',strtotime(Carbon::now()));
    $adhesion->nombre_mois = 1;
    $user = User::findOrFail($adhesion->user);
    $user->is_locked = false;
    $user->save();
    $adhesion->save();
    return response()->json(["success" => "Adhesion traité avec succès"]);
  }
}
