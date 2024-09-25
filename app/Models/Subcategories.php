<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Subcategories extends Model
{
    use HasFactory;

    protected $table='subcategories';

    protected $fillable=[
        'subcategory',
        'description',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function institution()
    {
        return $this->belongsTo(Institutions::class, 'institution_id');
    }
}
