<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;
class CityController extends Controller
{
 
     public function index()
     {
        //$cities = City::with(['getState','getCountry'])->get();
        $pagination = City::with(['getState','getCountry'])->paginate(5);
        if($pagination){
         $data['staus_code'] = 200;
         //$data['data'] = $cities;
         $data['data'] = $pagination;
        }
        
        return $data;
     }

     public function create(Request $request)
     {
       $city_name = $request->city_name;
       $check = City::where('city_name',$city_name)->pluck('city_name')->toArray();
       if (!empty($check[0])) {
         $act_val = $check[0];
       } else {
         $act_val = '';
       }
       
       if ($act_val == $city_name) {
         $res =  response()->json('This city name is already exists');
       } else {
         $city = new City;
         $city->city_name=  $city_name;
         $city->state_id = $request->state_id;
         $city->country_id = $request->country_id;
         $city->save();
         $res =  response()->json('City Created successfully');
       }
       
       return $res;

     }

     public function show($id)
     {
        $states = City::find($id);

        return response()->json($states);
     }

     public function update(Request $request, $id)
     { 
     
       $city = City::find($id);
       $city->city_name= $request->city_name;
       $city->state_id = $request->state_id;
       $city->country_id = $request->country_id;
       $city->save();

        return response()->json('City Updated Successfully');
     }

     public function destroy($id)
     {
        $city = City::find($id);
        $city->delete();

        return response()->json('City Removed Successfully');
     }

}