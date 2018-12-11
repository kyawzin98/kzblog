@extends('admin.app')
@section('page-header')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="display-3 text-white text-center shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                Fill The Form To Create New Permission
            </h2>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card bg-gradient-default shadow">
        <div class="card-body">
            <form role="form" action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @include('includes.message')
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" id="name" name="name" placeholder="Permission Name"
                                       type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="permission_for">Permission For</label>
                            <select name="permission_for" id="permission_for" class="form-control">
                                <option selected disabled="disabled">Select Permission For</option>
                                <option value="user">User</option>
                                <option value="post">Post</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <a href="{{route('permission.index')}}" class="btn btn-warning mt-4">Back</a>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection