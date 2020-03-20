@extends('layouts.front.app')

@section('content')
<div id="content-wrapper">
    <div class="container-fluid" style="height: 86vh">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4 style="margin-bottom: 0;"><i class="icon fa fa-ban"></i> {{Session('success')}}</h4>
                            </div>
                        @endif

                        <form action="{{ url('sms') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Mobile number</label>
                                <select type="text" name="shortcode" class="form-control @error('shortcode') is-invalid @enderror" value="{{ old('shortcode') }}" id="mobile" placeholder="Mobile number">
                                    <option value="">Choose Short Code</option>
                                    <option value="+234">NIG</option>
                                    <option value="+971">UAE</option>
                                    <option value="+1">US & CA</option>
                                </select>
                                @error('shortcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile number</label>
                                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" id="mobile" placeholder="Mobile number">
                                @error('sendfrom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sendfrom">Send From</label>
                                <input type="text" name="sendfrom" class="form-control @error('sendfrom') is-invalid @enderror" value="{{ old('sendfrom') }}" id="mobile" placeholder="We Recommend It Should Be Your Company's Name">
                                @error('sendfrom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" name="message" class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" id="mobile" placeholder="Your Message Body"></textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Send SMS</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection