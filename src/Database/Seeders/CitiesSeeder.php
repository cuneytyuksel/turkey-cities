<?php namespace Turkey\Cities\Database\Seeders;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 17/04/2017
 * Time: 16:45
 */

use Turkey\Cities\Imports\DataImport;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Maatwebsite\Excel\Facades\Excel::import(new DataImport, config('turkey-cities.data_path'));
    }
}
