@extends('master')
@section('content')
<table class="table">
                <thead>
                <tr>
                    <th scope="col">Сотрудник/Департамент</th>
                    @foreach ($allDepartment as $dep)
                        <th scope="col">{{$dep->name}}</th>
                    @endforeach


                </tr>
                </thead>
                <tbody>

                @foreach ($allEmployees as $emp)
                    <tr>
                        <th scope="row">{{$emp->first_name}} {{$emp->last_name}}</th>
                        @foreach ($allDepartment as $real)
                            <td>
                                @if (in_array($real->name,$emp->departments->pluck('name')->toArray()))

                                    +
                                @else

                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
</tbody>
@stop
