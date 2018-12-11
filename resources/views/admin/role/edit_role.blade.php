@extends('admin.app')
@section('page-header')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="display-3 text-white text-center shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                Fill The Form And Click Submit To Update Role
            </h2>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card bg-gradient-default shadow">
        <div class="card-body">
            <form role="form" action="{{route('role.update',$role->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @include('includes.message')
                        <div class="form-group">
                            <label>Role Title</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" name="name" value="{{$role->name}}" placeholder="Role Name" type="text">
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <a href="{{route('role.index')}}" class="btn btn-warning mt-4">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection