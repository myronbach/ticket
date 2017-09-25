@extends('master')
@section('title', 'Create A new Role')

@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post" action="{{ route('role_update', $role['id']) }}">
                @include('shared.danger')
                @include('shared.status')
                {!! csrf_field() !!}
                <fieldset>
                    <input type="hidden" name="id" value="{{$role['id']}}">
                    <legend>Update a new role</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role['name'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_name" class="col-lg-2 control-label">Display Name</label>
                        <div class="col-lg-10">
                            <input type="display_name" class="form-control" id="display_name" name="display_name" value="{{$role['display_name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="description" name="description">{{ $role['description'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>


@endsection