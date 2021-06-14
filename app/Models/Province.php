<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'community_id'];

    /**
     * Relacion One to Many con Community
     */
    public function community(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
