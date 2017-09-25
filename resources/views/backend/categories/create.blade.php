@extends('master')
@section('title', 'Create A New Category')

@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form action="/admin/categories" method="post">
                @include('shared.danger')
                @include('shared.status')

                {{csrf_field()}}
                <fieldset>
                    <legend>Create a new category</legend>
                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>

            </form>


        </div>
    </div>


@endsection