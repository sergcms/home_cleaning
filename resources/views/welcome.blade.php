@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center m-auto mt-3 mb-3">
        <div class="col-md-6">
            <h3 class="card-title text-center">Get a price home cleaning</h3>
            
            @if (count($errors) > 0) 
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>    
                </div>    
            @endif

            {{-- @foreach ($info as $item)
                {{ $item }}
            @endforeach --}}
            {{-- {{ $info->email }} --}}

            <form method="POST" action="{{ route('welcome-post') }}">
                @csrf

                <div class="form-row justify-content-center">
                    <div class="col-md-6">
                        <select class="custom-select" id="bedrooms" name="bedrooms">
                            @for ($i = 1; $i <= config('price.count_bedrooms'); $i++)
                                @if (isset($info->bedrooms))
                                    <option value="{{ $i }}" {{ $info->bedrooms == $i ? 'selected' : '' }} >{{ $i }} bedroom(s)</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }} bedroom(s)</option>
                                @endif
                            @endfor
                        </select>

                        @if ($errors->has('bedrooms'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bedrooms') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <select class="custom-select" id="bathrooms" name="bathrooms">
                            @for ($i = 0.5; $i <= config('price.count_bathrooms'); $i+=0.5)
                                @if (isset($info->bathrooms))
                                    <option value="{{ $i }}" {{ $info->bathrooms == $i ? 'selected' : '' }} >{{ $i }} bathroom(s)</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }} bathroom(s)</option>
                                @endif
                            @endfor
                        </select>

                        @if ($errors->has('bathrooms'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bathrooms') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <label for="zip-code" class="col-md-12 col-form-label text-md-left">{{ __('ZIP Code') }}</label>

                        <input id="zip-code" type="number" class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}" name="zip_code" value="{{ $info->zip_code ?? old('zip_code') }}" required autofocus>

                        @if ($errors->has('zip_code'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zip_code') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-md-8">
                        <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('EMail') }}</label>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $info->email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            {{ __('Continue') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')  
<footer class="border-top bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list mt-5 mb-5 text-lg-left">
                    <li>Experienced and vetted professionals</li>
                    <li>Flexible cleaning schedule</li>
                    <li>Cleaning supplies included</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection