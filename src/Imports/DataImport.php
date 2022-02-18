<?php namespace Turkey\Cities\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        $cityModel = config('turkey-cities.models.city');
        $countyModel = config('turkey-cities.models.county');
        $districtModel = config('turkey-cities.models.district');
        $neighborhoodModel = config('turkey-cities.models.neighborhood');

        $data = array();
        // $data['il']['ilce']['semt_bucak_belde'][] = ['mahalle','pk']
        foreach ($rows as $row) {
            $data[$row[0]][$row[1]][$row[2]][] = ['name' => $row[3], 'pk' => $row[4]];
        }

        if (!empty($data) && count($data)) {
            foreach ($data as $cityName => $counties) {
                $cityName = trim($cityName);
                $city = $cityModel::firstOrNew(array('name' => $cityName));
                $city->name = $cityName;
                $city->save();
                
                if (config('turkey-cities.import.county')) {
                    foreach ($counties as $countyName => $districts) {
                        $countyName = trim($countyName);
                        $county = $countyModel::firstOrNew(array('name' => $countyName, 'city_id' => $city->id));
                        $county->name = $countyName;
                        $county->city_id = $city->id;
                        $county->save();

                        if (config('turkey-cities.import.district')) {
                            foreach ($districts as $districtName => $neighborhoods) {
                                $districtName = trim($districtName);
                                $district = $districtModel::firstOrNew(array('name' => $districtName, 'county_id' => $county->id));
                                $district->name = $districtName;
                                $district->county_id = $county->id;
                                $district->save();

                                if (config('turkey-cities.import.neighborhood')) {
                                    foreach ($neighborhoods as $neighborhoodData) {
                                        $neighborhoodName = trim($neighborhoodData['name']);
                                        $neighborhoodPk = trim($neighborhoodData['pk']);
                                        $neighborhood = $neighborhoodModel::firstOrNew(array('name' => $neighborhoodName, 'pk' => $neighborhoodPk, 'district_id' => $district->id));
                                        $neighborhood->name = $neighborhoodName;
                                        $neighborhood->pk = $neighborhoodPk;
                                        $neighborhood->district_id = $district->id;
                                        $neighborhood->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
