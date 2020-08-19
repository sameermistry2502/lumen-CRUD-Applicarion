<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller
{

     public function index()
     {
        $projects = Project::whereNotNull('type')->get();
        if($projects){
         $data['staus_code'] = 200;
         $data['data'] = $projects;
        }
        
        return $data;
     }

     public function create(Request $request)
     {
       
       $project = new Project;
       $project->parent_id= $request->parent_id;
       $project->name= $request->name;
       $project->type = $request->type;
       $project->industry= $request->industry;
       $project->desc= $request->desc;
       $project->save();

       return response()->json('project Created successfully');
     }

     public function show($id)
     {
        $project = Project::find($id);

        return response()->json($project);
     }

     public function update(Request $request, $id)
     { 

       $project= Project::find($id);
       $project->parent_id= $request->parent_id;
       $project->name= $request->name;
       $project->type = $request->type;
       $project->industry= $request->industry;
       $project->desc= $request->desc;
       $project->save();
       $res = "project Updated Successfully";
       $data['data'] = $res;
        return $data;
     }

     public function destroy($id)
     {
        $project = Project::find($id);
        $project->delete();

        return response()->json('project Removed Successfully');
     }

     public function get_inhouse_projects(){
        $projects = Project::where('parent_id',1)->whereNotNull('type')->get();
        
        if($projects){
         $data['staus_code'] = 200;
         $data['data'] = $projects;
        }
        
        return $data;
     }
     public function get_client_projects(){
        $projects = Project::where('parent_id',2)->whereNotNull('type')->get();
        
        if($projects){
         $data['staus_code'] = 200;
         $data['data'] = $projects;
        }
        
        return $data;
     }

}