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
                    @include('layouts.frontend.partial.message')
                    <a href="{{ route('admin.predictions.create')}}" class="btn btn-success">Create</a>
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
          <th class="th-sm">Creator
          </th>
          <th class="th-sm">League
          </th>
          <th class="th-sm">Home Team
          </th>
          <th class="th-sm">Away Team
          </th>
          <th class="th-sm">Tip
          <th class="th-sm">Premium Game </th>
          <th class="th-sm">Plan</th>
          <th class="th-sm">Status </th>
          <th class="th-sm">Edit </th>
          <th class="th-sm">Delete
          </th>
          <th class="th-sm">DateTime
          </th>
        </tr>
      </thead>
      <tbody>
    @foreach($predictions as $game)
        <tr>
            <td>{{$game->user->name}}</td>
            <td>{{$game->league}}</td>
            <td>{{$game->home_team}}</td>
            <td>{{$game->away_team}}</td>
            <td>{{$game->tip}}</td>
            <td class="">
                <form action="{{ route('admin.predictions.premium', $game->id) }}" method="post">
                    @csrf() @method('put')
                    <button type="submit" class="btn btn-md {{ $game->isPremium == true ? 'btn-success' : 'btn-danger'}}">
                        {{ $game->isPremium == true ? 'Yes' : 'No'}}
                    </button>
                </form> 
            </td>
            <td>{{$game->plan == 'first_class_plan' ? 'Frist Class' : 'Economic'}}</td>
            @if($game->isEndded == true)
            <td class=""> 
                <a href="#"  class="btn btn-md {{ $game->result == 'won' ? 'btn-success' : 'btn-danger'}}">
               {{ $game->result == 'won' ? 'Won' : 'Lost'}}</a>
            </td>
            @else 
            <td class=""> 
                <a href="#"  class="btn btn-md btn-warning">
               {{ __('Onging')}}</a>
            </td>
            @endif
            
            <td>
                <a href="{{ route('admin.predictions.edit', $game->id)}}" class="btn btn-info btn-sm">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                </a>
            </td>
            <td>
                <form action=" {{ route('admin.predictions.destroy', $game->id)}} " method="post">
                    @csrf() @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
            </td>
            <td>{{$game->started_at}}</td>
        </tr>
    @endforeach
      </tbody>
    </table>
</div>

@endsection
