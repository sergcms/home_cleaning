@extends('layouts.layout')

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
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="once" checked>
                                <label class="form-check-label" for="cleaning-frequency">
                                    Once
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="weekly">
                                <label class="form-check-label" for="cleaning-frequency">
                                    Weekly
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="biweekly">
                                <label class="form-check-label" for="cleaning-frequency">
                                    Biweekly
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="monthly">
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
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="deep of spring" checked>
                                <label class="form-check-label" for="cleaning-type">
                                    Deep of Spring
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="move in">
                                <label class="form-check-label" for="cleaning-type">
                                    Move In
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="move out">
                                <label class="form-check-label" for="cleaning-type">
                                    Move Out
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_type" id="cleaning-type" value="post remodeling">
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
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="next available" checked>
                                <label class="form-check-label" for="cleaning-date">
                                    Next available
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="this week">
                                <label class="form-check-label" for="cleaning-date">
                                    This week
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="next week">
                                <label class="form-check-label" for="cleaning-date">
                                    Next week
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="this month">
                                <label class="form-check-label" for="cleaning-date">
                                    This Month
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="i am flexible">
                                <label class="form-check-label" for="cleaning-date">
                                    I am flexible
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_date" id="cleaning-date" value="just need quote">
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
        
                                <input id="first-name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ session('user.first_name') ?? old('first_name') }}" required autofocus>
        
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
        
                            <div class="col-md-6">
                                <label for="last-name" class="col-md-12 col-form-label text-md-left">{{ __('Last name') }}</label>
        
                                <input id="last-name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ session('user.last_name') ?? old('last_name') }}" required autofocus>
        
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-8">
                                <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('Address') }}</label>
        
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ session('user.address') ?? old('address') }}" required autofocus>
        
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-4">
                                <label for="apt" class="col-md-12 col-form-label text-md-left">{{ __('Apt # (optional)') }}</label>
        
                                <input id="apt" type="number" class="form-control{{ $errors->has('apt') ? ' is-invalid' : '' }}" name="apt" value="{{ session('user.apt') ?? old('apt') }}" required autofocus>
        
                                @if ($errors->has('apt'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apt') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="city" class="col-md-12 col-form-label text-md-left">{{ __('City') }}</label>
        
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ session('user.city') ?? old('city') }}" required autofocus>
        
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="square-footage" class="col-md-12 col-form-label text-md-left">{{ __('Home Square Footage') }}</label>
        
                                <input id="square-footage" type="number" class="form-control{{ $errors->has('square_footage') ? ' is-invalid' : '' }}" name="square_footage" value="{{ session('user.square_footage') ?? old('square_footage') }}" required autofocus>
        
                                @if ($errors->has('square_footage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('square_footage') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="col-md-12 col-form-label text-md-left">{{ __('Mobile phone') }}</label>
        
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ session('user.phone') ?? old('phone') }}" required autofocus>
        
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-6">
                                <label for="hear_about_us" class="col-md-12 col-form-label text-md-left">{{ __('How did you hear about us?') }}</label>

                                <select class="custom-select" id="hear-about-us" name="hear_about_us">
                                @if (session('user.hear_about_us'))
                                    <option {{ session('user.hear_about_us') === 'Friends' ? 'selected' : '' }}>Friends</option>
                                    <option {{ session('user.hear_about_us') === 'Radio' ? 'selected' : '' }}>Radio</option>
                                    <option {{ session('user.hear_about_us') === 'TV' ? 'selected' : '' }}>TV</option>
                                    <option {{ session('user.hear_about_us') === 'Magazine' ? 'selected' : '' }}>Magazine</option>
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