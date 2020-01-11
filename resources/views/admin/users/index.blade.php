@extends('layouts.mod_config')

@section('content')
    <div class="container mt-5">
        <div class="card-header mb-3 d-flex align-items-center"> 
            <span>List of Users</span>
            <a href="{{route('home')}}" class="float-right btn btn-primary">
                {{ __('Dashboard')}}
            </a>
        </div>
        @include('layouts.frontend.partial.message')
        <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class="th-sm">Name
            </th>
            <th class="th-sm">Email
            </th>
            <th class="th-sm">Role
            </th>
            <th class="th-sm">Edit
            </th>
            <th class="th-sm">Delete
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
            <td class=""> 
                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
            </td>
            <td>
                <form action="{{route('admin.users.destroy', $user)}}" method="post">
                    @csrf() @method('delete')
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
