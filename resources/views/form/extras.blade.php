@extends('layouts.layout')

@include('header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Now choose some extras to finish up</h3>
            <p class="text-center">Almost there, hang on we're at the end</p>
            <hr>

            <form method="POST" action="{{ route('extras') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="col-md-8">
                        <h6 class="font-weight-bold">Select extras</h6>

                        <div class="form-group row" id="extras">
                            <i class="fas fa-ice-cream" 
                                data-price="{{ config('price.inside_fridge') }}" 
                                data-name="Inside Fridge">
                            </i>
                            <i class="fas fa-calendar-week ml-3" 
                                data-price="{{ config('price.inside_oven') }}"
                                data-name="Inside Oven">
                            </i>
                            <i class="fas fa-parking ml-3" 
                                data-price="{{ config('price.garage_swept') }}"
                                data-name="Garage Swept">
                            </i>
                            <i class="far fa-address-book ml-3" 
                                data-price="{{ config('price.inside_cabinets') }}"
                                data-name="Inside Cabinets">
                            </i>
                            <i class="fas fa-dumpster ml-3" 
                                data-price="{{ config('price.laundry_wash_dry') }}"
                                data-name="Laundry wash dry">
                            </i>
                            <i class="fas fa-bed ml-3" 
                                data-price="{{ config('price.bed_sheet_change') }}"
                                data-name="Bed sheet change">
                            </i>
                            <i class="fab fa-windows ml-3" 
                                data-price="{{ config('price.blinds_cleaning') }}"
                                data-name="Blings Cleaning">
                            </i>
                        </div>
                        <hr>

                        <div class="col-md-8">
                            <h6 class="font-weight-bold">How often would you like us to come?</h6>
    
                            <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="once" {{ Session::get('personal_info.cleaning_frequency') == 'once' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning-frequency">
                                        Once
                                    </label>
                                </div>
            
                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="weekly" {{ Session::get('personal_info.cleaning_frequency') == 'weekly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning-frequency">
                                        Weekly
                                    </label>
                                </div>
    
                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="biweekly" {{ Session::get('personal_info.cleaning_frequency') == 'biweekly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning-frequency">
                                        Biweekly
                                    </label>
                                </div>
            
                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" name="cleaning_frequency" id="cleaning-frequency" value="monthly" {{ Session::get('personal_info.cleaning_frequency') == 'monthly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning-frequency">
                                        Monthly
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Would you like us to perform service on weekend? (optional)</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stainless_steel_application" id="" value="yes" checked>
                                <label class="form-check-label" for="stainless_steel_application">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="stainless_steel_application" id="" value="no">
                                <label class="form-check-label" for="stainless_steel_application">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Would you like your carpet cleaned? (optional)</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_stove" id="" value="yes" checked>
                                <label class="form-check-label" for="type_stove">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="type_stove" id="" value="no">
                                <label class="form-check-label" for="type_stove">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                    </div>   
                    
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header text-uppercase">
                              Cleaning price
                            </div>
                            <div class="text-center mt-3 mb-3">
                                <h6 class="text-uppercase">{{ Session::get('personal_info.cleaning_date') }}</h6>
                                <span>  
                                    {{ Session::get('welcome.bedrooms') }} bed(s),
                                    {{ Session::get('welcome.bathrooms') }} bath(s) - 
                                    {{ Session::get('personal_info.square_footage') }} sq. ft.
                                </span>
                            </div>
                            <ul class="list-group list-group-flush" id="list-services">
                                <li class="list-group-item">Per cleaning - $138</li>
                                <li class="list-group-item">Initial cleaning - $138</li>
                                {{-- <li class="list-group-item">Coupan - $0</li> --}}

                            </ul>
                            <div class="card-footer text-uppercase" id="total-price">
                                today's total $138 
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            {{ __('Reserve a cleaned') }}
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