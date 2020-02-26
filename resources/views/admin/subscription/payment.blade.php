@extends('layouts.mod_config')

@section('content')
<br><br><br><br>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
    @include('layouts.frontend.partial.message')
        <div class="card">
            <div class="card-header">{{ __('User Subscription Payment')}}</div>
            <div class="card-body">
                @if($sub->payment_type == 'btc')
                    <p>Send {{'$'.$sub->amount}} worth of BITCOIN to 3EYnfrxXHjxoRcSNfnMqqoojQdaNH9iQfH</p>
                @else
                <p>Transfer {{'$'.$sub->amount}} to our Bank Account xxxxx</p>
                @endif

                <h5>After Payment Screenshot and upload proof of payment.</h5>
                
                <form action="{{ route('admin.subscription.payment', $sub->id)}}" method="post" enctype="multipart/form-data"> 
                    @csrf @method('put')
                    <input id="user_id" type="hidden" name="user_id" value="{{$id}}">
                    <div class="md-form">
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-center py-4 mt-3">
                        <button class="btn btn-cyan" type="submit">{{ __('Done')}}</button> <br> <br><br>
                        
                        <small class=""> By clicking <span class="badge badge-danger">Done</span> 
                            you agreed that you have made payment either in btc or bank transfer.
                        </small>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
