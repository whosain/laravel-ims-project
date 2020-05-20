<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAsetSvn extends Model
{
    //
    protected $table = "master_aset";
    protected $primaryKey = 'asetid';
    const CREATED_AT = 'crtdate';
	const UPDATED_AT = 'upddate';
}
