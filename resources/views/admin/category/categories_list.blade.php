@extends('admin.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('page-header')
    <div class="row">
        <div class="col-md-9">
            <h2 class="display-3 text-white ml-5 shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                List of Categories
            </h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-success float-right" href="{{route('category.create')}}">
                <i class="fa fa-plus"></i>&ensp;
                New Category
            </a>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card card-body shadow">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-default shadow--hover"
                           type="button">
                            <i class="fa fa-edit text-white"></i>
                        </a>
                    </td>
                    <td>
                        <form id="delete-category-{{$category->id}}"
                              action="{{route('category.destroy',$category->id)}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="javascript:" class="btn btn-danger shadow--hover"
                           onclick="if (confirm('Are you sure? You want to delete this!')){
                               event.preventDefault();
                               document.getElementById('delete-category-{{$category->id}}').submit();
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
                <th>Tag Name</th>
                <th>Slug</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection