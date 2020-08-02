<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::get("/test",[
  "as" => "",
  "uses" => "t2or\UsersController@autoExecution"
]);*/

Route::get("/chart",function(){
  return view("sites  .chart");
})->name('chart');

Route::group(["middleware" => "auth"],function(){
    Route::group(["namespace" => "t2or"],function(){
        Route::get('/dashboard',[
          "as" => "dashboard",
          "uses" => "AdministrationController@dashboard"
        ]);
        Route::get("/m-exec",[
          "as" => "",
          "uses" => "UsersController@autoExecution"
        ]);

        Route::get('/home', 'AdministrationController@dashboard')->name('home');
        Route::group(["prefix" => "adhesions"],function(){
          Route::get("/",[
            "as" => "adhesions",
            "uses" => "AdhesionsController@index"
          ]);
          Route::get("/ask/{id}",[
            "as" => "adhesion.ask",
            "uses" => "AdhesionsController@ask"
          ]);
          Route::get("/delete/{id}",[
            "as" => "adhesions.delete",
            "uses" => "AdhesionsController@delete"
          ]);

          Route::get("/treat/{id}",[
            "as" => "adhesions.treat",
            "uses" => "AdhesionsController@treat"
          ]);

        });
        //Gestion des administrateurs
        Route::group(["prefix" => "administrateurs"],function(){
              Route::get("/",[
                "as" => "administrators",
                "uses" => "UsersController@adminspace"
              ]);
              Route::post("/add",[
                "as" => "administrator.add",
                "uses" => "UsersController@addAdmin"
              ]);
              Route::get("/lou/{id}",[
                "as" => "administrator.lou",
                "uses" => "UsersController@lockOrUnlockUser"
              ]);
              Route::get("/deleteAdmin/{id}",[
                "as" => "administrator.delete",
                "uses" => "UsersController@deleteAdmin"
              ]);
        });

        Route::group(["prefix" => "donateurs"],function(){
          Route::get("/","UsersController@donateurs")->name('donateurs');
        });

        Route::group(["prefix" => "masters"],function(){
            Route::get("/",[
              "as" => "masters",
              "uses" => "UsersController@masterspace"
            ]);

            Route::post("/add",[
              "as" => "master.add",
              "uses" => "UsersController@addMaster"
            ]);

            Route::get("/deleteMasters/{id}",[
              "as" => "master.delete",
              "uses" => "UsersController@deleteMaster"
            ]);

            Route::get("/list-filleules/{link}",[
              "as" => "master.link",
              "uses" => "UsersController@filleulesList"
            ]);
        });

        Route::group(["prefix" => "packs"],function(){
          Route::get("/",[
            "as" => "packs",
            "uses" => "PacksController@index"
          ]);
          Route::post("/add",[
            "as" => "pack.create",
            "uses" => "PacksController@create"
          ]);
          Route::get("/edit/{id}",[
            "as" => "packs.edit",
            "uses" => "PacksController@edit"
          ]);
          Route::post("/update",[
            "as" => "pack.update",
            "uses" => "PacksController@update"
          ]);
          Route::get("/delete/{id}",[
            "as" => "pack.delete",
            "uses" => "PacksController@delete"
          ]);
        });

    });

    Route::get("/parrains",[
      "as" => "parrains",
      "uses" => "t2or\UsersController@parrainspace"
    ]);

    Route::group(["prefix" => "dons"],function(){
      Route::get("/",[
        "as" => "dons",
        'uses' => "DonsController@index"
      ]);
      Route::post("/create",[
        "as" => "don.add",
        'uses' => "DonsController@create"
      ]);
      Route::post("/update",[
        "as" => "don.update",
        'uses' => "DonsController@update"
      ]);
      Route::get("/edit/{id}",[
        "as" => "dons.edit",
        'uses' => "DonsController@edit"
      ]);
      Route::get("/delete/{id}",[
        "as" => "dons.delete",
        'uses' => "DonsController@delete"
      ]);
    });


    Route::group(["prefix" => "rsds"],function(){
      Route::get("/",[
        "as" => "rsds",
        'uses' => "RsdsController@index"
      ]);
      Route::get("/edit/{id}",[
        "as" => "rsds.edit",
        'uses' => "RsdsController@edit"
      ]);
      Route::get("/delete/{id}",[
        "as" => "rsds.delete",
        'uses' => "RsdsController@delete"
      ]);
    });

});
Route::get("/register/{link}",[
  "as" => "reg",
  "uses" => "t2or\UsersController@regUser"
]);
Route::post("/user/create",[
  "as" => "user.register",
  "uses" => "Auth\RegisterController@addSuser"
]);

Auth::routes();

Route::get("/about",function(){
  return view('about');
});

Route::get("/register",function(){

});

//Route::get('/reg-st2or',"Auth\RegisterController@stoorAdd");
