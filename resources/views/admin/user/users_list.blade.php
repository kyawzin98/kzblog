@extends('admin.app')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('page-header')
    <div class="row">
        <div class="col-md-12">
            @include('includes.message')
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h2 class="display-3 text-white ml-5 shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                List of Users
            </h2>
        </div>
        <div class="col-md-3">
            <a class="btn btn-success float-right" href="{{route('user.create')}}">
                <i class="fa fa-2x fa-user-plus"></i>&ensp;
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
                <th>User Name</th>
                <th>Assigned Roles</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-primary">{{$role->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($user->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Not Active</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-default shadow--hover"
                           type="button">
                            <i class="fa fa-edit text-white"></i>
                        </a>
                    </td>
                    <td>
                        <form id="delete-tag-{{$user->id}}"
                              action="{{route('user.destroy',$user->id)}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="javascript:" class="btn btn-danger shadow--hover"
                           onclick="if (confirm('Are you sure? You want to delete this!')){
                                   event.preventDefault();
                                   document.getElementById('delete-tag-{{$user->id}}').submit();
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
                <th>User Name</th>
                <th>Assigned Roles</th>
                <th>Status</th>
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
        $(document).ready(function () {
            setTimeout(function () {
                $(".alert").alert('close')
            }, 2500);
        });
    </script>
@endsection