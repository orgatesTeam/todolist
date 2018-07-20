@extends('students.templates.master')

@section('content')
    <h2>CRUD DEMO</h2>
    <hr>
    <a class="waves-effect waves-light btn blue" href="{{ url('/students/create') }}">Create New</a>

    {{-- 顯示訊息 --}}
    @if (Session::has('message'))
        <div>
            <p class="card-panel teal lighten-2">{{ Session::get('message') }}</p>
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th class="center-align">No</th>
                <th class="center-align">Name</th>
                <th class="center-align">Email</th>
                <th class="center-align">Facebook</th>
                <th class="center-align">Mobile</th>
                <th class="center-align">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($students as $student)
                <tr>
                    {{-- 使用 $loop->iteration 當前迴圈迭代數（從1開始） --}}
                    <td class="center-align"> {{ $loop->iteration }} </td>
                    <td class="center-align"> {{ $student->name }} </td>
                    <td class="center-align"> {{ $student->email }} </td>
                    <td class="center-align"> {{ $student->fb }} </td>
                    <td class="center-align"> {{ $student->mobile }} </td>
                    <td class="center-align">
                        <a class="waves-effect waves-light btn" href="{{ url("/students/$student->id/edit") }}">Edit</a>
                        <form action="{{ url("/students/$student->id") }}" method="post" id="form2">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            {{-- <a class="waves-effect waves-light btn red lighten-1" href="javascript:void(0);" onclick="$('#form2').submit()">Delete</a> --}}
                            <button class="waves-effect waves-light btn red lighten-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection