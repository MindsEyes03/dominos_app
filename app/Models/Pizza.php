<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $cast = [
        'toppings' => 'array',
    ];

    protected $hidden = [
        'user',
    ];

    protected $appends = [
        'chef',
        'last_updated',
    ];

    public function getChefAttribute(): string{
        return $this->user->name;
    }

    public function getLastUpdatedAttibute(): string
    {
        return $this->updated_at->DiffForHumans();
    }
}
