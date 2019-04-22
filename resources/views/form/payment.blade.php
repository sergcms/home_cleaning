@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Payment Stripe</h3>
            <hr>

            <form method="POST" action="{{ route('payment-post') }}">
                @csrf

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">card info</span>
                    </div>
    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="card" class="col-md-12 col-form-label text-md-left">{{ __('Card') }}</label>
        
                                <input id="card" type="text" class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}" name="card" value="{{ old('card') }}" required autofocus>
        
                                @if ($errors->has('card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="col-md-12">
                                <label for="exp_mounth" class="col-md-12 col-form-label text-md-left">{{ __('Exp. month') }}</label>
        
                                <input id="exp_mounth" type="number" class="form-control{{ $errors->has('exp_mounth') ? ' is-invalid' : '' }}" name="exp_mounth" value="{{ old('exp_mounth') }}" required autofocus>
        
                                @if ($errors->has('exp_mounth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('exp_mounth') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="exp_year" class="col-md-12 col-form-label text-md-left">{{ __('Exp. year') }}</label>
        
                                <input id="exp_year" type="number" class="form-control{{ $errors->has('exp_year') ? ' is-invalid' : '' }}" name="exp_year" value="{{ old('exp_year') }}" required autofocus>
        
                                @if ($errors->has('exp_year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('exp_year') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="cvc" class="col-md-12 col-form-label text-md-left">{{ __('CVC') }}</label>
        
                                <input id="cvc" type="number" class="form-control{{ $errors->has('cvc') ? ' is-invalid' : '' }}" name="cvc" value="{{ old('cvc') }}" required autofocus>
        
                                @if ($errors->has('cvc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cvc') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-12">
                                <label for="exp_year" class="col-md-12 col-form-label text-md-left text-uppercase">Total for payment - <strong>${{ $order->total_sum}}</strong></label>
                            </div>

                           
                        </div>
                       <!-- /.row --> 
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="form-group row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            {{ __('Pay') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')  
    <footer>
        
    </footer>
@endsection