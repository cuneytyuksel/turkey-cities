<?php namespace Turkey\Cities\Models;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 18/04/2017
 * Time: 09:59
 */

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'city_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->table = config('turkey-cities.tables.county', 'counties');
    }

    public function districts()
    {
        return $this->hasMany(config('turkey-cities.models.district', 'Turkey\Cities\Models\District'));
    }

    public function city()
    {
        return $this->belongsTo(config('turkey-cities.models.city', 'Turkey\Cities\Models\City'));
    }
}
