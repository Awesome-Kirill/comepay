@extends('master')
@section('content')
    <h>Удаить этого сотрудника:</h>

    <form method="post" action="">

        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{$emp->last_name}} {{$emp->first_name}} " readonly>
        </div>







        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>

    @stop