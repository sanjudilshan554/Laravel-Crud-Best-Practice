<form action="{{ route('todo.update', $task->id )}}" method="post" enctype="multipart/form">
    @csrf
    {{-- without csrf the form won't be work because the all requests are not take from backend (for security purpose)--}}
    <div class="row">
        <div class="col-lg-8">
            <input name="title" class="form-control form-control-lg" type="text" placeholder="add task" aria-label=".form-control-lg example" value="{{ $task->title }}">
        </div>
        <div class="col-lg-4">
            <button type="submit" class="form-control-lg btn btn-primary" >Update</button>
        </div>
    </div>
</form>