<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloseKasParent extends Model
{
    protected $fillable = [
        "opening_kas",
        "ending_kas",
        "total_debit",
        "total_credit"
    ];

    /**
     * Get all of the comments for the CloseKasParent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */    
    public function cashChild()
    {
        return $this->hasMany(CloseKasChild::class, 'kas_parent');
    }
}
