@extends('layout');

@section('content')


    <h1>Users</h1>
<table class="table">
    <tbody>


    <th>{!! sort_users_by('name','SortBYName') !!}</th>
    <th> {!! sort_users_by('email','SortByEmail') !!}</th>

@foreach($users as $user)
    <tr>
    <td style="color: #fff;">{{$user->name}}</td>
    <td style="color: #fff;">{{$user->email}}</td>
    </tr>
    @endforeach
</tbody>

</table>
<div class="text-center">
    {{ $users->appends(Request::input())->links( "pagination::bootstrap-4") }}
</div>
@stop