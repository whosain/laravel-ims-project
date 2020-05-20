<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelVendorSvn extends Model
{
    //
    protected $table = "master_vendor_svn";
    //protected $primaryKey = 'jenisid';
    /*const CREATED_AT = 'crtdate';
	const UPDATED_AT = 'upddate';*/

	protected $fillable = [
        'company_id', 'name','name_short','email','phone','address','notes'];
}
