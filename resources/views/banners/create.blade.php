
@extends('layout');
@section('content')
    <h1 class="mt-4">Selling your home?!</h1>
    <hr>

        <form action="{{route('wss.banners.store')}}"  method="post" enctype="multipart/form-data" role="form">
            @include('banners.form');
        </form>
        <br>


    @if(count($errors)>0)
        <div class="alert alert-warning" role="alert">
        <ul>
    @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
    @endforeach
        </ul>
        </div>
    @endif
@stop