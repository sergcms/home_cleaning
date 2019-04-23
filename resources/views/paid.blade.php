@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center m-auto mt-3 mb-3">
        <div class="col-md-6">
            <h1 class="card-title text-center">{{ $message }}</h1>
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