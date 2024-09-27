<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\IgnoreFunctionForCodeCoverage;

class Divisions extends Model
{
    use HasFactory;

    protected $table='divisions';

    protected $fillable=[
        'division',
        'description',
        'status',
    ];

    public function institution()
    {
        return $this->hasMany(Institutions::class, 'institution_id');
    }

    public function contact()
    {
        return $this->hasMany(Contacts::class, 'division_id');
    }
}
