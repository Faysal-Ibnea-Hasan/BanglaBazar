<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'slug',
        'is_active',
        'display_order'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function scopeFilter($query, QueryFilter $filters){
        return $filters->apply($query);
    }
}
