<?php

namespace App\Http\Controllers\t2or;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Log;
use App\Models\Residence;
use App\Models\Don;
use App\Models\Adhesion;
use App\Models\Pack;
use App\Models\Rsd;

class UsersController extends Controller
{
    // begin admin
    public function adminspace()
    {
      $data = User::whereRole("admin")->get();
      foreach ($data as $admin) {
        $admin->residence = Residence::findOrFail($admin->residence);
      }
      return view("app.backoffice.users.admins")->with('data',$data);
    }

    public function masterspace()
    {
      $data = User::whereRole("master")->get();
      foreach ($data as $master) {
        $master->residence = Residence::findOrFail($master->residence);
      }
      return view("app.backoffice.users.masters")->with('data',$data);
    }

    /**
     * Create a new admin user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function addAdmin(Request $request)
    {
      $rules = [
        "nom" => "required",
        "prenoms" => "required",
        "email" => "required|email|unique:users",
        "contact1" => "required|numeric",
        "password" => "required"
      ];

      $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
         return response()->json(['errors' => $error->errors()->all()]);
     }


      if(Auth::user()->role == "st2or"):
        $data = [
          'nom' => $request->nom,
          "prenoms" => $request->prenoms,
          "is_locked" => false ,
          "lien_parainage" => "nothing" ,
          "photo" => NULL,
          "residence" => "1",
          'email' => $request->email,
          "date2naissance" => "2020-07-21",
          'password' => Hash::make($request->password),
          "contact1" => "".$request->contact1,
          "contact2" => $request->contact1,
          "perfect_money" => $request->contact1,
          'role' => "admin"
        ];
        User::create($data);
        return back()->with("success","Administrateur enregistré avec succès");
      else :
        return back()->with("error","Vous n'êtes pas autorisé à exécutez une telle action");
      endif;
    }

    //bloquer ou debloquer Utilisateur
    public function lockOrUnlockUser($id)
    {
      $user = User::findOrFail($id);
      $status = "";
      if($user->is_locked) :
        $user->is_locked = false;
        $status = "bloqué";
      else :
        $user->is_locked = true;
        $status = "débloqué";
      endif;
      $user->save();
      return response()->json(["success" => "Utilisateur ".$user->email.' '.$status. " avec succès"]);
      //return back()->with("success","Utilisateur ".$user->email.' '.$status. " avec succès");
    }

    public function deleteAdmin($id)
    {
       $test = Log::whereUser($id)->get();
       $user = User::findOrFail($id);

       if($test->count() > 0):
         $user->withTrashed()->whereId($id)->get();
      else:
         $user->forceDelete();
      endif;

      return response()->json(["success" => "Administrateur supprimé avec succès"]);

      //return back()->with("success","Administrateur supprimé avec succès");
    }
    //End of admin management

    //master management
    public function addMaster(Request $request)
    {
      $rules = [
        "nom" => "required",
        "prenoms" => "required",
        "email" => "required|email|unique:users",
        "contact1" => "required|numeric",
        "password" => "required"
      ];

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
          return response()->json(['errors' => $error->errors()->all()]);
      }
      $count = User::whereRole('master')->get()->count();
      if($count <= 10) :
        $user = User::whereEmail($request->email)->get();
        if($user->count() > 0) :
          $data = User::findOrFail($user[0]->id);
          $data->role = "master";
          $data->lien_parainage = self::master_link();
          $data->save();
        else :
          $data = [
            'nom' => $request->nom,
            "prenoms" => $request->prenoms,
            "is_locked" => false ,
            "lien_parainage" => self::master_link(),
            "photo" => NULL,
            "residence" => "1",
            'email' => $request->email,
            "date2naissance" => "2020-07-21",
            'password' => Hash::make($request->password),
            "contact1" => $request->contact1,
            "contact2" => $request->contact1,
            "perfect_money" => $request->contact1,
            'role' => "master"
          ];
          User::create($data);
        endif;
        Log::create([
          "user" => Auth::user()->id,
          "action" => "Création d'un nouveau master"
        ]);
        return response()->json(["success" => "Master ajouté avec succès"]);
      else :
        return response()->json(["error" => "Nombre maximale de master atteint"]);
      endif;
    }

    public function deleteMaster($id)
    {
      $user = User::findOrFail($id);

      $dons = $user->dons()->count();
      $rsds = $user->rsds()->count();
      $gains = $user->gains()->count();
      $adhesions = $user->adhesion()->count();

      if($dons > 0 || $rsds > 0 || $gains > 0 || $adhesions > 0):
        $user->withTrashed()->whereId($id)->get();
     else:
        $user->forceDelete();
     endif;
     Log::create([
       "user" => Auth::user()->id,
       "action" => "Création d'un nouveau master"
     ]);
    }

    private function master_link()
    {
      $string = "";
      $user_ramdom_key = "(aLABbC0cEd1[eDf2FghR3ij4kYXQl5Um-OPn6pVq7rJs8*tuW9I+vGw@xHTy&#)K]Z%§!M_S";
      srand((double)microtime()*time());
      for($i=0; $i<20; $i++) {
        $string .= $user_ramdom_key[rand()%strlen($user_ramdom_key)];
      }

      if(User::whereLienParainage($string)->get()->count() > 0) :
        $string = "";
        for($i=0; $i<20; $i++) {
          $string .= $user_ramdom_key[rand()%strlen($user_ramdom_key)];
        }
      endif;
      return $string;
    }

    public function filleulesList($link)
    {
      $data = User::whereLienParainageAndRole($link,"suse")->get();
      $data->parain_id = User::whereLienParainageAndRole($link,"master")->first()->id;
      foreach ($data as $user) {
        $user->residence = Residence::findOrFail($user->residence);
      }
      return view("app.backoffice.users.filleules")->with('data',$data);
    }

    public function parrainspace()
    {
      $data = User::whereLienParainageAndRole(Auth::user()->lien_parainage,"suse")->get();
      $data->bonus = Auth::user()->gains;
      foreach ($data->bonus as $bonus) {
         $bonus->don = Don::findOrFail($bonus->don);
         $bonus->don->user = User::findOrFail($bonus->don->user);
      }
      return view("app.backoffice.users.parrain")->with('data',$data);
    }

    public function regUser($link)
    {
      $residences = Residence::all();
      return view('auth.register')->with(['link' => $link,"residences" => $residences ]);
    }

    public function checkAdhesions()
    {
      //$adhesion = Adhesion::whereUser($user)->get()->first();
      $adhesions = Adhesion::all();

      foreach($adhesions as $adhesion) :
        if((strtotime($adhesion->date_debut) - strtotime(Carbon::now()))/86400 < 30) :
          $user = User::findOrFail($adhesion->user);
          $user->is_locked = true;
          $user->save();
          $adhesion->nombre_mois = 0;
          $adhesion->save();
        endif;
      endforeach;
    }

    public function autoExecution()
    {
        self::checkAdhesions();
        self::fusionsMake();
        self::majAutoMise();
    }

    public function fusionsMake()
    {
      $lesDons = Don::whereStatutOrStatut("Pas encore fusionner","fusionner à envoyer")->get();
      $fusions = [];
      $i = 0;
      foreach ($lesDons as $don) :
        if (((strtotime(Carbon::now()) - strtotime($don))/86400) >= 3) :
          foreach($lesDons as $don2) :
            if($don2->statut == "Pas encore fusionner"):
              if($don->id != $don2->id) :
                if($don->user != $don2->user) :
                  $cursd = Rsd::whereUser($don->user)->get()->count();
                  if( $cursd < 2 ):
                    if($cursd == 1):
                      if(((strtotime(Carbon::now()) - strtotime($don))/86400) == 7):
                        $fusions[$i] = [
                          'don' => $don2->id,
                          "user" => $don->user,
                        ];
                        $don2->statut = "fusionner à envoyer";
                      endif;
                    else :
                      $fusions[$i] = [
                        'don' => $don2->id,
                        "user" => $don->user,
                      ];
                      $don2->statut = "fusionner à envoyer";
                    endif;
                  endif;
                endif;
              endif;
            endif;
          endforeach;
        endif;
        $i++;
      endforeach;

      foreach($fusions as $fusion) :
        $mt = Don::findOrFail($fusion["don"]);
        $montant = Pack::findOrFail($mt->pack)->montant - Pack::findOrFail($mt->pack)->montant *10 /100 ;
        $data = [
          "statut" => "none",
          "montant" => $montant,
          "don" => $fusion['don'],
          'user' => $fusion['user']
        ];
        Rsd::create($data);
        $mt->statut = "fusionner à envoyer";
      endforeach;
      //dd($fusions);
    }

    public function donateurs()
    {
      $data = User::whereRole('suse')->get();
      foreach($data as $user) :
        $user->residence = Residence::findOrFail($user->residence);
      endforeach;
      return view('app.backoffice.users.donateurs')->with('data',$data);
    }

    public function majAutoMise()
    {
        $rsds = Rsd::whereStatutOrStatut("full","partial")->get();
        $now   = time();

        foreach($rsds as $rsd):
          $diff = abs($now - strtotime($rsd->date_reception));
          $retour = array();

          $tmp = $diff;
          $retour['second'] = $tmp % 60;

          $tmp = floor( ($tmp - $retour['second']) /60 );
          $retour['minute'] = $tmp % 60;
          $tmp = floor( ($tmp - $retour['minute'])/60 );
          $retour['hour'] = $tmp % 24;

          $tmp = floor( ($tmp - $retour['hour'])/24 );
          $retour['day'] = $tmp;

          if($retour["minute"] >= 30):
            $don = Don::whereUser($rsd->user)->latest()->take(1)->get();
            if((((strtotime(Carbon::now()) - strtotime($don[0]->updated))/86400) < 1)) :
              $data = [
                "user" => $rsd->user,
                "pack" => $don[0]->pack,
              ];
              Don::create( $data);
            endif;
          endif;
        endforeach;
      }
}
