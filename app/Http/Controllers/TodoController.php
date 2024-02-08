<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

        $userInd=Auth::user();
            // if( $userInd->hasRole('admin')){ //checking users by rows
            //     // calling todo facades
            //     $response['tasks']=TodoFacade::all();
            //     return view('pagers.todo.index')->with($response);
            // }else{
            //     dd("doesn't have any permission to access this");
            // }

            if( $userInd->hasPermissionTo('view_todo')){ //checking users by rows
                // calling todo facades
                $response['tasks']=TodoFacade::all();
                return view('pagers.todo.index')->with($response);
            }else{
                dd("doesn't have any permission to access this");
            }
        
       

         //dd($response);
        
    }

    public function store(Request $request){
        // dd($request);

        // $this->task->create($request->all());

        $user=Auth::user();

        if($user->hasPermissionTo('create_todo')){
            TodoFacade::store($request->all());;
            return redirect()->back();
        }else{
            dd('sorry you cant access');
        }

        // To run user roles(Give the access with the model/role) and use auth in parent controller
        // $role = Role::create(['name' => 'admin']);
        // $role = Role::create(['name' => 'sub_admin']);
        // $role = Role::create(['name' => 'user']);

        // create permission
        // $permission = Permission::create(['name' => 'view_todo']);
        // $permission = Permission::create(['name' => 'create_todo']);
        // $permission = Permission::create(['name' => 'update_todo']);
        // $permission = Permission::create(['name' => 'delete_todo']);
        // $permission = Permission::create(['name' => 'done_todo']);
        // TodoFacade::store($request->all());

        // assigning users
        // $admin = User::find(1);
        // $sub_admin=User::find(4);
        // $user=User::find(3);
        // $super_admin=User::find(5);
        
        // // assign roles to user
        // $admin->assignRole('admin');
        // $sub_admin->assignRole('sub_admin');
        // $user->assignRole('user');

        // Get roles
        // $role_admin=role::where('name','admin')->first();
        // $role_sub_admin=role::where('name','sub_admin')->first();
        // $role_user=role::where('name','user')->first();

        // $role_admin->givePermissionTo('view_todo');
        // $role_admin->givePermissionTo('create_todo');
        // $role_admin->givePermissionTo('update_todo');
        // $role_admin->givePermissionTo('delete_todo');

        // $role_sub_admin->givePermissionTo('view_todo');
        // $role_sub_admin->givePermissionTo('create_todo');
        // $role_sub_admin->givePermissionTo('update_todo');

        // $role_user->givePermissionTo('view_todo');

       

        // return redirect()->route('todo.store');

        // add one by one without using model creation
        // $this->task->title = $request->title;
        // $this->task->save();
    }

    public function delete($task_id){

        $user=Auth::user();
        if($user->hasPermissionTo('delete_todo')){
            TodoFacade::delete($task_id);
            return  redirect()->back();
        }else{
            dd('not access');
        }

        // $task = $this->task->find($task_id);
        // $task->delete();
        // dd($task_id);

        
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

        $user=Auth::user();
        if($user->hasPermissionTo('update_todo')){
            TodoFacade::update($request->all(), $task_id);
            return redirect()->back();}else{
                dd("not access");
            }
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
