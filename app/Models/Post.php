<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tenant() {
        return $this->BelongsTo(Tenant::class);
    }

/*static::addGlobalScope('tenant', function ($query) {
        if (auth()->check() && auth()->user()->tenant_id) {
            $query->where('tenant_id', auth()->user()->tenant_id);
        }
    });*/
}
