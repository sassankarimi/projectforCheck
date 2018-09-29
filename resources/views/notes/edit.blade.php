@extends('layout')

@section('content')

  <h1>Update  Note</h1>
    <form class="form-group " method="POST" action="../{{$note->id}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <textarea name="text" class="form-control">{{$note->body}}</textarea>
        </div>
            @can('update',$note)
            <div class="form-group">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        @endcan
    </form>
@stop

