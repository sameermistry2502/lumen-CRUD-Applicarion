<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Pagination;
class CountryController extends Controller
{

     public function index()
     {
        $contries = Country::all();
        if($contries){
         $data['staus_code'] = 200;
         $data['data'] = $contries;
        }
        
        return $data;
     }

     public function create(Request $request)
     {
       
       $country = new Country;
       $country->iso= $request->iso;
       $country->name= $request->name;
       $country->nicename = $request->nicename;
       $country->iso3= $request->iso3;
       $country->numcode= $request->numcode;
       $country->phonecode= $request->phonecode;
       $country->save();

       return response()->json('Country Created successfully');
     }

     public function show($id)
     {
        $country = Country::find($id);

        return response()->json($country);
     }

     public function update(Request $request, $id)
     { 

       $country= Country::find($id);
       $country->iso= $request->iso;
       $country->name= $request->name;
       $country->nicename = $request->nicename;
       $country->iso3= $request->iso3;
       $country->numcode= $request->numcode;
       $country->phonecode= $request->phonecode;
       $country->save();
       $res = "Country Updated Successfully";
       $data['data'] = $res;
        return $data;
     }

     public function destroy($id)
     {
        $country = Country::find($id);
        $country->delete();

        return response()->json('Country Removed Successfully');
     }

}