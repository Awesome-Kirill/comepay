@extends('master')
@section('content')
    @if (Session::has('message'))

        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название отедла</th>
            <th scope="col">Кол-во работников</th>
            <th scope="col">Макс зарплата</th>
            <th scope="col">Редактировать/Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($allDep as $dep)

            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$dep->name}}</td>
                <td>{{count($dep->employee)}}</td>
                <td>{{$dep->maxSalary()}}</td>
                <td><a href="{{route('update-dep', ['id' => $dep->id])}}" class="btn btn-primary btn-sm">Ред</a>
                    <a href="{{route('delete-dep', ['id' => $dep->id])}}"  class="btn btn-danger btn-sm">x</a></td>
            </tr>
        @endforeach


        </tbody>
    </table>
@stop
