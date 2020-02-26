@extends('layouts.mod_config')

@section('content')
<br><br><br><br>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
    @include('layouts.frontend.partial.message')
        <div class="card">
            <div class="card-header">User Renew Subscription</div>
            <div class="card-body">
                <form action="{{ route('admin.subscriptions.update', $subscription->id)}}" method="post"> @csrf @method("put")
                    <div class="md-form">
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            <option value="">Choose Package</option>
                            <option value="first_class_plan">First Class Plan</option>
                            <option value="economin_plan">Economic Plan</option>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                    </div>
                    <div class="md-form">
                        <select name="payment_type" id="payment_type" class="form-control @error('payment_type') is-invalid @enderror">
                            <option value="">Payment Method</option>
                            <option value="btc">Bitcoin</option>
                            <!-- <option value="bank">Bank Transfer</option> -->
                            @error('payment_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                    </div>
                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-cyan" type="submit">{{ __('Proceed')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
