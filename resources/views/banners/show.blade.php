@extends('layout');
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h1>{{$banner->street}}</h1>
            <h1>{!! number_format($banner->price) !!}</h1>
            <h1>{!! ($banner->description) !!}</h1>
        </div>

        <div class="col-md-8 mt-4">
            @foreach($banner->photos->chunk(4) as $set)

                <div class="row">
                    @foreach($set as $photo)

                        <div class="col-md-3">
                            <form action="{{route('wss.delPhotos',$photo->id)}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-danger label">&times;</button>
                            <img style="max-width: 100%" src="/{{$photo->thumbnail_path}}">
                            </form>
                        </div>

                    @endforeach
                </div>
            @endforeach
                @if(auth()->check() && auth()->user()->owns($banner))
                    <h2>ADD Your Photos</h2>
                    <form class="dropzone" action="/ss/{{$banner->zip}}/{{$banner->street}}/photos" method="POST"
                          id="myAwesomeDropzone">
                        {{csrf_field()}}
                    </form>
                @endif
        </div>
    </div>


@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script>

    Dropzone.options.myAwesomeDropzone = {
        paramName: "photo", // The name that will be used to transfer the file
        maxFilesize: 5, // MB
        acceptedFiles: '.jpg,.png,.jpeg',

    };

</script>