@extends('master')
@section('content')
<h>Add departments</h>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="store">

        <div class="form-group">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Название департамента" required>
        </div>







        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
