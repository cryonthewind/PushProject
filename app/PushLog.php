<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushLog extends Model
{
    protected  $table = 't_operation_log';
    public $timestamps = false;
    protected  $fillable = ['OPERATION_DATE','OPERATION_KIND','OPERATION_SQL','OPERATION_FUNCTION','OPERATION_USER_ID'];
}
