<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelJenis extends Model
{
    //
    protected $table = "master_jenis";
    protected $primaryKey = 'jenisid';
    const CREATED_AT = 'crtdate';
	const UPDATED_AT = 'upddate';

	protected $fillable = [
        'jenisid', 'description', 'updby','crtby'];
}
