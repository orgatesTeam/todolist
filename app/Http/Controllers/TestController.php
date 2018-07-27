<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Task;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function store($id, Request $request){

        $validator = Validator::make($request->all(),[
            'time' => 'date|filled',
            'task_name' => 'min:4|filled',
            'contents' => 'filled'
        ]);

       if($validator->fails()){
            return response()->json($validator->errors());
        }

        $task = new Task();

        $task->task_name = $request->task_name;
        $task->contents = $request->contents;
        $task->time = $request->time;
        $task->user_id = $id;

        $task->save();

    }

    public function research($id){

        $tasks = User::find($id)->tasks;

        return response()->json($tasks);
    }

    public function destroy($id){

        $task = Task::find($id);

        $task->delete();
    }

    public function update($id, Request $request){

       $validator = $request->validate([
            'e_mail' => 'email',
            'date' => 'date',
            'user_name' => 'min:4',
            'task_name' => 'min:4',
            'password' => 'min:6|alpha_num'
        ]);

       if($validator->fail()){
           return response()->json($validator->errors());
       }

        $input_user = $request->only('user_name','e_mail','password');

        User::find($id)->update($input_user);

        $input_task = $request->only('task_name','contents','time');

        Task::where('user_id','=',$id)->update($input_task);

    }

}
