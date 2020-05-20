<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelStbDetail extends Model
{
    //
    protected $table = "stb_detail";    
    const CREATED_AT = 'create_at';
	const UPDATED_AT = 'update_at';
	protected $fillable = [
        'vendor_id', 'stb_id','product_model','purchase_date','mac_address','serial_number' ,'remarks','status'];
}
