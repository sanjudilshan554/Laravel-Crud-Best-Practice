@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="todo-text">home</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- without csrf the form won't be work because the all requests are not take from backend (for security purpose)--}}
                <div class="row">
                    <div class="col-lg-8">
                        <input name="title" class="form-control form-control-lg" type="text" placeholder="add task" aria-label=".form-control-lg example">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="form-control-lg btn btn-primary" >Submit</button>
                    </div>
                </div>
            </form>
        </div>    
        
        <div class="">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                      <tr>
                        <td scope="row">{{ $key++ }}</td>
                        <td>{{ $task->title }}</td>

                        <td>
                            @if ($task->sdone == 0)
                                <span class="badge bg-danger">not completed</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success">done</a>
                            <a href="javascript:void[0]" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TaskEdit" onclick="taskEditModel({{ $task->id }})">edit</a>
                            <a href="{{ route('todo.sub',$task->id) }}" class="btn btn-dark">done</a>
                        </td>
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
    <script>
        function taskEditModel(task_id){
            console.log("taskEditModel function called with task_id: " + task_id);
    var data = {
        task_id: task_id,
    };
    $.ajax({
        url: "{{route('todo.edit')}}",
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: 'html',
        data: data,
        success:function (response){
            $('#TaskEdit').modal('show');
            $('#taskEditContent').html(response);
        }
    });
}
    </script>
@endpush
