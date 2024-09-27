<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table='contacts';

    protected $fillable=[
        'contact',
        'position',
        'code',
        'phone',
        'extension',
        'mobile',
        'fax',
        'email',
        'specialFeature',
        'clarification',
        'address',
        'typeContact',
        'language',
        'status',
        'institution_id',
        'division_id',
    ];

    public function institution()
    {
        return $this->belongsTo(Institutions::class, 'institution_id');
    }

    public function division()
    {
        return $this->belongsTo(Divisions::class, 'division_id');
    }
}
