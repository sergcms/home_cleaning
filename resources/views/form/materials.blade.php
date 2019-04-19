@extends('layouts.layout')

@include('header')

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
                                <input class="form-check-input" type="checkbox" id="hardwood" name="hardwood"
                                {{ $orders_materials_floor->hardwood == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="hardwood">Hardwood</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="cork" name="cork"
                                {{ $orders_materials_floor->cork == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cork">Cork</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="vinyl" name="vinyl"
                                {{ $orders_materials_floor->vinyl == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="vinyl">Vinyl</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="concrete" name="concrete"
                                {{ $orders_materials_floor->concrete == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="concrete">Concrete</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="Carpet" name="carpet"
                                {{ $orders_materials_floor->carpet == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="Carpet">Carpet</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="natural_stone" name="natural_stone"
                                {{ $orders_materials_floor->natural_stone == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="natural_stone">Natural Stone</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="tile" name="tile"
                                {{ $orders_materials_floor->tile == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="tile">Tile</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="laminate" name="laminate"
                                {{ $orders_materials_floor->laminate == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="laminate">Laminate</label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">What types of countertops in your home?</h6>

                        <div class="form-group row">
                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="concrete" name="concrete"
                                {{ $orders_materials_countertop->concrete == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="concrete">Concrete</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="quartz" name="quartz"
                                {{ $orders_materials_countertop->quartz == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="quartz">Quartz</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="cormica" name="formica"
                                {{ $orders_materials_countertop->formica == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cormica">Formica</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="granite" name="granite"
                                {{ $orders_materials_countertop->granite == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="granite">Granite</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="marble" name="marble"
                                {{ $orders_materials_countertop->marble == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="marble">Marble</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="tile" name="tile"
                                {{ $orders_materials_countertop->tile == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="tile">Tile</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="paper_stone" name="paper_stone"
                                {{ $orders_materials_countertop->paper_stone == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="paper_stone">Paper Stone</label>
                            </div>

                            <div class="form-check form-check-inline col-md-3">
                                <input class="form-check-input" type="checkbox" id="butcher_block" name="butcher_block"
                                {{ $orders_materials_countertop->butcher_block == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="butcher_block">Butcher Block</label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Are there stainless steel appliances?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="stainless_steel_application" id="" value="yes"
                                {{ $orders_material->stainless_steel_application == 1 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="stainless_steel_application">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="stainless_steel_application" id="" value="no"
                                {{ $orders_material->stainless_steel_application == 0 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="stainless_steel_application">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">What type of stove you use?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type_stove" id="" value="yes"
                                {{ $orders_material->type_stove == 1 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="type_stove">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="type_stove" id="" value="no"
                                {{ $orders_material->type_stove == 0 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="type_stove">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Are shower doors made of glass?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shower_doors_glass" id="" value="yes"
                                {{ $orders_material->shower_doors_glass == 1 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="shower_doors_glass">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="shower_doors_glass" id="" value="no"
                                {{ $orders_material->shower_doors_glass == 0 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="shower_doors_glass">
                                    No
                                </label>
                            </div>
                        </div>
                        <hr>

                        <h6 class="font-weight-bold">Any mold or mildew issues?</h6>

                        <div class="form-group row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="mold" id="" value="yes"
                                {{ $orders_material->mold == 1 ? 'checked' : ''  }}>
                                <label class="form-check-label" for="mold">
                                    Yes
                                </label>
                            </div>
        
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="mold" id="" value="no"
                                {{ $orders_material->mold == 0 ? 'checked' : ''  }}>
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
                            <textarea rows="5" cols="50" name="areas_needing_attention">{{ $orders_material->areas_needing_attention }}</textarea>
                        </div>

                        <h6 class="font-weight-bold">Anything else we shoupd know? (optional)</h6>

                        <div class="form-group row">
                            <textarea rows="5" cols="50" name="additional_info">{{ $orders_material->additional_info }}</textarea>
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