<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'tenant_name',
        'subdomain',
        'status',
        'subdomain'
    ];


}
