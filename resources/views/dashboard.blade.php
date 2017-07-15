@extends('layouts.master')
@section('content')
@include('include.message-block')
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3>What do you have to say?</h3>
        </header>
        <form action="{{route('post.create')}}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" rows="5"  placeholder="Describe feelings here">
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
             {{csrf_field()}}
        </form>
    </div>
</section>
<section class="row posts">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3>What other peaple say ....</h3>
        </header>
        @foreach($posts as $post)
            <article class="post">
                <p> {{$post->body}}</p>
                <div class="info">
                    Post by {{$post->user->first_name}} on {{$post->created_at}}
                </div>
                <div class="interaction">
                    <a href="">Like</a>
                    <a href="">Dislike</a>
                    <a href="">Edit</a>
                    <a href="">Delete</a>
                </div>
            </article>
        @endforeach
    </div>
</section>
@endsection 