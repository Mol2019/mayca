<?php

namespace App\Http\Controllers\t2or;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Log;
use App\Models\Adhesion;
use App\Models\Rsd;
use App\Models\Gain;


class AdministrationController extends Controller
{
    private $currentUserInfo = NULL;

    //load user dashboard
    public function dashboard()
    {
      $currentUserInfo = Auth::user();
      $tableViews = ["st2","admin","master","suse"];
      $data = array();
      $view = "app.administration.";

      switch ($currentUserInfo->role) {
        case 'st2or': $view .= $tableViews[0];
                      $logs = Log::all();

                      foreach($logs as $log) :
                        $user = User::findOrFail($log->user);
                        $log->user = $user->email ;
                      endforeach;

                      $data = [
                          "adhesionNrCount" => Adhesion::whereisNew(true)->get()->count(),
                          "userCount" => User::all()->count() - 1,
                          "visitorsCount" => 0,
                          "leadersCount" => User::whereRole('master')->get()->count(),
                          "adminsCount" => User::whereRole('admin')->get()->count(),
                          "logs" => $logs
                      ];
                  break;
        case 'admin':
                      $view .= $tableViews[1];
                      $user = User::whereRole("st2or")->get();

                      $gains = Gain::whereUser($user[0]->id);

                      $montant = 0;
                      foreach ($gains as $gain) {
                        $montant += $gain->montant;
                      }
                      $data = [
                          "adhesionNrCount" => Adhesion::whereisNew(true)->get()->count(),
                          "userCount" => User::all()->count() - 1,
                          "bonus" => $montant,
                          "leadersCount" => User::whereRole('master')->get()->count(),
                      ];
                      break;
        case 'master': $view .= $tableViews[2];
                            $gain = 0;
                            $rsdiw = 0;
                            $i = 0;


                            foreach ($currentUserInfo->gains() as $bonus) {
                              $gain += $bonus->montant;
                            }

                            foreach ($currentUserInfo->rsds() as $rsd) {
                              if($rsd->statut != "none" || $rsd->statut != "partial") :
                                $rsdiw += i;
                                $i++;
                              endif;
                            }

                            $data = [
                               "lienParainage" => $currentUserInfo->lien_parainage,
                               "filleulesCount" => User::whereLienParainageAndRole($currentUserInfo->lien_parainage,"suse")->count(),
                               'leadersCount' => $gain,
                               "rsdsCount" => $rsdiw
                            ];
                            break;
        case 'suse': $view .= $tableViews[3];
                      $data = [
                          "rsdCount" => Rsd::whereUser($currentUserInfo->id)->get()->count(),
                          "fusionCount" => "0",
                        ];
                      break;
        default: break;
      }
      $view .="dashboard";

      return view($view)->with("data",$data);


      /*if($currentUserInfo->role == "st2or" ):
        return view('app.administration.st2dashboard');
      elseif($currentUserInfo->role == "admin") :
      endif;*/
    }
}
