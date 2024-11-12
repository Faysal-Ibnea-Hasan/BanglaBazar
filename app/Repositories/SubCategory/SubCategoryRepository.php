<?php

namespace App\Repositories\SubCategory;

use App\Enums\Users\Status;
use App\Models\SubCategory;
class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    public function all_sub_categories($filters)
    {
        return SubCategory::orderBy('created_at', 'DESC')
            ->with('categories')
            ->filter($filters)
            ->paginate('10')
            ->appends(request()->query()); // For not refreshing whole result in pagination
    }
    public function store_sub_category($request){
        SubCategory::create($request->all());
        return true;
    }
    public function status()
    {
        $status = [];
        $status = [
            Status::active => 'Active',
            Status::in_active => 'Inactive',
        ];
        return $status;
    }
}