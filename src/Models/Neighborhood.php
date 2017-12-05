<?php namespace Turkey\Cities\Models;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 18/04/2017
 * Time: 10:00
 */

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'pk', 'district_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->table = config('turkey-cities.tables.neighborhoods', 'neighborhoods');
    }

    public function district()
    {
        return $this->belongsTo(config('turkey-cities.models.district', 'Turkey\Cities\Models\District'));
    }
}
