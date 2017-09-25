@extends('master')

@section('title', 'View a post')
@section('content')

    <div class="container col-md-8 col-md-offset-2">
        <div class="well well ds-component">
            <div class="content">
                <h2 class="header">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </div>
            <div class="clearfix"></div>
        </div>
        @foreach($comments as $comment)

            <div class="well well bs-component">
                <div class="content">
                    {{ $comment->content }}
                </div>
            </div>
        @endforeach

        <div class="well well bs-component">
            <form action="/comment" class="form-horizontal" method="post">
                @include('shared.danger')
                @include('shared.status')
                {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="post_type" value="App\Post">

                <fieldset>
                    <legend>Comment</legend>
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