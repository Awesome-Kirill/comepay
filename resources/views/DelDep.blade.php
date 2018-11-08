@extends('master')
@section('content')
    <h>Delete departments</h>

    <form method="post" action="">

        <div class="form-group">
            <input type="text" name="name" class="form-control" value="NN" readonly>
        </div>



        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
    </body>
</html>
@stop