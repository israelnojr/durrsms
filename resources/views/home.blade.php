@extends('layouts.mod_config')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('admin.predictions.index')}}" class="btn btn-success">Predictions</a>
                    <a href="#" class="btn btn-success float-right">View Orders</a>
                   @can('edit-user')
                    <a href="{{route('admin.users.index')}}" class="btn btn-primary"style="margin-left:5px">Manage Users</a>
                   @endcan
                    <a href="{{ route('admin.subscriptions.store')}}" class="btn btn-warning"style="margin-left:5px">Subscriptions</a>
                </div>
                @include('layouts.frontend.partial.message')
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
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
        <tr>
        <td>Jeff Bezoz</td>
        <td>jeff@bezoz.com</td>
        <td>CEO, Co-founder</td>
        <td class=""> 
            <a href="#" class="btn btn-success">Edit</a>
        </td>
        <td>
            <form action="#" method="post">
                @csrf() @method('delete')
                <button type="submit" class="btn btn-danger ml-2">Delete</button>
            </form>
        </td>
        </tr>
      </tbody>
    </table>
</div>

@endsection
