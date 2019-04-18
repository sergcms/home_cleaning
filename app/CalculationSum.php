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
        $order = Order::find(Session::get('personal_info.id'));

        dd($order);

        $sum  = config('price.bedrooms.'.$order->bedrooms);
        $sum += config('price.bathrooms.' . $order->bathrooms);
        $sum += $order->square_footage * config('price.square_footage');

        return $sum;
    }

    public function calculationOrderPersonalInfo()
    {
        $personalInfo = OrdersPersonalInfo::where('order_id', Session::get('personal_info.id'))->first();

        $sum  = $this->calculationOrder() * config('price.cleaning_frequency.' . $personalInfo->cleaning_frequency);
        $sum *= config('price.cleaning_type.' . $personalInfo->cleaning_type);
        $sum += config('price.cleaning_date.' . $personalInfo->cleaning_date);

        return $sum;
    }

    public function calculationOrderHome()
    {
        $home = OrdersHome::where('order_id', Session::get('personal_info.id'))->first();
        
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

    public function checkField(string $key, $nameArrPrice, array $arrKeys)
    {
        foreach ($arrKeys as $value) {
            $sum = $key !== $value ? config('price.' . $nameArrPrice . '.' . $key) : 0;
            dump($sum);
        }
    }

    public function calculationOrderMaterialsFloor()
    {
        $materials_floor = OrdersMaterialsFloor::where('order_id', Session::get('personal_info.id'))->first();

        $sum = 0;

        foreach ($materials_floor->attributes as $key => $value) {
            $this->checkField($key, ['id', 'floors', 'order_id', 'created_at', 'updated_at']);
        }

        dd($materials_floor);

        return $sum;
    }

    public function calculationOrderMaterialsCountertop()
    {


        return $sum;
    }

    public function calculationMaterials()
    {
        $sum = $this->calculationOrderHome() 
            + $this->calculationOrderMaterialsFloor()
            + $this->calculationOrderMaterialsCountertop();

        
        return $sum;
    }

    public function totalSum()
    {
        $total_sum = $this->calculationMaterials();

        dd();

        return $total_sum;
    }
}
