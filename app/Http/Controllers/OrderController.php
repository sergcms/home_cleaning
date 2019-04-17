<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use Validator;
use App\OrdersHome;
use App\OrdersPhoto;
use App\OrdersMaterial;
use App\OrdersPersonalInfo;
use Illuminate\Http\Request;
use App\OrdersMaterialsFloor;
use App\OrdersMaterialsCountertop;
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

    private $your_home_rules = 
    [
        'rate_home_cleanlines' => ['required', 'in:10,20,30,40,50,60,70,80,90,100'],
        'photos.*'             => ['mimes:jpeg,jpg,png', 'between:30,5000'],
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
            if ($key !== "_token" && $key !== "photos") {
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
                $order = Order::create(
                    [
                        'user_id'        => $user->id, 
                        'bedrooms'       => Session::get('welcome.bedrooms'),
                        'bathrooms'      => Session::get('welcome.bathrooms'),
                        'zip_code'       => Session::get('welcome.zip_code'),
                        'address'        => $request->address,
                        'apt'            => $request->apt,
                        'city'           => $request->city,
                        'square_footage' => $request->square_footage,
                        'phone'          => $request->phone,
                    ]
                );
            }

            OrdersPersonalInfo::create(
                [
                    'order_id'           => $order->id,
                    'cleaning_frequency' => $request->cleaning_frequency,
                    'cleaning_type'      => $request->cleaning_type,
                    'cleaning_date'      => $request->cleaning_date, 
                ]
            );

            $this->sessionPut($request->all(), 'personal_info');
            
            Session::put('personal_info.id', $order->id);

            return redirect()->route('your-home');
        }
        
        return view('form.personal-info');
    }

    public function home(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $this->validator($request->all(), $this->your_home_rules);

            // save photos home 
            $this->savePhotosHome($request->file('photos'));

            OrdersHome::create(
                [
                    'order_id'             => Session::get('personal_info.id'),
                    'pet'                  => $request->pet,
                    'count_pets'           => $request->pet == 'none' ? 'none' : $request->count_pets,
                    'adults_people'        => $request->adults_people,
                    'children'             => $request->children,
                    'rate_home_cleanlines' => $request->rate_home_cleanlines,
                    'cleaning_before'      => $request->cleaning_before == 'yes' ? 1 : 0,
                ]
            );

            $this->sessionPut($request->all(), 'your_home');

            return redirect()->route('materials');
        }
        
        return view('form.your-home');
    }

    public function materials(Request $request) 
    {
        if ($request->getMethod() === 'POST') {

            OrdersMaterialsFloor::create(
                [
                    'order_id'      => Session::get('personal_info.id'),
                    'hardwood'      => $request->has('hardwood'),
                    'cork'          => $request->has('cork'),
                    'vinyl'         => $request->has('vinyl'),
                    'concrete'      => $request->has('concrete'),
                    'carpet'        => $request->has('carpet'),
                    'natural_stone' => $request->has('natural_stone'),
                    'tile'          => $request->has('tile'),
                    'laminate'      => $request->has('laminate'),
                ]
            );

            OrdersMaterialsCountertop::create(
                [
                    'order_id'      => Session::get('personal_info.id'),
                    'concrete'      => $request->has('concrete'),
                    'quartz'        => $request->has('quartz'),
                    'formica'       => $request->has('formica'),
                    'granite'       => $request->has('granite'),
                    'marble'        => $request->has('marble'),
                    'tile'          => $request->has('tile'),
                    'paper_stone'   => $request->has('paper_stone'),
                    'butcher_block' => $request->has('butcher_block'),
                ]
            );
            
            OrdersMaterial::create(
                [
                    'order_id'                    => Session::get('personal_info.id'),
                    'stainless_steel_application' => $request->stainless_steel_application == "yes" ? 1 : 0,
                    'type_stove'                  => $request->type_stove == "yes" ? 1 : 0,
                    'shower_doors_glass'          => $request->shower_doors_glass == "yes" ? 1 : 0,
                    'mold'                        => $request->mold == "yes" ? 1 : 0,
                    'areas_needing_attention'     => htmlspecialchars($request->areas_needing_attention),
                    'additional_info'             => htmlspecialchars($request->additional_info),
                ]
            );

            $this->sessionPut($request->all(), 'materials');

            return redirect()->route('extras');
        }

        return view('form.materials');
    }

    public function extras(Request $request) {

        dump(Session::all());

        // Order::where('id', Session::get('personal_info.id'))
                // ->update([ 'total_sum' => 200]);

        if ($request->getMethod() === 'POST') {

            OrderExtra::updateOrCreate(
                [ 'order_id', Session::get('personal_info.id') ],
                [
                    'inside_fridge'    => $request->inside_fridge,
                    'inside_oven'      => $request->inside_oven,
                    'garage_swept'     => $request->garage_swept,
                    'inside_cabinets'  => $request->inside_cabinets,
                    'laundry_wash_dry' => $request->laundry_wash_dry,
                    'bed_sheet_change' => $request->bed_sheet_change,
                    'blinds_cleaning'  => $request->blinds_cleaning,
                    'on_weekend'       => $request->on_weekend == 'yes' ? 1 : 0,
                    'carpet_cleaned'   => $request->carpet_cleaned == 'yes' ? 1 : 0,
                ]
            );

            $this->sessionPut($request->all(), 'extras');

            // return redirect()->route('paymant');
        }

        return view('form.extras');
    }


    public function savePhotosHome($photos)
    {
        // if (count($photos) > 8) {
        //     return $message = 'Count photos not be most 8';
        // }

        foreach ($photos as $photo) {

            Storage::putFileAs('/public/images', $photo, $photo->hashName());        

            OrdersPhoto::create([
                'order_id' => Session::get('personal_info.id'),
                'url'      => '/images/' . $photo->hashName() 
            ]);
        }
    }
}
