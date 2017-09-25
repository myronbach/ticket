@extends('master')
@section('title', 'All roles')
@section('content')

<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>All roles</h2>
            @include('shared.status')
            @if($roles->isEmpty())
                <p>There is no roles</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                        <tr>
                            <td><a href="{!! route('role_edit', $role->id) !!}">{!! $role->name !!}</a></td>
                            <td>{!! $role->display_name !!}</td>
                            <td>{!! $role->description !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

@endsection