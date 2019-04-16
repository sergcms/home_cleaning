@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="card-title text-center">Now we need information about your home</h3>
            <p class="text-center">This information will be used to prepare for a cleaning</p>
            <hr>

            <form method="POST" action="{{ route('materials') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">living creatures</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">What types of flooring in your home?</h6>

                        <div class="form-group row">
                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="hardwood" name="hardwood">
                                <label class="form-check-label" for="hardwood">Hardwood</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="cork" name="cork">
                                <label class="form-check-label" for="cork">Cork</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="vinyl" name="vinyl">
                                <label class="form-check-label" for="vinyl">Vinyl</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="concrete" name="concrete">
                                <label class="form-check-label" for="concrete">Concrete</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="Carpet" name="carpet">
                                <label class="form-check-label" for="Carpet">Carpet</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="natural_stone" name="natural_stone">
                                <label class="form-check-label" for="natural_stone">Natural Stone</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="tile" name="tile">
                                <label class="form-check-label" for="tile">Tile</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="laminate" name="laminate">
                                <label class="form-check-label" for="laminate">Laminate</label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">What types of countertops in your home?</h6>

                        <div class="form-group row">
                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="concrete" name="concrete">
                                <label class="form-check-label" for="concrete">Concrete</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="quartz" name="quartz">
                                <label class="form-check-label" for="quartz">Quartz</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="cormica" name="formica">
                                <label class="form-check-label" for="cormica">Formica</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="granite" name="granite">
                                <label class="form-check-label" for="granite">Granite</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="marble" name="marble">
                                <label class="form-check-label" for="marble">Marble</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="tile" name="tile">
                                <label class="form-check-label" for="tile">Tile</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="paper_stone" name="paper_stone">
                                <label class="form-check-label" for="paper_stone">Paper Stone</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="butcher_block" name="butcher_block">
                                <label class="form-check-label" for="butcher_block">Butcher Block</label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Are there stainless steel appliances?</h6>

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

                        <h6 class="font-weight-bold">What type of stove you use?</h6>

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

                        <h6 class="font-weight-bold">Are shower doors made of glass?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shower_doors_glass" id="" value="yes" checked>
                                <label class="form-check-label" for="shower_doors_glass">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="shower_doors_glass" id="" value="no">
                                <label class="form-check-label" for="shower_doors_glass">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Any mold or mildew issues?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mold" id="" value="yes" checked>
                                <label class="form-check-label" for="mold">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="mold" id="" value="no">
                                <label class="form-check-label" for="mold">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>          
                </div>
                <hr>

                <div class="form-group row align-items-center">
                    <div class="col-md-4">
                        <span class="text-uppercase">additional info</span>
                    </div>

                    <div class="col-md-8">
                        <h6 class="font-weight-bold">Are there areas needing special attention? (optional)</h6>

                        <div class="form-group row">
                            <textarea rows="5" cols="50" name="areas_needing_attention"></textarea>
                        </div>

                        <h6 class="font-weight-bold">Anything else we shoupd know? (optional)</h6>

                        <div class="form-group row">
                            <textarea rows="5" cols="50" name="additional_info"></textarea>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row mt-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            {{ __('1 Steps Left') }}
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