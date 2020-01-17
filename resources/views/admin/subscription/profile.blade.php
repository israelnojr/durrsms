@extends('layouts.mod_config')

@section('content')
<div class="container mt-4">
    <div class="row d-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Subscription Details</div>
                <div class="card-body">
                @if($subscription)
                    <table id="" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            </th>
                            <th class="th-sm">Plan
                            </th>
                            <th class="th-sm">Payment Method
                            </th>
                            <th class="th-sm">Amount
                            </th>
                            <th class="th-sm">Status
                            </th>
                            <th class="th-sm">Expires
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$subscription->type == 'first_class_plan' ? 'First Class Plan' : 'Economic Plan'}}</td>
                                <td>{{$subscription->payment_type == 'btc' ? 'Bitcoin' : 'Bank Transfer'}}</td>
                                <td>{{'$'.$subscription->amount}}</td>
                                <td class="{{$subscription->status == true ? 'text-success' : 'text-danger'}}">{{$subscription->status == true ? 'Active' : 'Inactive'}}</td>
                                <td>{{$subscription->started_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Today's Predictions</div>
                <div class="card-body">
                @if($subscription)
                    @if($user->subscription->status)
                    <table class="table" cellspacing="0" width="100%">
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
                        @forelse($predictions as $game)
                            <tr>
                                <td>{{$game->league}}</td>
                                <td>
                                    {{$game->home_team}} vs {{$game->away_team}}
                                </td>
                                <td>{{$game->tip}}</td>
                                <td>{{$game->started_at}}</td>
                            </tr>
                            @empty
                                <p class="text-center">No Predictions at the moment</p>
                            @endforelse
                        </tbody>
                    </table>
                        @else
                        <p class="text-center">Your Games will show here when subsription is active</p>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="card">
    <div class="card-header">Past Predictions</div>
        <div class="card-body">
        @include('layouts.frontend.partial.message')
        @if($subscription)
            @if($user->subscription->status)
                <table class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        </th>
                        <th class="th-sm">League
                        </th>
                        <th class="th-sm">Home vs Away
                        </th>
                        <th class="th-sm">Tip
                        <th class="th-sm">Result
                        </th>
                        <th class="th-sm">Date Time
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
                <p class="text-center">You do not have active subscription, if your subscription havn't expired contact admin to activate it., otherwise  
                    <a href="{{ route('admin.subscriptions.edit',$subscription->id )}}">{{ __('Renew')}}</a> 
                </p>
            @endif
            @else
            <p class="text-center">You havn't subscribed yet <a href="{{ route('admin.subscriptions.create')}}">{{ __('Join Vip')}}</a></p>
        @endif
        </div>
    </div>
</div>
@endsection
