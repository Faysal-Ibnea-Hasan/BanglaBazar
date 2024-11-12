<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
        'display_order'
    ];
    public function scopeFilter($query, QueryFilter $filters){
        return $filters->apply($query);
    }
}
