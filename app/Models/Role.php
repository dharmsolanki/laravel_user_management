<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ACTIVE_ROLE = 1;
    const INACTIVE_ROLE = 0;

    const ACTIVE_USER = 1;
    const INACTIVE_USER = 0;

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    protected $fillable = [
        'name',  // Add role_name to the fillable array
        'status',     // Make sure status is also included
    ];
}
