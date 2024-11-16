<?php

namespace App\Repositories\SubCategory;
interface SubCategoryRepositoryInterface
{
    public function all_sub_categories($filters);
    public function status();
    public function store_sub_category($request);
    public function sub_category_details($request);
    public function update_sub_category($request);
    public function delete_sub_category($request);
    public function status_toogle($request);
}