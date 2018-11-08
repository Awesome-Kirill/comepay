@extends('master')
@section('content')
    <h>1Add Emp</h>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('store')}}">

        <div class="form-group">
           <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="Имя"  required>
        </div>

        <div class="form-group">
            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Фамилия"  required>
        </div>


        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('patronymic') }}" name="patronymic" placeholder="Отчество" >
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <input type="number" name="salary" value="{{ old('salary') }}" min="0" class="form-control"  placeholder="Зарплата">
        </div>



        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="male" checked>
            <label class="form-check-label" for="exampleRadios1">
                Мужчина
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="female">
            <label class="form-check-label" for="exampleRadios2">
                Женщина
            </label>
        </div>

        <div class="form-check">


            @foreach ($departments as $dep)

                <input type="checkbox" name="list[]" value="{{ $dep->id}}">{{ $dep->name}}
            @endforeach
        </div>




        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @stop