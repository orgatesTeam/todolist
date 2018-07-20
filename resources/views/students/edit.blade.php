@extends('students.templates.master')

@section('content')
    
    <h2>Edit</h2>
    <hr>
    <a class="waves-effect waves-light btn blue" href="{{ url('/') }}">Read Data</a>

    <div class="row">

        {{-- 顯示必填欄位訊息 --}}
        @if ($errors->any())
        <div class="card-panel red lighten-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/students/{{ $student->id }}" method="post" class="col s12">
            {{-- csrf欄位 --}}
            {{ csrf_field() }}

            {{ method_field('PUT') }}
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name" name="name" type="text" class="validate" value="{{ $student->name }}">
                    <label for="name">Name</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" name="email" type="email" class="validate" value="{{ $student->email }}">
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">people</i>
                    <input id="fb" name="fb" type="text" class="validate" value="{{ $student->fb }}">
                    <label for="fb">Facebook</label>
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone_iphone</i>
                    <input id="mobile" name="mobile" type="text" class="validate" value="{{ $student->mobile }}">
                    <label for="mobile">Mobile</label>
                </div>
            </div>

            <button type="submit" class="btn waves-effect waves-light">Update</button>

        </form>
    </div>
@endsection