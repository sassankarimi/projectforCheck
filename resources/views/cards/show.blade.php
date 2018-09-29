@extends('layout')

@section('content')

    @foreach($card->notes as $note)
        <div class="container-fluid col-md-12">

            <li class="list-group-item">user : {{$note->user->name}} </li>
            <li class="list-group-item">user : {{$note->user->id}} </li>
            @can('edit_forum')
            <a href="../notes/{{$note->id}}/edit">
                @endcan
                <li class="list-group-item">note : {{$note->body}} </li>
                @can('edit_forum')
            </a>
               @endcan
        </div>
    @endforeach
    <h1>New  Note</h1>
    <form class="form-group" method="POST" action="../cards/{{$card->id}}/notes">
        {{csrf_field()}}
        <div class="form-group">
            <textarea name="body" class="form-control">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">enter note</button>
        </div>

    </form>


    @if(count($errors))
    <ul class="list-group">
    @foreach($errors->all() as $error )
        <li class="list-group-item-info">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    {{--{{var_dump($errors)}}--}}
@stop

