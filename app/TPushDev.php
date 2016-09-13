<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TPushDev extends Model
{
    protected $table = 't_push_dev';
    public $timestamps = false;
    Protected $primaryKey = "ID";
    protected $fillable = ['DEVICE_ID', 'ENDPOINT_ID', 'MEMBER_ID','SEX', 'BIRTHDAY', 'POSTAL_CD', 'LATITUDE', 'LONGITUDE', 'INSERT_USER_ID', 'INSERT_DATE', 'UPDATE_USER_ID', 'UPDATE_DATE'];
}
