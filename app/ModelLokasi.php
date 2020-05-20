<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLokasi extends Model
{
    //
    protected $table = "master_lokasi";
    //protected $primaryKey = 'jenisid';
    /*const CREATED_AT = 'crtdate';
	const UPDATED_AT = 'upddate';*/

	protected $fillable = [
        'company_id','building_id','nama_lokasi','status','phone','address','notes'];
}
