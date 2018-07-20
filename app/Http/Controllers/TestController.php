<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Task;
use \App\UTRelation;

class TestController extends Controller
{
    public function create(Request $request){

        $user = new User();

        $user->user_name = $request->user_name;
        $user->e_mail = $request->e_mail;
        $user->password = $request->password;
        $user->save();

        $task = new Task();

        $task->task_name = $request->task_name;
        $task->contents = $request->contents;
        $task->time = $request->time;
        $task->user_id = $user->id;
        $task->save();

        $utr = new UTRelation();

        $utr->user_id = $user->id;
        $utr->task_id = $task->id;
        $utr->save();
    }

    public function research(Request $request){

        $tasks = User::find($request->id)->tasks;

        return response()->json($tasks);
    }

    public function destroy(Request $request){

        $task = Task::find($request->id);

        $task->delete();
    }

    public function update(Request $request){

        $input = $request->only('user_name','e_mail','password');

        User::find($request->id)->update($input);

        $input = $request->only('task_name','contents','time');
        
        Task::where('user_id','=',$request->id)->update($input);

    }

}
