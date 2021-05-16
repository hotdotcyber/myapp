<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $fillable = [
        'name', 'email','phoneno','type'
    ];
}
