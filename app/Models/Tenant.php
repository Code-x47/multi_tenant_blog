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

    public function post() {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }


}
