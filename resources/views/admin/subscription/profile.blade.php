@extends('layouts.mod_config')

@section('content')
<div class="container mt-4">
    <div class="row d-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Past Games</div>
                <div class="card-body">
                    @if(Auth::user()->subscription->status == true)
                        <table class="table">
                            <thead>
                                <tr>
                                </th>
                                <th class="th-sm">League
                                </th>
                                <th class="th-sm">Home vs Away
                                </th>
                                <th class="th-sm">Tip
                                <th class="th-sm">Result
                                <th class="th-sm">Start Time
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($PastPrediction as $game)
                                <tr>
                                    <td>{{$game->league}}</td>
                                    <td>
                                        {{$game->home_team}} vs {{$game->away_team}}
                                    </td>
                                    <td>{{$game->tip}}</td>
                                    <td>{{$game->result}}</td>
                                    <td>{{$game->started_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <p>You do not have active subscription <a href="{{ route('admin.subscriptions.create')}}">{{ __('Join Vip')}}</a></p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Today's Predictions</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        </th>
                        <th class="th-sm">League
                        </th>
                        <th class="th-sm">Home vs Away
                        </th>
                        <th class="th-sm">Tip
                        <th class="th-sm">Start Time
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($predictions as $game)
                        <tr>
                            <td>{{$game->league}}</td>
                            <td>
                                {{$game->home_team}} vs {{$game->away_team}}
                            </td>
                            <td>{{$game->tip}}</td>
                            <td>{{$game->started_at}}</td>
                        </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="card">
        <div class="card-body">
        @include('layouts.frontend.partial.message')
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
    </div>
</div>
@endsection
