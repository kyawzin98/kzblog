@extends('user.app')
@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('title','Welcome ' . Auth::user()->name)
@section('subheading')
    <p class="">Click <a href="{{route('blog')}}" class="text-primary">here</a> to view all posts</p>
@endsection
@section('main-content')
    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{--<p class="text-muted">Click <a href="{{route('blog')}}" class="text-primary">here</a> to view all posts</p>--}}
            </div>
        </div>
    </div>

@endsection

