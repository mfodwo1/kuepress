<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignCategoryMapping extends Model
{
    use HasFactory;

    protected $table = 'design_category_mappings';

    protected $fillable = [
        'design_id',
        'category_id',
    ];

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function category()
    {
        return $this->belongsTo(DesignCategory::class);
    }
}
