<?php

namespace App\Http\Controllers;

use App\State;
use App\Country;
use Illuminate\Http\Request;
class StateController extends Controller
{

     public function index()
     {
        $states = State::with('goForCountry')->get();
        if($states){
         $data['staus_code'] = 200;
         $data['data'] = $states;
        }
        
        return $data;
     }

     public function create(Request $request)
     {
       $state_name = $request->state_name;
       $check = State::where('state_name',$state_name)->pluck('state_name')->toArray();
       if (!empty($check[0])) {
         $act_val = $check[0];
       } else {
         $act_val = '';
       }
       
       if ($act_val == $state_name) {
         $res =  'This State name is already exists';
       } else {
         $state = new State;
         $state->state_name=  $state_name;
         $state->country_id = $request->country_id;
         $state->save();
         $res =  'State Created successfully';
       }
       
       return $res;

     }

     public function show($id)
     {
        $states = State::find($id);

        return response()->json($states);
     }

     public function update(Request $request, $id)
     { 
     
       $state = State::find($id);
       $state->state_name= $request->state_name;
       $state->country_id = $request->country_id;
       $state->save();

        return response()->json('State Updated Successfully');
     }

     public function delete_state($id)
     {
      return $id;
        $state = State::find($id);
        $state->delete();
        return 'State Removed Successfully';
     }

}