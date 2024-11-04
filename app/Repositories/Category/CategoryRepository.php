<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface{
    public function all_category($filters){
        return Category::orderBy('created_at', 'DESC')
            ->filter($filters)
            ->paginate('10')
            ->appends(request()->query()); // For not refreshing whole result in pagination
    }
}