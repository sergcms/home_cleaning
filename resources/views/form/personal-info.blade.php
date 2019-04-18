@extends('layouts.layout')

@include('header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Let's start with some basic information</h3>
            <p class="text-center">At the end of the quote you will get a price for cleaning</p>
            <hr>

            <form method="POST" action="{{ route('personal-info') }}">
                @csrf

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">cleaning frequency</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">How often would you like us to come?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="once" 
                                {{ $order_personal_info->cleaning_frequency == 'once' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="cleaning-frequency">
                                    Once
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="weekly"
                                {{ $order_personal_info->cleaning_frequency == 'weekly' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-frequency">
                                    Weekly
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="biweekly"
                                {{ $order_personal_info->cleaning_frequency == 'biweekly' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-frequency">
                                    Biweekly
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="monthly"
                                {{ $order_personal_info->cleaning_frequency == 'monthly' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-frequency">
                                    Monthly
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">cleaning type</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">What type of cleaning?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="deep of spring"
                                {{ $order_personal_info->cleaning_type == 'deep of spring' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="cleaning-type">
                                    Deep of Spring
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="move in"
                                {{ $order_personal_info->cleaning_type == 'move in' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-type">
                                    Move In
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="move out"
                                {{ $order_personal_info->cleaning_type == 'move out' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-type">
                                    Move Out
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="post remodeling"
                                {{ $order_personal_info->cleaning_type == 'post remodeling' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-type">
                                    Post Remodeling
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                    
                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">cleaning date</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">When will you need us?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="next available"
                                {{ $order_personal_info->cleaning_date == 'next available' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    Next available
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="this week"
                                {{ $order_personal_info->cleaning_date == 'this week' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    This week
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="next week"
                                {{ $order_personal_info->cleaning_date == 'next week' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    Next week
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="this month"
                                {{ $order_personal_info->cleaning_date == 'this month' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    This Month
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="i am flexible"
                                {{ $order_personal_info->cleaning_date == 'i am flexible' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    I am flexible
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="just need a quote"
                                {{ $order_personal_info->cleaning_date == 'just need a quote' ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning-date">
                                    Just need a quote
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">personal info</span>
                    </div>
    
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first-name" class="col-md-12 col-form-label text-md-left">{{ __('First name') }}</label>
        
                                <input id="first-name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $order->first_name ?? old('first_name') }}" required autofocus>
        
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="col-md-6">
                                <label for="last-name" class="col-md-12 col-form-label text-md-left">{{ __('Last name') }}</label>
        
                                <input id="last-name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $order->last_name ?? old('last_name') }}" required autofocus>
        
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-8">
                                <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('Address') }}</label>
        
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $order->address ?? old('address') }}" required autofocus>
        
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-4">
                                <label for="apt" class="col-md-12 col-form-label text-md-left">{{ __('Apt # (optional)') }}</label>
        
                                <input id="apt" type="number" class="form-control{{ $errors->has('apt') ? ' is-invalid' : '' }}" name="apt" value="{{ $order->apt ?? old('apt') }}" required autofocus>
        
                                @if ($errors->has('apt'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apt') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="col-md-12 col-form-label text-md-left">{{ __('City') }}</label>
        
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $order->city ?? old('city') }}" required autofocus>
        
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="square-footage" class="col-md-12 col-form-label text-md-left">{{ __('Home Square Footage') }}</label>
        
                                <input id="square-footage" type="number" class="form-control{{ $errors->has('square_footage') ? ' is-invalid' : '' }}" name="square_footage" value="{{ $order->square_footage ?? old('square_footage') }}" required autofocus>
        
                                @if ($errors->has('square_footage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('square_footage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-12 col-form-label text-md-left">{{ __('Mobile phone') }}</label>
        
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $order->phone ?? old('phone') }}" required autofocus>
        
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-6">
                                <label for="hear_about_us" class="col-md-12 col-form-label text-md-left">{{ __('How did you hear about us?') }}</label>

                                <select class="custom-select" id="hear-about-us" name="hear_about_us">
                                @if (isset($order->hear_about_us))
                                    <option {{ $order->hear_about_us === 'Friends' ? 'selected' : '' }}>Friends</option>
                                    <option {{ $order->hear_about_us === 'Radio' ? 'selected' : '' }}>Radio</option>
                                    <option {{ $order->hear_about_us === 'TV' ? 'selected' : '' }}>TV</option>
                                    <option {{ $order->hear_about_us === 'Magazine' ? 'selected' : '' }}>Magazine</option>
                                @else
                                    <option>Friends</option>
                                    <option>Radio</option>
                                    <option>TV</option>
                                    <option>Magazine</option>
                                @endif
                                </select>
        
                                @if ($errors->has('hear_about_us'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hear_about_us') }}</strong>
                                    </span>
                                @endif
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
                            {{ __('3 Steps Left') }}
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