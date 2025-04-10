<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Tenant Relationship
    public function tenant() {
        return $this->BelongsTo(Tenant::class);
    }


}
