<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_register extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinator',
        'email',
        'phone_number',
        // 'coupon_code',
        // 'account_type',
        'school_name',
        'numberofteams'



    ];

}
