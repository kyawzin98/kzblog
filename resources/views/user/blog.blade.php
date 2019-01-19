@extends('user.app')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .fa-thumbs-up:hover {
            color: red;
        }
    </style>
@endsection
@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','Clean Blog')
@section('subheading','Design by Start Bootstrap')
@section('main-content')
    <!-- Main Content -->
    <div class="container" id="app">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <posts
                        v-for="value in blog"
                        :key=value.id
                        :post-id=value.id
                        :title=value.title
                        :subtitle=value.subtitle
                        :created_at=value.created_at
                        login = "{{Auth::check()}}"
                        :likes = value.likes.length
                        :slug = value.slug
                ></posts>
                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    <div class="">{{$posts->links()}}</div>
                    {{--<a class="btn btn-primary float-right" href="">Older Posts &rarr;</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/app.js')}}"></script>
@endsection