@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="{{route('admin.users.update', $user->id)}}" method="post"> 
                        @csrf @method('put')
                        <!-- <p class="h4 text-center py-4">Sign up</p> -->

                        <!-- Material input password -->
                        <div class="md-form">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                             name="name" value="{{$user->name}}">

                            @error('service_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="name" class="font-weight-light">{{ __('Name') }}</label>
                        </div>
                        <div class=" form-group ">
                            @foreach($roles as $role)
                                <!-- Material inline 1 -->
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" id="materialInline1"
                                        name="roles[]" value="{{$role->id}}"
                                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label class="form-check-label" for="roles">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center py-4 mt-3">
                            <button class="btn btn-cyan" type="submit">{{ __('Save')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection