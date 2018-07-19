<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\UTRelation;

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
        $task->uer_id = $user->id;
        $task->save();

        $utr = new UTRelation();

        $utr->uer_id = $user->id;
        $utr->task_id = $task->id;
        $utr->save();

    }
}
