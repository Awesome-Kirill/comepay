@extends('master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('store', ['id' => $emp->id])}}">

        <div class="form-group">
           <input type="text" name="first_name" class="form-control" placeholder="Имя" value="{{$emp->first_name}}" required>
        </div>

        <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Фамилия" value="{{$emp->last_name}}" required>
        </div>


        <div class="form-group">
            <input type="text" class="form-control" name="patronymic" placeholder="Отчество" value="{{$emp->patronymic}}">
        </div>

        <div class="form-group mx-sm-3 mb-2">
            <input type="number" name="salary" min="0" class="form-control" value="{{$emp->salary}}" placeholder="Зарплата" >
        </div>



        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="male"
                   @if ($emp->gender == 'male')
                   checked
                    @endif

            >
            <label class="form-check-label" for="exampleRadios1">
                Мужчина
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="female"

                   @if ($emp->gender == 'female')
                   checked
                    @endif
            >
            <label class="form-check-label" for="exampleRadios2">
                Женщина
            </label>
        </div>

        <div class="form-check">


            @foreach ($departments as $dep)

                <input type="checkbox" name="list[]"
                       @if (in_array($dep->id,$emp->departments->pluck('id')->toArray()))
                      checked
                       @endif

                       value="{{ $dep->id}}">{{ $dep->name}}
            @endforeach
        </div>




        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @stop