@extends('master')
@section('title', 'All users')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>All users</h2>
            </div>
            @include('shared.status')
            @if ($users->isEmpty())
                <p>There is no user.</p>
            @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{!! $user->id !!}</td>
                    <td><a href="{!! action('Admin\UserController@edit', $user->id) !!}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

@endsection