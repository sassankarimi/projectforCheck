@extends('layout')
@section('title')
    Home
@stop
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="jumbotron mt-3">
            <h1 class="display-4"><strong>Bongah</strong></h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="{{route('banners.create')}}" role="button"><strong>Sign Up</strong></a>
        </div>
        </div>
@endsection
