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
    public function store_sub_category($request)
    {
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
    public function sub_category_details($request)
    {
        return SubCategory::where('id', $request->id)->first();
    }
    public function update_sub_category($request)
    {
        try {
            SubCategory::where('id', $request->id)->update(
                $request->only([
                    'name',
                    'category_id',
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
        try {
            $sub_category = SubCategory::findOrFail($request->id);
            $sub_category->is_active = $request->status;
            $sub_category->save();
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function delete_sub_category($request)
    {
        SubCategory::findOrFail($request->id)->delete();
        return true;
    }
}