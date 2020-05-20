<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSvn extends Model
{
    protected $table = 'master_customer_svn';

    protected $fillable = ['company_id', 'name','name_short','phone','address','notes','status'];
}
