<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Don;
use App\Models\Rsd;
use App\Models\Pack;
use Illuminate\Support\Facades\Validator;
use Auth;
use Carbon\Carbon;

class DonsController extends Controller
{
    //
    public function index()
    {
      $data = Don::whereUser(Auth::user()->id)->get();
      $data->packs = Pack::all();
      foreach ($data as $da) {
        $da->pack = Pack::findOrFail($da->pack);
      }

      return view("app.backoffice.users.dons")->with("data",$data);
    }

    public function update(Request $request)
    {
       $currentUser = Auth::user();
       if(!$currentUser->is_locked):
         $rules = [
            "pack" => "required",
          ];

          $error = Validator::make($request->all(), $rules);

          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }

          $rsd = Rsd::whereDon($request->hidden_id)->get()->count();

          if($rsd == 0):
            $donInfo = Don::whereUser($currentUser->id)->latest()->take(1)->get();
            $checkPackInfo = Pack::findOrFail($donInfo[0]->pack);
            $checkPackInfo1 = Pack::findOrFail($request->pack);
            if($checkPackInfo->montant > $checkPackInfo1->montant) :
              return response()->json(["error" => "Le montant de votre don doit être superieur ou égal au votre don précédent"]);
            endif;


            $data = [
              "user" => $currentUser->id,
              "pack" => $request->pack,
            ];

            $don = Don::findOrFail($request->hidden_id);

            $don->update($data);

            return response()->json(["success" => "Information sur don mis à jour avec succès patientez pour votre fusion"]);
          endif;
       endif;
    }

    public function create(Request $request)
    {
       $currentUser = Auth::user();
       if(!$currentUser->is_locked):
         $rules = [
            "pack" => "required",
          ];

          $error = Validator::make($request->all(), $rules);



          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }
          $donInfo = Don::whereUser($currentUser->id)->latest()->take(1)->get();

          if($donInfo->count() > 0):
            $checkPackInfo = Pack::findOrFail($donInfo[0]->pack);
            $checkPackInfo1 = Pack::findOrFail($request->pack);

            if($checkPackInfo->montant > $checkPackInfo1->montant) :
              return response()->json(["error" => "Le montant de votre don doit être superieur ou égal au votre don précédent"]);
            endif;

            $time1 = (strtotime(Carbon::now()) - strtotime($donInfo[0]->created_at))/86400;

            if($time1 < 7 ):
              return response()->json(["error" => "Impossible d'effectuer un nouveau don pour cette semaine"]);
            endif;
          endif;

          $data = [
            "user" => $currentUser->id,
            "pack" => $request->pack,
          ];
          Don::create( $data);
          return response()->json(["success" => "Don ajouté avec succès patientez pour votre fusion"]);
       endif;
    }

    public function makeDonFusion()
    {
      $data = Don::whereStatut("Pas encore fusionner")->get();
      foreach ($data as $don) {
        $time1 = (strtotime(Carbon::now()) - strtotime($don->created_at))/86400;
        if($time1 === 3 ):
          //fusion effectuée
        endif;
      }
    }

  

    public function edit($id)
    {
      $rsd = Rsd::whereDon($id)->get()->count();
      if($rsd == 0):
        $don = Don::findOrFail($id);
        return response()->json(["data" => $don]);
      endif;
    }

    public function delete($id)
    {
      $rsd = Rsd::whereDon($id)->get()->count();
      if($rsd == 0):
        $don = Don::findOrFail($id);
        $don->forceDelete();
        return response()->json(["success" => "Don supprimé avec succès"]);
      endif;
    }
}
