<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
class TodoController extends parentController
{
    // creating function for save data
    // protected $task;

    // public function __construct(){
    //     // creating object accourding to the model
    //     $this->task=new Todo();
    // }

    public function index(){
        //This syntax is common in PHP for defining and accessing array elements.
        // $response['tasks']=$this->task->all();

        // calling todo facades
        $response['tasks']=TodoFacade::all();

         //dd($response);
        return view('pagers.todo.index')->with($response);
    }

    public function store(Request $request){
        // dd($request);
        // $this->task->create($request->all());

        TodoFacade::store($request->all());

        return redirect()->back();

        // return redirect()->route('todo.store');

        // add one by one without using model creation
        // $this->task->title = $request->title;
        // $this->task->save();
    }

    public function delete($task_id){

        TodoFacade::delete($task_id);

        // $task = $this->task->find($task_id);
        // $task->delete();
        // dd($task_id);

        return  redirect()->back();
    }

    public function done($task_id){

        TodoFacade::done($task_id);

        // $task= $this->task->find($task_id);
        // $task->sdone=1;
        // $task->update();

        return redirect()->back();
    }

    // public function edit(Request $request){
    //     //  dd($request);
    //     return view('pagers.todo.index')->with(TodoFacade::getup($request['task_id']));

    // }

    public function edit(Request $request){
        // return $request; // only return is working dd is not working 
        //this one also correct
        // $task = TodoFacade::get($request->task_id);
        //return view('pagers.todo.edit', compact('task'));

        $response['task']=TodoFacade::get($request['task_id']);        
        return view('pagers.todo.edit')->with($response);
    }


    public function update(Request $request, $task_id){
        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }

    public function sub($task_id){
         $response['task']=TodoFacade::get($task_id);
         $response['subTasks']=TodoFacade::getSubTask($task_id);
         return view('pagers.todo.sub')->with($response);
    }

    public function store_sub(Request $request){
        TodoFacade::store_sub($request->all());

        return redirect()->back();
    }
    
}
