@extends('user.app')
@section('bg-img',asset('user/img/post-bg.jpg'))
@section('title',$post->title)
@section('subheading',$post->subtitle)
@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto" id="post">
                    <small class="text-purple">Created at {{$post->created_at->diffForHumans()}}</small>
                    <br>
                    <br>
                    @foreach($post->categories as $category)
                        <small class="badge badge-danger p-2">{{$category->name}}</small>
                    @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}
                    <!-- Tag Clouds -->
                    <h3>Tag Clouds</h3>
                    @foreach($post->tags as $tag)
                        <small class="badge badge-danger p-2">{{$tag->name}}</small>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection