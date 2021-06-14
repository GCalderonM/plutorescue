<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
      'ip',
      'email',
      'user_agent',
      'content',
      'access',
    ];

    public static function record($ip, $email, $user_agent, $content, $access = false) {
        return static::create([
            'ip' => $ip,
            'email' => $email,
            'user_agent' => $user_agent,
            'content' => $content,
            'access' => $access
        ]);
    }

    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }
}
