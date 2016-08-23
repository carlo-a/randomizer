<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class randomizer extends Controller
{
    //
    public function getRestaurants(){
      $restaurants = [];
      $restaurants = DB::table('restaurants')->orderBy('id')->get();
      echo json_encode($restaurants);
    }

    public function saveRestaurant($name,$location){
  		DB::table('restaurants')->insert(
  		    ['name' => $name, 'location' => $location]
  		);
    }

    public function getRestaurantsByLocation($location){
      $restaurants = [];
      $restaurants = DB::table('restaurants')->where('location','=',$location)->get();
      echo json_encode($restaurants);     
    }
}
