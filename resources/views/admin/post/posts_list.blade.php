@extends('admin.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('page-header')
    <div class="row">
        <div class="col-md-9">
            <h2 class="display-3 text-white ml-5 shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                List of Posts
            </h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-success float-right" href="{{route('post.create')}}">
                <i class="fa fa-plus"></i>&ensp;
                New Post
            </a>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card card-body shadow">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Post Title</th>
                    <th>Sub Title</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->subtitle}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-default shadow--hover"
                               type="button">
                                <i class="fa fa-edit text-white"></i>
                            </a>
                        </td>
                        <td>
                            <form id="delete-post-{{$post->id}}"
                                  action="{{route('post.destroy',$post->id)}}" method="post" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="javascript:" class="btn btn-danger shadow--hover"
                               onclick="if (confirm('Are you sure? You want to delete this!')){
                                       event.preventDefault();
                                       document.getElementById('delete-post-{{$post->id}}').submit();
                                       }else {event.preventDefault();}">
                                <i class="fa fa-trash-alt text-white"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Post Title</th>
                    <th>Sub Title</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection