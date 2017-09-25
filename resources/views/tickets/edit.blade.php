@extends('master')
@section('title', 'View all tickets')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" action="/ticket/{{ $ticket->slug }}/edit" method="post" >

               @include('shared.danger')

                @include('shared.status')

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend>Edit ticket</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="title" value="{!! $ticket->title !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-lg-2 control-label">Content</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="content" name="content">{!! $ticket->content !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" {!! $ticket->status?"":"checked"!!} > Close this ticket?
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button  type="reset"  class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
@endsection