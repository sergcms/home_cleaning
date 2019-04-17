<?php

// config file price cleaning

return [
    
    // max count bedrooms on form view welcome
    'count_bedrooms' => 6,

    // max count bathrooms on form view welcome
    'count_bathrooms' => 3,

    'cleaning_frequency' => 
    [
        'once'     => 100,
        'weekly'   => 138, 
        'biweekly' => 174, 
        'monthly'  => 194,
    ],

    'cleaning_type' =>
    [
        'deep of spring'  => 11, 
        'move in'         => 20, 
        'move out'        => 30, 
        'post remodeling' => 100,
    ],

    'cleaning_date' =>
    [
        'next available'  => 40, 
        'this week'       => 30, 
        'next week'       => 20, 
        'this month'      => 10, 
        'i am flexible'   => 30, 
        'just need quote' => 50,
    ],

    'square_footage' => 1.5,

    'pet' =>
    [
        'none' =>  0,
        'dog'  => 10,
        'cat'  => 10, 
        'both' => 20,
    ],

    'count_pets' =>
    [
        'none' =>  0,
        'one'  => 10,
        'two'  => 20, 
        'more' => 30,
    ],

    'adults_people' => 
    [
        'none'        =>  0,
        'one_two'     => 10, 
        'three_four'  => 20,
        'more'        => 30,
    ],

    'children' => 
    [
        'none' =>  0,
        'one'  => 20, 
        'two'  => 30, 
        'more' => 40,
    ],

    'rate_home_cleanlines' => 
    [
        10  => 50,
        20  => 45,
        30  => 40,
        40  => 35,
        50  => 30,
        60  => 25,
        70  => 20,
        80  => 15,
        90  => 10,
        100 => 0,
    ],

    'cleaning_before' => 
    [
        'yes' =>  0,
        'no'  => 10,
    ],

    'floors' => 
    [
        'hardwood'      => 5,
        'cork'          => 5,
        'vinyl'         => 5,
        'concrete'      => 5,
        'carpet'        => 5,
        'natural_stone' => 5,
        'tile'          => 5,
        'laminate'      => 5,
    ],
    
    'countertops' => 
    [
        'concrete'      => 5,
        'quartz'        => 5,
        'formica'       => 5,
        'granite'       => 5,
        'marble'        => 5,
        'tile'          => 5,
        'paper_stone'   => 5,
        'butcher_block' => 5,
    ],

    'extras' => 
    [
        'inside_fridge'    => 5,
        'inside_oven'      => 5,
        'garage_swept'     => 5,
        'inside_cabinets'  => 5,
        'laundry_wash_dry' => 5,
        'bed_sheet_change' => 5,
        'blinds_cleaning'  => 5,
        'on_weekend'       => 5,
        'carpet_cleaned'   => 5,
    ],

    'stainless_steel_application' =>
    [
        'yes' => 10,
        'no'  =>  0,
    ],

    'type_stove' =>
    [
        'yes' => 10,
        'no'  =>  0,
    ],

    'shower_doors_glass' =>
    [
        'yes' => 20,
        'no'  =>  0,
    ],

    'mold' =>
    [
        'yes' => 20,
        'no'  =>  0,
    ],

    'inside_fridge' => 25,

    'inside_oven'   => 25,

    'garage_swept'  => 25,

    'inside_cabinets' => 25,

    'laundry_wash_dry' => 25,

    'bed_sheet_change' => 25,

    'blinds_cleaning' => 25,

    'carpet_cleaned' => 25,
];