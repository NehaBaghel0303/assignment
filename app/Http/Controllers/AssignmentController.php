<?php

namespace App\Http\Controllers;
use App\Assignment;
use App\BlogPost;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function assignmentIndex(Request $request){
        $records = Assignment::all();
        return view('website.assignment.index',compact('records'));
    }
    public function assignmentStore(Request $request){
        
        foreach($request['data'] as $item){
            Assignment::create([
                'title' => $item['title'],
            ]);  
        }
        $records = Assignment::all();
            if(request()->ajax()){
                return response()->json(
                    [
                        'records' => $records,
                        'showData' => view('website.assignment.include.data',compact('records'))->render(),
                        'message' => 'Success',
                        'title' => 'Record Created Successfully!'
                    ]
                );
            }
    }
}
