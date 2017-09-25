@extends('master')
@section('title', 'View all tickets')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        {{--show single ticket--}}
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $ticket->title !!}</h2>
                <p><strong>Status</strong>: {!! $ticket->status ? 'Pending' : 'Answered' !!}</p>
                <p>{!! $ticket->content !!}</p>
            </div>
            <a href="{!! action('TicketsController@edit', ['slug'=>$ticket->slug]) !!}" class="btn btn-info">Edit</a>
            <form action="{!! action('TicketsController@destroy', $ticket->slug) !!}" class="pull-left" method="post">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        {{--Show comments--}}
        @foreach($comments as $comment)
            <div class="well well bs-component">
                {{ $comment->content }}
            </div>
        @endforeach

        {{--Reply form--}}
        <div class="well well bs-component">
            <form action="/comment" class="form-horizontal" method="post">
                @include('shared.danger')
                @include('shared.status')

                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $ticket->id }}">
                <input type="hidden" name="post_type" value="App\Ticket">
                <fieldset>
                    <legend>Reply</legend>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <textarea name="content" id="content"  rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </div>

                </fieldset>


            </form>
        </div>

    </div>
@endsection