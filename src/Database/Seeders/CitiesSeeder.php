<?php namespace Turkey\Cities\Database\Seeders;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 17/04/2017
 * Time: 16:45
 */

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
        dd($this->readXlsxData());
    }

    private function readXlsxData()
    {
        try {
            $data = \Maatwebsite\Excel\Facades\Excel::load(config('turkey-cities.data_path'));
            return $data->get();
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
        }
    }

}