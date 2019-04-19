@extends('layouts.layout')

@include('header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Now we need information about your home</h3>
            <p class="text-center">This information will be used to prepare for a cleaning</p>
            <hr>

            @if (count($errors) > 0) 
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>    
                </div>    
            @endif

            <form method="POST" action="{{ route('your-home') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">living creatures</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">Have any dogs or cats?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pet" id="" value="none"
                                {{ $orders_home->pet == 'none' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="pet">
                                    None
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="pet" id="" value="dog"
                                {{ $orders_home->pet == 'dog' ? 'checked' : '' }}>
                                <label class="form-check-label" for="pet">
                                    Dog
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="pet" id="" value="cat"
                                {{ $orders_home->pet == 'cat' ? 'checked' : '' }}>
                                <label class="form-check-label" for="pet">
                                    Cat
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="pet" id="" value="both"
                                {{ $orders_home->pet == 'both' ? 'checked' : '' }}>
                                <label class="form-check-label" for="pet">
                                    Both
                                </label>
                            </div>
                        </div>

                        <h6 class="font-weight-bold">Have any pets total?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="count_pets" id="" value="one"
                                {{ $orders_home->count_pets == 'one' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="count_pets">
                                    1
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="count_pets" id="" value="two"
                                {{ $orders_home->count_pets == 'two' ? 'checked' : '' }}>
                                <label class="form-check-label" for="count_pets">
                                    2
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="count_pets" id="" value="more"
                                {{ $orders_home->count_pets == 'more' ? 'checked' : '' }}>
                                <label class="form-check-label" for="count_pets">
                                    3+
                                </label>
                            </div>
                        </div>

                        <h6 class="font-weight-bold">How many adults reside at your locationl?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="adults_people" id="" value="none"
                                {{ $orders_home->adults_people == 'none' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="adults_people">
                                    None
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="adults_people" id="" value="one_two"
                                {{ $orders_home->adults_people == 'one_two' ? 'checked' : '' }}>
                                <label class="form-check-label" for="adults_people">
                                    1 - 2
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="adults_people" id="" value="three_four"
                                {{ $orders_home->adults_people == 'three_four' ? 'checked' : '' }}>
                                <label class="form-check-label" for="adults_people">
                                    3 - 4
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="adults_people" id="" value="more"
                                {{ $orders_home->adults_people == 'more' ? 'checked' : '' }}>
                                <label class="form-check-label" for="adults_people">
                                    5 and more
                                </label>
                            </div>
                        </div>

                        <h6 class="font-weight-bold">How many children?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="children" id="" value="none"
                                {{ $orders_home->children == 'none' ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="children">
                                    None
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="children" id="" value="one"
                                {{ $orders_home->children == 'one' ? 'checked' : '' }}>
                                <label class="form-check-label" for="children">
                                    1
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="children" id="" value="two"
                                {{ $orders_home->children == 'two' ? 'checked' : '' }}>
                                <label class="form-check-label" for="children">
                                    2
                                </label>
                            </div>

                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="children" id="" value="more"
                                {{ $orders_home->children == 'more' ? 'checked' : '' }}>
                                <label class="form-check-label" for="children">
                                    3 and more
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">home cleanliness</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">How would you rate your current home cleanliness?</h6>

                        <input type="hidden" name="rate_home_cleanlines" value="{{ $orders_home->rate_home_cleanlines ?? 0 }}" id="rate_home_cleanlines">

                        <div class="form-group row" id="progress">
                            <span class="block-progress" data-rate="10" id="rate-10"></span>
                            <span class="block-progress" data-rate="20" id="rate-20"></span>
                            <span class="block-progress" data-rate="30" id="rate-30"></span>
                            <span class="block-progress" data-rate="40" id="rate-40"></span>
                            <span class="block-progress" data-rate="50" id="rate-50"></span>
                            <span class="block-progress" data-rate="60" id="rate-60"></span>
                            <span class="block-progress" data-rate="70" id="rate-70"></span>
                            <span class="block-progress" data-rate="80" id="rate-80"></span>
                            <span class="block-progress" data-rate="90" id="rate-90"></span>
                            <span class="block-progress" data-rate="100" id="rate-100"></span>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">cleaning before</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">Did you had a professional cleaning in past 2 months?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cleaning_before" value="yes"
                                {{ $orders_home->cleaning_before == 1 ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="cleaning_before">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="cleaning_before" value="no"
                                {{ $orders_home->cleaning_before == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleaning_before">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                @if (count($orders_photos) == 0)
                    <div class="form-group row align-items-center">
                        <div class="col-md-4">
                            <span class="text-uppercase">home photos</span>
                        </div>

                        <div class="col-md-8">
                            <h6 class="font-weight-bold">Do you have any photos of your home? (optional)</h6>
                            <span>You can upload more than one photo at a time. Up to 8 photos in total.</span>
                            <div class="form-group row flex-column">
                                <input type='file' onchange="readURL(this);" multiple name="photos[]" class="home-photos mt-2 mb-2" />
                                <img id="img-home" class="" src="http://placehold.it/100" alt="your image" />
                            </div>
                        </div>

                        @if ($errors->has('photos[]'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('photos[]') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                @endif

                <div class="form-group row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            {{ __('2 Steps Left') }}
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