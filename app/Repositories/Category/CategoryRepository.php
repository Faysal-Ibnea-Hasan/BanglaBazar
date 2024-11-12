<?php

namespace App\Repositories\Category;

use App\Enums\Users\Status;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all_category($filters)
    {
        return Category::orderBy('created_at', 'DESC')
            ->filter($filters)
            ->paginate('10')
            ->appends(request()->query()); // For not refreshing whole result in pagination
    }
    public function store_category($request)
    {
        Category::create($request->all());
        return true;
    }
    public function update_category($request){
        try {
            Category::where('id', $request->id)->update(
                $request->only([
                    'name',
                    'description',
                    'display_order',
                    'is_active',
                ])
            );
            return true;
        } catch (\Exception $e) {
            // Handle or log error
            return false;
        }
    }
    public function status_toogle($request)
    {
        $category = Category::findOrFail($request->id);
        $category->is_active = $request->status;
        $category->save();
        return true;
    }
    public function category_details($request)
    {
        return Category::where('id', $request->id)->first();
    }
    public function delete_category($request)
    {
        Category::findOrFail($request->id)->delete();
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