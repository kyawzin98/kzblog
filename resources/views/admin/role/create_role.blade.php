@extends('admin.app')
@section('page-header')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="display-3 text-white text-center shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                Fill The Form To Create New Role
            </h2>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card bg-gradient-default shadow">
        <div class="card-body">
            <form role="form" action="{{route('role.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @include('includes.message')
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" id="name" name="name" placeholder="Role Name" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Post Permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->permission_for == 'post')
                                        <div class="form-check ml-3">
                                            <label for="" class="form-check-label">
                                                <input type="checkbox" value="{{$permission->id}}"
                                                       class="form-check-input">{{$permission->name}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <label for="">User Permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->permission_for == 'user')
                                        <div class="form-check ml-3">
                                            <label for="" class="form-check-label">
                                                <input type="checkbox" value="{{$permission->id}}"
                                                       class="form-check-input">{{$permission->name}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <label for="">User Permissions</label>
                                @foreach($permissions as $permission)
                                    @if($permission->permission_for == 'other')
                                        <div class="form-check ml-3">
                                            <label for="" class="form-check-label">
                                                <input type="checkbox" value="{{$permission->id}}"
                                                       class="form-check-input">{{$permission->name}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
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