<?php

namespace App;

use Session;
use App\Order;
use App\OrdersHome;
use App\OrdersPersonalInfo;
use App\OrdersMaterialsFloor;
use Illuminate\Database\Eloquent\Model;

class CalculationSum extends Model
{
    public function calculationOrder()
    {
        $order = Order::find(Session::get('info.order_id'));

        $sum  = config('price.bedrooms.'.$order->bedrooms);
        $sum += config('price.bathrooms.' . $order->bathrooms);
        $sum += $order->square_footage * config('price.square_footage');

        return $sum;
    }

    public function calculationOrderPersonalInfo()
    {
        $personalInfo = OrdersPersonalInfo::where('order_id', Session::get('info.order_id'))->first();

        $sum  = $this->calculationOrder() * config('price.cleaning_frequency.' . $personalInfo->cleaning_frequency);
        $sum *= config('price.cleaning_type.' . $personalInfo->cleaning_type);
        $sum += config('price.cleaning_date.' . $personalInfo->cleaning_date);

        return $sum;
    }

    public function calculationOrderHome()
    {
        $home = OrdersHome::where('order_id', Session::get('info.order_id'))->first();
        
        $sum = $this->calculationOrderPersonalInfo();

        if ($home->pet !== 'none') {
            $sum += config('price.pet.' . $home->pet);
            $sum *= config('price.count_pets.' . $home->count_pets);
        }

        $sum += config('price.adults_people.' . $home->adults_people);
        $sum += config('price.children.' . $home->children);
        $sum *= config('price.rate_home_cleanlines.' . $home->rate_home_cleanlines);
        $sum += !$home->cleaning_before ? config('price.cleaning_before') : 0;

        return $sum;
    }

    public function checkField(string $key, $value, string $nameArrPrice)
    {
        $val = 0;

        foreach (config('price.' . $nameArrPrice) as $k => $v) {
            if ($key === $k && $value != 0) {
                $val = config('price.' . $nameArrPrice . '.' . $key);
            }
        }

        return $val;
    }

    public function calculationOrderMaterialsFloor()
    {
        $materials_floor = OrdersMaterialsFloor::where('order_id', Session::get('info.order_id'))->first();
        $sum = 0;

        foreach ($materials_floor->attributes as $key => $value) {
            $sum += $this->checkField($key, $value, 'floors');
        }

        return $sum;
    }

    public function calculationOrderMaterialsCountertop()
    {
        $materials_countertop = OrdersMaterialsCountertop::where('order_id', Session::get('info.order_id'))->first();
        $sum=0;

        foreach ($materials_countertop->attributes as $key => $value) {
            $sum += $this->checkField($key, $value, 'countertops');
        }

        return $sum;
    }

    public function calculationMaterials()
    {
        $sum = $this->calculationOrderHome() 
            + $this->calculationOrderMaterialsFloor()
            + $this->calculationOrderMaterialsCountertop();
        
        $materials = OrdersMaterial::where('order_id', Session::get('info.order_id'))->first();

        $sum += $materials->stainless_steel_application? config('price.stainless_steel_application') : 0;
        $sum += $materials->type_stove ? config('price.type_stove') : 0;
        $sum += $materials->shower_doors_glass ? config('price.shower_doors_glass') : 0;
        $sum += $materials->mold ? config('price.mold') : 0;

        return $sum;
    }

    public function calculationExtras()
    {
        $extra = OrdersExtra::where('order_id', Session::get('info.order_id'))->first();
        $sum=0;

        if (isset($extra->attributes)) {
            foreach ($extra->attributes as $key => $value) {
                $sum += $this->checkField($key, $value, 'extra');
            }
        }

        return $sum;
    }

    public function totalSum()
    {
        dump($this->calculationExtras());

        $total_sum = $this->calculationMaterials();

        return round($total_sum, 2);
    }
}
