@inject('countries','App\Http\Utilities\Country')
{!! csrf_field() !!}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="street">street</label>
            <input type="text" name="street" id="street" class="form-control" placeholder="street"
                   value="{{old('street')}}">
        </div>
        <div class="form-group">
            <label for="city">city</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="city" value="{{old('city')}}">
        </div>
        <div class="form-group">
            <label for="zip">post code</label>
            <input type="text" name="zip" id="zip" class="form-control" placeholder="zip" value="{{old('zip')}}">
        </div>
        <div class="form-group">
            <label for="country"></label>
            <select id="country" name="country" class="form-control">
                @foreach($countries::all() as $country=>$code)
                    <option value="{{$code}}">{{$country}}</option>;
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="state"></label>
            <input type="text" name="state" id="state" class="form-control" placeholder="state"
                   value="{{old('state')}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="price"
                   value="{{old('price')}}">
        </div>
        {{--<div class="form-group">--}}
        {{--<label for="photos"></label>--}}
        {{--<input type="file" name="photos" id="photos" class="form-control"  placeholder="photos" >--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="description">description</label>
            <textarea type="text" name="description" id="description" class="form-control"
                      rows="10">{{old('description')}}</textarea>
        </div>

    </div>

    <div class="col-md-12">
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Create Banner</button>
        </div>
    </div>
</div>