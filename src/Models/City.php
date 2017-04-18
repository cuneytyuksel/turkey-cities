<?php namespace Turkey\Cities\Models;

/**
 * Created by PhpStorm.
 * User: cuneyt
 * Date: 18/04/2017
 * Time: 09:59
 */

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->table = config('turkey-cities.tables.city', 'cities');
    }

    public function counties()
    {
        return $this->hasMany(config('turkey-cities.models.county', 'Turkey\Cities\Models\County'));
    }
}
