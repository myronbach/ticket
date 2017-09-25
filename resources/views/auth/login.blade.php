@extends('master')
@section('name', 'Login')

@section('content')

<div class="container col-md-6 col-md-offset-3">
    <div class="well well bs-component">

        <form action="/login" class="form-horizontal" method="post">

            @include('shared.danger')

            {!! csrf_field() !!}

            <fielset>
                <legend>Login</legend>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="checkbox">
                    <label >
                        <input type="checkbox" name="remember"> Remember me?
                    </label>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>

            </fielset>

        </form>

    </div>
</div>

@endsection