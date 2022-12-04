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
    public function assignmentNew(Request $request){
        $blogs = BlogPost::orderBy('order','ASC')->get();
        return view('website.assignment.new-assignment',compact('blogs'));
    }
    public function updateOrder(Request $request)
    {
      
        $blogs = BlogPost::all();

        foreach ($blogs as $blog) {
            $blog->timestamps = true; // To disable update_at field updation
            $id = $blog->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $blog->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
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
           
            // return back();
    }
}
