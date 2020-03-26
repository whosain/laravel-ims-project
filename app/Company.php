<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'master_company';
    
    public $timestamps = false;

    protected $fillable = ['company_name', 'company_alias', 'created_by', 'update_by'];

    protected $hidden = ['created_at', 'updated_at'];
}
