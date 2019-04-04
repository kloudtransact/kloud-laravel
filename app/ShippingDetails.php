<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingDetails extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'fname', 'lname', 'company', 'zipcode', 'phone', 'address', 'city'
    ];
}
