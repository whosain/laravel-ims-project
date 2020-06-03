<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelScn extends Model
{
    protected $table = "master_aset_scn";
    // const CREATED_AT = 'create_at';
    // const UPDATED_AT = 'update_at';
    public $timestamps = false;
	protected $fillable = [
    'jenisid',
    'jenisname',
    'seri',
    'merk',
    'sn',
    'keterangan',
    'tgl_msk'=>'0000/00/00 00:00:00',
    'jumlah',
    'crtby',
    'crtdate'
        ];
}


