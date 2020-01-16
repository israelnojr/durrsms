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
                            @include('layouts.frontend.partial.message')
                        </div>
                    @endif
                    <a href="{{ route('home')}}" class="btn btn-primary float-right">{{ __('Dashboard')}}</a>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
<table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm">User
          </th>
          <th class="th-sm">Package
          </th>
          <th class="th-sm">Payment Method
          </th>
          <th class="th-sm">Amount
          </th>
          <th class="th-sm">Prove of Payment
          <th class="th-sm">Status
          <th class="th-sm">DateTime
          </th>
        </tr>
      </thead>
      <tbody>
    @foreach($subscriptions as $sub)
        <tr>
            <td>{{$sub->user->name}}</td>
            <td>{{$sub->type}}</td>
            <td>{{$sub->payment_type}}</td>
            <td>{{$sub->amount}}</td>
            <td>
                <a href="{{ asset('uploads/subscription/'.$sub->image)}}">
                    <img src="{{ asset('uploads/subscription/'.$sub->image)}}" alt="" style="width: 10%;">
                </a>
            </td>
            <td class="">
                <form action="{{ route('admin.subscription.status', $sub->id)}}" method="post">
                    @csrf() @method('put')
                    <button type="submit" class="btn btn-md {{ $sub->status == true ? 'btn-success' : 'btn-danger'}}">
                        {{ $sub->status == true ? 'Active' : 'Inactive'}}
                    </button>
                </form> 
            </td>
           
            <td>{{$sub->created_at}}</td>
        </tr>
    @endforeach
      </tbody>
    </table>
</div>

@endsection
