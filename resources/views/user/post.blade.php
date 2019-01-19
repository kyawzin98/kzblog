@extends('user.app')
@section('style')
    <link rel="stylesheet" href="{{asset('user/css/prism.css')}}">
@endsection
@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('subheading',$post->subtitle)
@section('main-content')
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=322225791951787&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto" id="post">
                    <small class="text-purple">Created at {{$post->created_at}}</small>
                    <br>
                    <br>
                    @foreach($post->categories as $category)
                        <a href="{{route('category',$category->slug)}}" class="badge badge-pill badge-dark p-2">{{$category->name}}</a>
                    @endforeach
                    {!! htmlspecialchars_decode($post->body) !!}
                    <!-- Tag Clouds -->
                    <h3>Tag Clouds</h3>
                    @foreach($post->tags as $tag)
                        <a href="{{route('tag',$tag->slug)}}" class="badge badge-danger p-2">{{$tag->name}}</a>
                    @endforeach
                    <br>
                    <hr>
                    <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>
                </div>
            </div>
        </div>
    </article>
@endsection
@section('script')
    <script src="{{asset('user/js/prism.js')}}"></script>
@endsection