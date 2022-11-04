<?php

namespace App\Models\System;

use App\Traits\Uuids;
use F9Web\ApiResponseHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    use Uuids;
    use ApiResponseHelpers;

    protected $table = 'sys_notifications';
    protected $fillable = ['type','title','text'];

}
