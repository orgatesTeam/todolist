<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function create(Request $request){

        DB::table('users')->insert([
            [ 'user_name' => $request->user_name ,'e-mail' => $request->e-mail ,'password' => $request->password ]
        ]);

        DB::talbe('task')->insert([
           [ 'task_name' => $request->task_name ,'content' => $request->conten ,'time' => $request->time ]
        ]);
    }
}
