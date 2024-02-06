<?php
    namespace domain\Services;

    use App\Models\Todo;
    use Illuminate\Http\Request;
    
    class TodoService{

    protected $task;

    public function __construct(){

        $this->task=new Todo();

    }

    public  function all(){

        return $this->task->all();

    }

    public function store($data){

        $this->task->create($data);

    }

    public function delete($task_id){

        $task = $this->task->find($task_id);
        $task->delete();

    }

    public function done($task_id){

        $task= $this->task->find($task_id);
        $task->sdone=1;
        $task->update();

        }

        public function get($task_id){
            return $task= $this->task->find($task_id); //should the return value 
        }

        // public static function get($task_id){
        //       return Todo::find($task_id);
        // }


        public function update(array $data,$task_id){
            $task=$this->task->find($task_id);
            $task->update($this->edit($task,$data));

            // $task->title = $data['title'];
            // $task->update();
        }

        protected function edit(Todo $task, $data){
            return array_merge($task->toArray(), $data);
        }
    }

    