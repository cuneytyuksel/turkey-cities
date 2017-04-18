<?php namespace Turkey\Cities\Models;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 18/04/2017
 * Time: 10:03
 */

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'county_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->table = config('turkey-cities.tables.districts', 'districts');
    }

    public function neighborhoods()
    {
        return $this->hasMany(config('turkey-cities.models.neighborhood', 'Turkey\Cities\Models\Neighborhood'));
    }

    public function county()
    {
        return $this->belongsTo(config('turkey-cities.models.county', 'Turkey\Cities\Models\County'));
    }
}
