@extends('master')
@section('content')

    <h>Upd departments</h>

    <form method="post" action="{{route('store-dep', ['id' => $dep->id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{$dep->name}}" >
        </div>



        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@stop
