@extends('master')
@section('title', 'View a single role')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        {{--show single role--}}
        <div class="well well bs-component">
            <div class="content">
                <h3 class="header"><strong>Role:</strong>  {!! $role['name'] !!}</h3>
                @if(!empty($role->description))
                <p><strong>Description</strong>: {!! $role->description !!}</p>
                @endif
            </div>
            <a href="{!! route('role_edit', ['id'=>$role['id']]) !!}" class="btn btn-info">Edit</a>
            <form action="" class="pull-left" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>


    </div>
@endsection