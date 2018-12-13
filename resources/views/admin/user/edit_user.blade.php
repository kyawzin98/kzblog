@extends('admin.app')
@section('page-header')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="display-3 text-white text-center shadow"
                style="font-family: 'Monaco', Tahoma, Arial, Verdana, Sans-Serif ">
                Fill The Form And Click Submit To Update User
            </h2>
        </div>
    </div>
@endsection
@section('page-content')
    <div class="card bg-gradient-default shadow">
        <div class="card-body">
            <form role="form" action="{{route('user.update',$user->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @include('includes.message')
                        <div class="form-group">
                            <label for="name" class="text-primary">User Name</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" id="name" name="name" value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif" placeholder="User Name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-primary">Email</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" id="email" name="email" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif" placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-primary">Phone No</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" id="phone" name="phone" value="@if(old('phone')){{old('phone')}}@else{{$user->phone}}@endif" placeholder="Phone No" type="number">
                            </div>
                        </div>
                        <div class="form-check">
                            <label for="" class="text-primary">Status</label>
                            <div class="input-group input-group-alternative mb-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status" id=""
                                           @if(old('status')==1 || $user->status==1) checked @endif value="1">
                                    Status
                                </label>
                            </div>
                        </div>
                        <div class="form-check">
                            <label for="role" class="text-primary">Assign Role</label>
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-4">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="role[]" id=""
                                                   @foreach($user->roles as $user_role)
                                                        @if($user_role->id == $role->id)
                                                           checked
                                                        @endif
                                                   @endforeach
                                                   value="{{$role->id}}">
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <a href="{{route('user.index')}}" class="btn btn-warning mt-4">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection