@extends('layouts.layout')

@include('header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Now choose some extras to finish up</h3>
            <p class="text-center">Almost there, hang on we're at the end</p>
            <hr>

            {{-- {{ $test['inside_fridge'] }} --}}

            {{-- @foreach ($test as $item)
                {{ $item }}
            @endforeach --}}

            <form method="POST" action="{{ route('extras') }}" enctype="multipart/form-data" id="form-extras">
                @csrf

                <div class="form-group row">
                    <div class="col-md-8">
                        <h6 class="font-weight-bold">Select extras</h6>

                        <div class="form-group row extras" id="extras">
                            <i class="fas fa-ice-cream {{ $order->extras->inside_fridge == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.inside_fridge') }}" 
                                data-name="Inside Fridge"
                                data-id="inside_fridge">
                            </i>
                            <i class="fas fa-calendar-week ml-3 {{ $order->extras->inside_oven == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.inside_oven') }}"
                                data-name="Inside Oven"
                                data-id="inside_oven">
                            </i>
                            <i class="fas fa-parking ml-3 {{ $order->extras->garage_swept == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.garage_swept') }}"
                                data-name="Garage Swept"
                                data-id="garage_swept">
                            </i>
                            <i class="far fa-address-book ml-3 {{ $order->extras->inside_cabinets == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.inside_cabinets') }}"
                                data-name="Inside Cabinets"
                                data-id="inside_cabinets">
                            </i>
                            <i class="fas fa-dumpster ml-3 {{ $order->extras->laundry_wash_dry == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.laundry_wash_dry') }}"
                                data-name="Laundry wash dry"
                                data-id="laundry_wash_dry">
                            </i>
                            <i class="fas fa-bed ml-3 {{ $order->extras->bed_sheet_change == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.bed_sheet_change') }}"
                                data-name="Bed sheet change"
                                data-id="bed_sheet_change">
                            </i>
                            <i class="fab fa-windows ml-3 {{ $order->extras->blinds_cleaning == 1 ? 'active' : ''}}" 
                                data-price="{{ config('price.extras.blinds_cleaning') }}"
                                data-name="Blinds Cleaning"
                                data-id="blinds_cleaning">
                            </i>
                        </div>
                        <hr>

                        <div class="col-md-8">
                            <h6 class="font-weight-bold">How often would you like us to come?</h6>
    
                            <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input cleaning_frequency" type="radio" name="cleaning_frequency" value="once" 
                                    {{ $order->personalInfo->getAttributes()['cleaning_frequency'] == 'once' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning_frequency">
                                        Once
                                    </label>
                                    <span class="cleaning-frequency" id="once">${{ $calculationSum->once }}</span>
                                </div>
            
                                <div class="form-check ml-3">
                                    <input class="form-check-input cleaning_frequency" type="radio" name="cleaning_frequency" value="weekly" 
                                    {{ $order->personalInfo->getAttributes()['cleaning_frequency'] == 'weekly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning_frequency">
                                        Weekly
                                    </label>
                                    <span class="cleaning-frequency" id="weekly">${{ $calculationSum->weekly }}</span>
                                </div>
    
                                <div class="form-check ml-3">
                                    <input class="form-check-input cleaning_frequency" type="radio" name="cleaning_frequency" value="biweekly"
                                    {{ $order->personalInfo->getAttributes()['cleaning_frequency'] == 'biweekly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning_frequency">
                                        Biweekly
                                    </label>
                                    <span class="cleaning-frequency" id="biweekly">${{ $calculationSum->biweekly }}</span>
                                </div>
            
                                <div class="form-check ml-3">
                                    <input class="form-check-input cleaning_frequency" type="radio" name="cleaning_frequency" value="monthly"
                                    {{ $order->personalInfo->getAttributes()['cleaning_frequency'] == 'monthly' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleaning_frequency">
                                        Monthly
                                    </label>
                                    <span class="cleaning-frequency" id="monthly">${{ $calculationSum->monthly }}</span>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Would you like us to perform service on weekend? (optional)</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input on_weekend" type="radio" name="on_weekend" value="1" 
                                    data-name="On weekend"
                                    data-price="{{ config('price.extras.on_weekend') }}"
                                    {{ $order->extras->on_weekend == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="on_weekend">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input on_weekend" type="radio" name="on_weekend" value="0" 
                                    data-name="On weekend"
                                    data-price="{{ config('price.extras.on_weekend') }}"
                                    {{ $order->extras->on_weekend != 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="on_weekend">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Would you like your carpet cleaned? (optional)</h6>
                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input carpet_cleaned" type="radio" name="carpet_cleaned" value="1" 
                                    data-name="Carpet cleaned"
                                    data-price="{{ config('price.extras.carpet_cleaned') }}"
                                    {{ $order->extras->carpet_cleaned == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="carpet_cleaned">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input carpet_cleaned" type="radio" name="carpet_cleaned" value="0" 
                                    data-name="Carpet cleaned"
                                    data-price="{{ config('price.extras.carpet_cleaned') }}"
                                    {{ $order->extras->carpet_cleaned != 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="carpet_cleaned">
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
                                <h6 class="text-uppercase">{{ $order->personalInfo->getAttributes()['cleaning_date'] }}</h6>
                                <span>  
                                    {{ $order->bedrooms }} bed(s),
                                    {{ $order->bathrooms }} bath(s) - 
                                    {{ $order->square_footage }} sq. ft.
                                </span>
                            </div>
                            <ul class="list-group list-group-flush" id="list-services">
                                <li class="list-group-item">Per cleaning - $138</li>
                                <li class="list-group-item">Initial cleaning - $138</li>
                                @foreach ($order->extras->getAttributes() as $key => $value)
                                    @if ($value === 1)
                                        <li class='list-group-item extra' id='{{ $key }}'>{{ $key }} - ${{ config('price.extras.' . $key) }}</li>
                                    @endif
                                @endforeach
                                {{-- <li class="list-group-item">Coupan - $0</li> --}}
                            </ul>
                            <div class="card-footer text-uppercase" id="total-price" data-price={{ $calculationSum->total_sum }}>
                                today's total ${{ $calculationSum->total_sum }} 
                            </div>
                            <input type="hidden" name="total_sum" id="total-sum" value="{{ $calculationSum->total_sum }}">
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