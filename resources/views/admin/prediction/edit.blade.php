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

                    <a href="{{ route('admin.predictions.index')}}" class="btn btn-success">{{ __('Predictions')}}</a>
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
            <div class="card-header">Edit Prediction</div>
            <div class="card-body">
                <form action="{{ route('admin.predictions.update', $prediction->id)}}" method="post"> @csrf @method('put')
                    <input id="user_id" type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="md-form">
                        <input id="league" type="text" class="form-control @error('league') is-invalid @enderror"
                            name="league" value="{{ $prediction->league}}">
                        @error('league')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="league" class="font-weight-light">{{ __('League') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="home_team" type="text" class="form-control @error('home_team') is-invalid @enderror"
                            name="home_team" value="{{ $prediction->home_team }}">
                        @error('home_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="home_team" class="font-weight-light">{{ __('Home Team') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="away_team" type="text" class="form-control @error('away_team') is-invalid @enderror"
                            name="away_team" value="{{ $prediction->away_team}}">
                        @error('away_team')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="away_team" class="font-weight-light">{{ __('Away Team') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="tip" type="text" class="form-control @error('tip') is-invalid @enderror"
                            name="tip" value="{{ $prediction->tip }}">
                        @error('tip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="tip" class="font-weight-light">{{ __('Tip') }}</label>
                    </div>
                    <div class="md-form">
                        <input id="started_at" type="text" class="form-control @error('started_at') is-invalid @enderror"
                            name="started_at" value="{{$prediction->started_at}}">
                        @error('started_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="started_at" class="font-weight-light">{{ __('DateTime') }}</label>
                    </div>
                    <div class=" form-group ">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="isEndded" value="1"  @if($prediction->isEndded == true) checked @endif>
                            <label class="form-check-label mr-4" for="isEndded">Mark As Ended</label>
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="isEndded" value="0"  @if($prediction->isEndded == false) checked @endif>
                            <label class="form-check-label" for="isEndded">Mark As Ongoing</label>
                        </div>
                    </div>

                    <div class=" form-group ">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="result" value="won"  @if($prediction->result == 'won') checked @endif>
                            <label class="form-check-label mr-4" for="result">Mark As Won</label>
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="result" value="lost"  @if($prediction->result == 'lost') checked @endif>
                            <label class="form-check-label mr-4" for="result">Mark As Loss</label>
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="result" value="ongoing"  @if($prediction->result == 'ongoing') checked @endif>
                            <label class="form-check-label" for="result">Mark As Ongoing</label>
                        </div>
                    </div>

                    <div class=" form-group ">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="plan" value="economin_plan">
                            <label class="form-check-label mr-2" for="roles">Economic Plan</label>
                            <input type="checkbox" class="form-check-input" id="materialInline1"
                                name="plan" value="first_class_plan">
                            <label class="form-check-label" for="roles">First Class Plan</label>
                        </div>
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-cyan" type="submit">{{ __('Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
