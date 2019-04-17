<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{
    
    private $welcome_rules = 
    [
        'bedrooms'  => ['required', 'between:1,6'],
        'bathrooms' => ['required', 'between:0.5,3'],
        'zip_code'  => ['required', 'digits_between:5,7'],
        'email'     => ['required', 'string', 'email', 'max:255'],
    ];

    private $personal_info_rules = 
    [
        'first_name'     => ['required', 'string'],
        'last_name'      => ['required', 'string'],
        'address'        => ['required', 'string'],
        'apt'            => ['required', 'numeric'],
        'city'           => ['required', 'string'],
        'square_footage' => ['required', 'numeric'],
        'phone'          => ['required'],
    ];

    public function validator(Request $request, $rules)
    {
        return Validator::make($request->all(), $rules)->validate();
    }
    
    public function sessionPut($data, $name)
    {
        foreach ($data as $key => $value) {
            if ($key !== "_token") {
                Session::put($name.'.'.$key, $value);
            }
        }
    }

    // 
    public function welcome(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $this->validator($request, $this->welcome_rules);

            $this->sessionPut($request->all(), 'welcome');

            $user = User::where('email', $request->email)->first();

            return redirect()->route('personal-info')->with(['user' => $user]);
        }

        return view('welcome');
    }

    public function personalInfo(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $this->validator($request, $this->personal_info_rules);

            $this->sessionPut($request->all(), 'personal_info');

            User::updateOrCreate(
                ['email' => Session::get('welcome.email')],
                [
                    'first_name'     => $request->first_name,
                    'last_name'      => $request->last_name,
                    'address'        => $request->address,
                    'apt'            => $request->apt,
                    'city'           => $request->city,
                    'square_footage' => $request->square_footage,
                    'phone'          => $request->phone,
                    'hear_about_us'  => $request->hear_about_us,
                    'email'          => Session::get('welcome.email'),
                    'zip_code'       => Session::get('welcome.zip_code'),
                ]
            );

            return redirect()->route('your-home');
        }
        
        return view('form.personal-info');
    }

    public function home(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            // foreach ($request->file('photos') as $value) {
            //     dump($value->getClientOriginalName());
            // }
            dd(Session::all());

            return redirect()->route('materials');
        }
        
        return view('form.your-home');
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
