@extends('layout')
@section('title')
    Cards
@stop
@section('content')
    <h1>Heil</h1>

    <ul class="list-group">
    @foreach($cards as $card)
   @foreach($card->notes as $note)
            <div class="col-md-12">
                <li class="list-group-item mb-2"><a href="cards/{{$card->id}}">{{$card->title}}</a></li>
            </div>
            @break
    @endforeach
    @endforeach
        </ul>
    {{--<h1>Add new</h1>--}}
  {{--<form class="form-group" method="POST" action="cards/{{$card->id}}">--}}
      {{--{{csrf_field()}}--}}
      {{--<div class="form-group">--}}
          {{--<textarea name="body" class="form-control"></textarea>--}}
      {{--</div>--}}
      {{--<div class="form-group">--}}
          {{--<button type="submit" class="btn btn-default">Enter card</button>--}}
      {{--</div>--}}

  {{--</form>--}}



@stop
