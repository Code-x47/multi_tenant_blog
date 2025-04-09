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

    //Tenant And Post Relationship
    public function post() {
        return $this->hasMany(Post::class);
    }

    //Tenant And Users Relationship
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    }


}
