@extends('admin.app')
@section('page-header')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="display-3 text-white text-center shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                Fill The Form And Click Submit To Update Post
            </h2>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card bg-gradient-default shadow">
        <div class="card-body">
            <form role="form" action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2 class="text-white">Titles</h2>
                @include('includes.message')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" name="title" value="{{$post->title}}" placeholder="Title"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" name="subtitle" value="{{$post->subtitle}}"
                                       placeholder="Subtitle" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" name="slug" value="{{$post->slug}}" placeholder="Slug"
                                       type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="row mt-1">
                                <div class="col-3">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" name="status"
                                               value="1"
                                               @if($post->status == 1) {{'checked'}} @endif type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">Publish</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <label for="image">Input File</label>
                                    <input class="" id="image" name="image" type="file">
                                </div>
                            </div>
                        </div>

                        <div class="input-group" style="margin-top: 36px !important;">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="tags">Tags</label>
                            </div>
                            <select class="multi-tags custom-select" id="tags" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                            @foreach($post->tags as $postTag)
                                            @if($postTag->id == $tag->id)
                                            selected
                                            @endif
                                            @endforeach>{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="categories">Categories</label>
                            </div>
                            <select class="multi-tags custom-select" id="categories" name="categories[]"
                                    multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @foreach($post->categories as $postCategory)
                                            @if($postCategory->id == $category->id)
                                            selected
                                            @endif
                                            @endforeach>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <hr class="bg-white">
                <div class="form-group">
                    <label for="editor1" class="text-white">Type Post Body Here</label>
                    <textarea name="body" id="editor1">{{$post->body}}</textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    <a href="{{route('post.index')}}" class="btn btn-warning mt-4">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    </script>
    <script>
        $(document).ready(function () {
            $('.multi-tags').select2();
        });
    </script>

@endsection
