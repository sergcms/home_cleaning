<?php

// config file price cleaning

return [
    
    // max count bedrooms on form view welcome
    'count_bedrooms' => 6,

    // max count bathrooms on form view welcome
    'count_bathrooms' => 3,

    'bedrooms' => [
        1 => 100,
        2 => 120,
        3 => 130,
        4 => 150,
        5 => 180,
        6 => 200,
    ],

    'bathrooms' => [
        0.5 => 50,
        1   => 70,
        1.5 => 80,
        2   => 100,
        2.5 => 130,
        3   => 150,
    ],

    'cleaning_frequency' => 
    [
        'once'     => 1,
        'weekly'   => 0.85, 
        'biweekly' => 0.9, 
        'monthly'  => 0.95,
    ],

    'cleaning_type' =>
    [
        'deep of spring'  => 1.1, 
        'move in'         => 1.15, 
        'move out'        => 1.2, 
        'post remodeling' => 1.25,
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

    'square_footage' => 1.05,

    'pet' =>
    [
        'none' => 0,
        'dog'  => 2,
        'cat'  => 3, 
        'both' => 5,
    ],

    'count_pets' =>
    [
        'one'  =>  1.05,
        'two'  =>  1.1, 
        'more' =>  1.2,
    ],

    'adults_people' => 
    [
        'none'       =>  0,
        'one_two'    =>  3, 
        'three_four' =>  5,
        'more'       => 10,
    ],

    'children' => 
    [
        'none' =>  0,
        'one'  =>  3, 
        'two'  =>  6, 
        'more' => 10,
    ],

    'rate_home_cleanlines' => 
    [
        10  => 1.1,
        20  => 1.09,
        30  => 1.08,
        40  => 1.06,
        50  => 1.05,
        60  => 1.04,
        70  => 1.03,
        80  => 1.02,
        90  => 1,
        100 => 1,
    ],

    'cleaning_before' => 2,

    'floors' => 
    [
        'hardwood'      => 1,
        'cork'          => 1,
        'vinyl'         => 1,
        'concrete'      => 1,
        'carpet'        => 1,
        'natural_stone' => 1,
        'tile'          => 1,
        'laminate'      => 1,
    ],
    
    'countertops' => 
    [
        'concrete'      => 1,
        'quartz'        => 1,
        'formica'       => 1,
        'granite'       => 1,
        'marble'        => 1,
        'tile'          => 1,
        'paper_stone'   => 1,
        'butcher_block' => 1,
    ],

    'stainless_steel_application' => 2,

    'type_stove' => 2,

    'shower_doors_glass' => 2,

    'mold' => 10,

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

    'blinds_cleaning' => 25,

    'carpet_cleaned' => 25,
];