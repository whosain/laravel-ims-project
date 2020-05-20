<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTreckingStb extends Model
{
    //
    protected $table = "stb_customer";
    const CREATED_AT = 'create_at';
	const UPDATED_AT = 'update_at';
	protected $fillable = [
        'id', 'customer_id','stb_header_id','stb_detail_id','building_id','lokasi_id','remarks' ,'update_by','create_by'];
}
