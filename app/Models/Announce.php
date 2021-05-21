<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Announce extends Model implements Auditable
{
    use HasFactory, SoftDeletes, HasMediaTrait, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'gender'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
