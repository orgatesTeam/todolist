<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;  // 驗證器

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //抓取資料
        $students = Student::orderBy('id','desc')->get();
        return view('students.index',['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 接收輸入資料
        $input = $request->all();

        // 驗證規則
        $rules = [
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email'
            ],
            'fb' => [
                'required'
            ],
            'mobile' => [
                'required'
            ]
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return redirect('/students/create')->withErrors($validator)->withInput();
        }

        //寫入資料
        Student::create($input);

        // 紀錄儲存成功訊息
        $request->session()->flash('message', $input['name'] . ' added successfully!');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::find($id);
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $student = Student::find($id);

        // 接收資料
        $input = $request->all();

        $student->update($input);

        // 紀錄更新成功訊息
        $request->session()->flash('message', $input['name'] . ' updated successfully!');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
