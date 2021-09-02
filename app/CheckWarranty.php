<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckWarranty extends Model
{
    protected $table = 'checkwarranty';
    protected $fillable = ['check_code', 'used'];
}
