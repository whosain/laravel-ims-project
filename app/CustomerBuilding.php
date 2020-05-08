<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBuilding extends Model
{
    protected $table = 'master_building';
    public $timestamps = false;

    protected $fillable = ['building_name'];
}
