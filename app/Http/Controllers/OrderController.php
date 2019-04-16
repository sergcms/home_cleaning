<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function personalInfo(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            dd($request);
        }
        
        return view('form.personal-info', [ ]);
    }

    public function home(Request $request)
    {
        // Session::remove('photos');

        if ($request->getMethod() === 'POST') {

            foreach ($request->file('photos') as $value) {
                dump($value->getClientOriginalName());
            }

            dd($request);

        }
        
        return view('form.your-home', [ ]);
    }

    public function materials(Request $request) {

        if ($request->getMethod() === 'POST') {
            dd($request);
        }

        return view('form.materials', []);
    }

    public function extra(Request $request) {

        if ($request->getMethod() === 'POST') {
            dd($request);
        }

        return view('form.extras', []);
    }

}
