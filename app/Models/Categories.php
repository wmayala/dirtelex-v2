<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table='categories';

    protected $fillable=[
        'category',
        'description',
        'status',
    ];

    public function subcategory()
    {
        return $this->hasMany(Subcategories::class, 'category_id');
    }

    public function institution()
    {
        return $this->hasMany(Institutions::class, 'category_id');
    }
}
