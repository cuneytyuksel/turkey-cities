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
        $data = $this->readXlsxData();
        if (!empty($data) && $data->count()) {

            $values = $this->dataInteraction($data);
            $cityModel = config('turkey-cities.models.city');
            $countyModel = config('turkey-cities.models.county');
            $districtModel = config('turkey-cities.models.district');
            $neighborhoodModel = config('turkey-cities.models.neighborhood');

            foreach ($values as $cityName => $counties) {
                //Create or select for cities
                $city = $cityModel::firstOrCreate(['name' => rtrim($cityName, " ")]);
                foreach ($counties as $countyName => $districts) {
                    //Create or select for county
                    $county = $countyModel::firstOrCreate(['name' => rtrim($countyName, " "), 'city_id' => $city->id]);
                    foreach ($districts as $districtName => $neighborhoods) {
                        //Create or select for district
                        $district = $districtModel::firstOrCreate(['name' => rtrim($districtName, " "), 'county_id' => $county->id]);
                        foreach ($neighborhoods as $neighborhoodData) {
                            //Create or select for neighborhood
                            $neighborhoodModel::firstOrCreate(['name' => rtrim($neighborhoodData['name'], " "), 'pk' => rtrim($neighborhoodData['pk'], " "), 'district_id' => $district->id]);
                        }
                    }
                }
            }
        }
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

    public function dataInteraction($data)
    {
        $insert = array();
        foreach ($data as $key => $value) {
            $insert[$value->il][$value->ilce][$value->semt_bucak_belde][] = ['name' => $value->mahalle, 'pk' => $value->pk];
        }
        return $insert;
    }

}