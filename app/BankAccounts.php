<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'balance', 'initial_balance', 'last_deposit', 'last_deposit_name', 'account_number', 'address'
    ];
}
