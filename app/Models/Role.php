<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ACTIVE_ROLE = 1;
    const INACTIVE_ROLE = 0;

    protected $fillable = [
        'name',  // Add role_name to the fillable array
        'status',     // Make sure status is also included
    ];
}
