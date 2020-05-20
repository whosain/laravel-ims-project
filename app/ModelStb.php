<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelStb extends Model
{
    //
    protected $table = "stb_header";
    const CREATED_AT = 'create_at';
	const UPDATED_AT = 'update_at';
	protected $fillable = [
        'vendor_id', 'received_date','judul','keterangan','stock_balance','remarks' ,'update_by','create_by'];
}
