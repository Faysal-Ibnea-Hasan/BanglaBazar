<?php

namespace App\Repositories\SubCategory;
interface SubCategoryRepositoryInterface
{
    public function all_sub_categories($filters);
    public function status();
    public function store_sub_category($request);
}