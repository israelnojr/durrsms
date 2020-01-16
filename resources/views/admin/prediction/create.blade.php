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
                    <a href="{{ route('home')}}" class="btn btn-primary float-right">{{ __('Dashboard')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-md-6">
    @include('layouts.frontend.partial.message')
        <div class="card">
            <div class="card-header">Create Prediction</div>
            <div class="card-body">
                <form action="{{ route('admin.predictions.store')}}" method="post"> @csrf 
                    <input id="user_id" type="hidden" name="user_id" value="{{$id}}">
                    <input id="started_at" type="hidden" name="started_at" value="2020-01-05 00:00:00">
                    <div class="md-form">
                        <input id="league" type="text" class="form-control @error('league') is-invalid @enderror"
                            name="league" value="{{ old('league')}}">
                        @error('league')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="league" class="font-weight-light">{{ __('League') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="home_team" type="text" class="form-control @error('home_team') is-invalid @enderror"
                            name="home_team" value="{{ old('home_team')}}">
                        @error('home_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="home_team" class="font-weight-light">{{ __('Home Team') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="away_team" type="text" class="form-control @error('away_team') is-invalid @enderror"
                            name="away_team" value="{{ old('away_team')}}">
                        @error('away_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="away_team" class="font-weight-light">{{ __('Away Team') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="tip" type="text" class="form-control @error('tip') is-invalid @enderror"
                            name="tip" value="{{ old('tip')}}">
                        @error('tip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="tip" class="font-weight-light">{{ __('Tip') }}</label>
                    </div>
                    <div class=" form-group ">
                        <!-- Material inline 1 -->
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="isPremium" value="1">
                            <label class="form-check-label" for="roles">Premium</label>
                        </div>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-cyan" type="submit">{{ __('Save')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
