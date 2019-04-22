<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Order;
use Validator;
use App\Models\OrdersHome;
use App\Models\OrdersExtra;
use App\Models\OrdersPhoto;
use App\CalculationSum;
use App\Models\OrdersMaterial;
use App\Models\OrdersPersonalInfo;
use Illuminate\Http\Request;
use App\Models\OrdersMaterialsFloor;
use App\Models\OrdersMaterialsCountertop;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    
    // validate rules for view welcome
    private $welcome_rules = 
    [
        'bedrooms'  => ['required', 'between:1,6'],
        'bathrooms' => ['required', 'between:0.5,3'],
        'zip_code'  => ['required', 'digits_between:5,7'],
        'email'     => ['required', 'string', 'email', 'max:255'],
    ];

    // validate rules for view personal-info 
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

    // validate rules for view your-home
    private $your_home_rules = 
    [
        'rate_home_cleanlines' => ['required', 'in:0,10,20,30,40,50,60,70,80,90,100'],
        'photos.*'             => ['mimes:jpeg,jpg,png', 'between:30,5000'],
    ];

    /*
    *
    */
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
        if (Session::get('info.order_id')) {
            $order = Order::where('id', Session::get('info.order_id'))->first();
            
            $user = $order->user;
                
            $info = array_merge($order->toArray(), $user->toArray()) ?? new Order;
        } else {
            $info = Session::get('info') ?? new Order;
        }
        
        if ($request->getMethod() === 'POST') {

            $this->validator($request->all(), $this->welcome_rules);

            $this->sessionPut($request->all(), 'info');

            $user = User::where('email', $request->email)->first();

            return redirect()->route('personal-info');
        }

        return view('welcome', ['info' => (object)$info]);
    }

    public function personalInfo(Request $request)
    {
        if (Session::get('info.order_id')) {
            $orders_personal_info = OrdersPersonalInfo::where('order_id', Session::get('info.order_id'))->first();

            $order = $orders_personal_info->order;
        }  else {
            $order = User::where('email', Session::get('info.email'))->first();
        }
        
        if ($request->getMethod() === 'POST') {

            $this->validator($request->all(), $this->personal_info_rules);

            User::updateOrCreate(
                ['email' => Session::get('info.email')],
                [
                    'first_name'     => $request->first_name,
                    'last_name'      => $request->last_name,
                    'address'        => $request->address,
                    'apt'            => $request->apt,
                    'city'           => $request->city,
                    'square_footage' => $request->square_footage,
                    'phone'          => $request->phone,
                    'hear_about_us'  => $request->hear_about_us,
                    'email'          => Session::get('info.email'),
                    'zip_code'       => Session::get('info.zip_code'),
                ]
            );
            
            $user = User::where('email', Session::get('info.email'))->first();

            if ($user) {
                $order = Order::updateOrCreate(
                    [ 'id' => Session::get('info.order_id') ],
                    [
                        'user_id'        => $user->id, 
                        'bedrooms'       => Session::get('info.bedrooms'),
                        'bathrooms'      => Session::get('info.bathrooms'),
                        'zip_code'       => Session::get('info.zip_code'),
                        'first_name'     => $request->first_name,
                        'last_name'      => $request->last_name,
                        'address'        => $request->address,
                        'apt'            => $request->apt,
                        'city'           => $request->city,
                        'square_footage' => $request->square_footage,
                        'phone'          => $request->phone,
                    ]
                );
            }

            OrdersPersonalInfo::updateOrCreate(
                [ 'id' => Session::get('info.order_id') ],
                [
                    'order_id'           => $order->id,
                    'cleaning_frequency' => $request->cleaning_frequency,
                    'cleaning_type'      => $request->cleaning_type,
                    'cleaning_date'      => $request->cleaning_date, 
                ]
            );

            Session::put('info.user_id', $user->id);
            Session::put('info.order_id', $order->id);

            return redirect()->route('your-home');
        }
        
        return view('form.personal-info', [
            'order' => $order ?? new Order, 
            'orders_personal_info' => $orders_personal_info ?? new OrdersPersonalInfo
        ]);
    }

    public function home(Request $request)
    {
        // Get collecion OrdersHome 
        $orders_home   = OrdersHome::where('order_id', Session::get('info.order_id'))->first();
        // Get colection OrdersPhoto 
        $orders_photos = OrdersPhoto::where('order_id', Session::get('info.order_id'))->get();

        if ($request->getMethod() === 'POST') {
            // validate data
            $this->validator($request->all(), $this->your_home_rules);
            
            if ($request->file('photos')) {
                // save photos 
                $this->savePhotosHome($request->file('photos'));
            }
            
            OrdersHome::updateOrCreate(
                ['order_id' => Session::get('info.order_id')],
                [
                    'order_id'             => Session::get('info.order_id'),
                    'pet'                  => $request->pet,
                    'count_pets'           => $request->pet == 'none' ? 'none' : $request->count_pets,
                    'adults_people'        => $request->adults_people,
                    'children'             => $request->children,
                    'rate_home_cleanlines' => $request->rate_home_cleanlines,
                    'cleaning_before'      => $request->cleaning_before == 'yes' ? 1 : 0,
                ]
            );

            return redirect()->route('materials');
        }
        
        return view('form.your-home', [
            'orders_home'   => $orders_home ?? new OrdersHome,
            'orders_photos' => $orders_photos,
        ]);
    }

    public function materials(Request $request) 
    {
        $orders_materials_floor = OrdersMaterialsFloor::where('order_id', Session::get('info.order_id'))->first();
        $orders_materials_countertop = OrdersMaterialsCountertop::where('order_id', Session::get('info.order_id'))->first();
        $orders_material = OrdersMaterial::where('order_id', Session::get('info.order_id'))->first();

        if ($request->getMethod() === 'POST') {

            OrdersMaterialsFloor::updateOrCreate(
                ['order_id' => Session::get('info.order_id')],
                [
                    'order_id'      => Session::get('info.order_id'),
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

            OrdersMaterialsCountertop::updateOrCreate(
                ['order_id' => Session::get('info.order_id')],
                [
                    'order_id'      => Session::get('info.order_id'),
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
            
            OrdersMaterial::updateOrCreate(
                ['order_id' => Session::get('info.order_id')],
                [
                    'order_id'                    => Session::get('info.order_id'),
                    'stainless_steel_application' => $request->stainless_steel_application == "yes" ? 1 : 0,
                    'type_stove'                  => $request->type_stove == "yes" ? 1 : 0,
                    'shower_doors_glass'          => $request->shower_doors_glass == "yes" ? 1 : 0,
                    'mold'                        => $request->mold == "yes" ? 1 : 0,
                    'areas_needing_attention'     => htmlspecialchars($request->areas_needing_attention),
                    'additional_info'             => htmlspecialchars($request->additional_info),
                ]
            );

            return redirect()->route('extras');
        }

        return view('form.materials', [
            'orders_materials_floor'      => $orders_materials_floor ?? new OrdersMaterialsFloor,
            'orders_materials_countertop' => $orders_materials_countertop ?? new OrdersMaterialsCountertop,
            'orders_material'             => $orders_material ?? new OrdersMaterial,
        ]);
    }

    public function extras(Request $request) 
    {
        $calculationSum = new CalculationSum();
        // calculation total sum
        $total_sum = $calculationSum->totalSum();
        // Get model Order
        $order = Order::find(Session::get('info.order_id'));

        // if method post then save data in table 
        if ($request->getMethod() === 'POST') {  
            
            Order::where('id', Session::get('info.order_id'))->update([
                'total_sum' => $total_sum,
            ]);

            return redirect()->route('payment');
        }

        return view('form.extras', [
            'order'               => $order ?? new Order,
            'calculationSum'      => $calculationSum,    
        ]);
    }

    public function calculationExtras(Request $request)
    {
        OrdersExtra::updateOrCreate(
            [ 'order_id' => Session::get('info.order_id') ],
            [
                'inside_fridge'    => $request->inside_fridge,
                'inside_oven'      => $request->inside_oven,
                'garage_swept'     => $request->garage_swept,
                'inside_cabinets'  => $request->inside_cabinets,
                'laundry_wash_dry' => $request->laundry_wash_dry,
                'bed_sheet_change' => $request->bed_sheet_change,
                'blinds_cleaning'  => $request->blinds_cleaning,
                'on_weekend'       => $request->on_weekend,
                'carpet_cleaned'   => $request->carpet_cleaned,
            ]
        );

        OrdersPersonalInfo::where('order_id', Session::get('info.order_id'))
            ->update(
                [
                    'cleaning_frequency' => $request->cleaning_frequency,
                ]
        );

        $calculationSum = new CalculationSum();

        // calculation total sum
        $total_sum = $calculationSum->totalSum();

        return response()->json([
            'once'      => $calculationSum->once,
            'weekly'    => $calculationSum->weekly,
            'biweekly'  => $calculationSum->biweekly,
            'monthly'   => $calculationSum->monthly,
            'total_sum' => $total_sum
            
        ]);
    }

    public function savePhotosHome($photos)
    {
        if (count($photos) > 8) {
            return $message = 'Count photos not be most 8';
        }

        foreach ($photos as $photo) {
            // save photo
            Storage::putFileAs('/public/images', $photo, $photo->hashName());        

            // create record in table orders_photos 
            OrdersPhoto::create([
                'order_id' => Session::get('info.order_id'),
                'url'      => '/images/' . $photo->hashName() 
            ]);
        }
    }
}
