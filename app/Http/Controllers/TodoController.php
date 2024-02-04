<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends parentController
{
    // creating function for save data
    protected $task;

    // public function __construct(){
    //     // creating object accourding to the model
    //     $this->task=new Todo();
    // }

    public function index(){
        //This syntax is common in PHP for defining and accessing array elements.
        // $response['tasks']=$this->task->all();
        $response['tasks']=Todo::all();

         //dd($response);
        return view('pagers.todo.index')->with($response);
    }

    public function store(Request $request){
        // dd($request);
        $this->task->create($request->all());

        return redirect()->back();
        // return redirect()->route('todo.store');

        // add one by one without using model creation
        // $this->task->title = $request->title;
        // $this->task->save();
    }

    public function delete($task_id){
        $task = $this->task->find($task_id);
        $task->delete();
        // dd($task_id);

        return  redirect()->back();
    }

    public function done($task_id){
        $task= $this->task->find($task_id);
        $task->sdone=1;
        $task->update();

        return redirect()->back();
    }
}
