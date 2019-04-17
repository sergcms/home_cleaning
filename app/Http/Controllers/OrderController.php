<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use Validator;
use App\OrdersPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    private $photo = [
        'photo' => ['mimes:jpeg,jpg,png', 'size:5000']
    ];

    // Validate data
    public function validator($data, $rules)
    {
        return Validator::make($data, $rules)->validate();
    }
    
    // Put in session array data
    public function sessionPut($data, $name)
    {
        foreach ($data as $key => $value) {
            if ($key !== "_token") {
                Session::put($name.'.'.$key, $value);
            }
        }
    }

    public function welcome(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $this->validator($request->all(), $this->welcome_rules);

            $this->sessionPut($request->all(), 'welcome');

            $user = User::where('email', $request->email)->first();

            return redirect()->route('personal-info')->with(['user' => $user]);
        }

        return view('welcome');
    }

    public function personalInfo(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $this->validator($request->all(), $this->personal_info_rules);

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
            
            $user = User::where('email', Session::get('welcome.email'))->first();

            if ($user) {
                Order::create(
                    [
                        'user_id'   => $user->id, 
                        'bedrooms'  => Session::get('welcome.bedrooms'),
                        'bathrooms' => Session::get('welcome.bathrooms'),
                        'zip_code'  => Session::get('welcome.zip_code'),
                        'address'        => $request->address,
                        'apt'            => $request->apt,
                        'city'           => $request->city,
                        'square_footage' => $request->square_footage,
                        'phone'          => $request->phone,
                    ]
                );
            }

            return redirect()->route('your-home');
        }
        
        return view('form.personal-info');
    }

    public function home(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            dump(Session::all());
            
            // save photos home 
            $this->savePhotosHome($request->file('photos'));


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


    public function savePhotosHome($photos)
    {
        if (count($photos) > 8) {
            return $message = 'Count photos not be most 8';
        }
        
        foreach ($photos as $photo) {

            // $this->validator($photo);

            Storage::putFileAs('/public/images', $photo, $photo->getClientOriginalName());        

            OrdersPhoto::create([
                // 'order' => 
                'url'   => '/images/' . $photo->getClientOriginalName() 
            ]);

            
        }
    }

}
