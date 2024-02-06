@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="todo-text">Sub tasks</h1>
           
            <h3>{{ $task->title}}</h3>
        </div>
        <div class="card">

            <div class="card-header">
                Sub Form
              </div>

            <form action="{{ route('todo.store.sub') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- without csrf the form won't be work because the all requests are not take from backend (for security purpose)--}}

                <div class="row mt-3 m-2">
                    <div class="col-lg-6">
                        <input name="sub_title" class="form-control form-control-lg" type="text" placeholder="add sub tasks title" aria-label=".form-control-lg example">
                    </div>

                    <div class="col-lg-6">
                        <input name="phone" class="form-control form-control-lg" type="text" placeholder="mobile number" aria-label=".form-control-lg example">
                    </div>  
                </div>

                <div class="row mt-3 m-2">
                    <div class="col-lg-4">
                        {{-- <input name="priority" class="form-control form-control-lg" type="text" placeholder="add sub tasks" aria-label=".form-control-lg example"> --}}
                        <select name="priority" id="" class="form-control">
                            <option value="1">Pririty 1</option>
                            <option value="2">Pririty 2</option>
                            <option value="3">Pririty 3</option>
                            <option value="4">Pririty 4</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <textarea name="note" class="form-control form-control-lg"  rows="1" cols="4" placeholder="note" aria-label=".form-control-lg example"> </textarea>
                    </div>  

                    <div class="col-lg-4">
                        <input name="date" class="form-control form-control-lg" type="date" placeholder="add sub tasks" aria-label=".form-control-lg example">
                    </div>  
                </div>


                <div class="col-lg-2 mt-3 m-2">
                    <input type="hidden" name="task_id" value={{ $task->id }}>
                    <button type="submit" class="form-control-lg btn btn-primary" >Submit</button>
                </div>

            </form>
        </div>    
        
        <div class="">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">sub title</th>
                    <th scope="col">phone</th>
                    <th scope="col">priority</th>
                    <th scope="col">date</th>
                    <th scope="col">task_id</th>
                  </tr>
                </thead>
                <tbody>
                        @foreach ($subTasks as $key => $subTask)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $subTask->sub_title }}</td>
                            <td>{{ $subTask->phone }}</td>
                            <td>{{ $subTask->priority }}</td>
                            <td>{{ $subTask->note }}</td>
                            <td>{{ $subTask->date }}</td>
                            <td>{{ $subTask->task_id }}</td>
                          </tr>
                        @endforeach   
                </tbody>
              </table>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="TaskEdit" tabindex="-1" aria-labelledby="TaskEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TaskEditLabel">Edit task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="taskEditContent">
            
        </div>
      </div>
    </div>
  </div>

@endsection

@push('css')
<style>
    .todo-text{
        padding-top: 10vh;
        color: rgb(134, 175, 19);
    }
</style>
@endpush

@push('js')

@endpush
