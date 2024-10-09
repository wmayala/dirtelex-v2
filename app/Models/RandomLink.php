<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RandomLink extends Model
{
    protected $fillable = ['token', 'expires_at'];

    // Verificar si el enlace ha expirado
    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }
}
