<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function designs()
    {
        return $this->belongsToMany(Design::class, 'design_category_mappings', 'category_id', 'design_id');
    }
}
