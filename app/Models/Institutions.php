<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institutions extends Model
{
    use HasFactory;

    protected $table='institutions';

    protected $fillable=[
        'institution',
        'acronym',
        'description',
        'category_id',
        'subcategory_id',
        'division_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id');
    }

    public function division()
    {
        return $this->belongsTo(Divisions::class, 'division_id');
    }

}
