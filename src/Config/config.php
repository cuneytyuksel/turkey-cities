<?php
/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 17/04/2017
 * Time: 16:54
 */

return [
    'data_path' => __DIR__ . '/../Data/pk_20220810.xlsx', // set your default PTT cities xlsx file.

    'models' => [
        'city' => 'Turkey\Cities\Models\City',
        'county' => 'Turkey\Cities\Models\County',
        'district' => 'Turkey\Cities\Models\District',
        'neighborhood' => 'Turkey\Cities\Models\Neighborhood'
    ],

    //Database table name for models
    'tables' => [
        'city' => 'cities',
        'county' => 'counties',
        'district' => 'districts',
        'neighborhood' => 'neighborhoods'
    ],

    //Import settings
    'import' => [
        'county' => true,
        'district' => true,
        'neighborhood' => true
    ]
];
