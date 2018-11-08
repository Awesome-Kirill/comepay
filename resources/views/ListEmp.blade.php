@extends('master')
@section('content')

    @if (Session::has('message'))

        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Отчество</th>
            <th scope="col">Пол</th>
            <th scope="col">Зарплата</th>
            <th scope="col">Департаменты</th>
            <th scope="col">Редактировать/Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $emp)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$emp->first_name}}</td>
                <td>{{$emp->last_name}}</td>
                <td>{{$emp->patronymic}}</td>
                <td>{{$emp->gender}}</td>
                <td>{{$emp->salary}}</td>
                <td>
                    @foreach ($emp->departments as $dep)
                        {{$dep->name}} |
                    @endforeach
                </td>
                <td><a href="{{route('update', ['id' => $emp->id])}}" class="btn btn-primary btn-sm">Ред</a>
                    <a href="{{route('delete', ['id' => $emp->id])}}"  class="btn btn-danger btn-sm">x</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
