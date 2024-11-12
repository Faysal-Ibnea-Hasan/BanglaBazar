<?php

namespace App\Repositories\Category;
interface CategoryRepositoryInterface{
    public function all_category($filters);
    public function store_category($request);
    public function update_category($request);
    public function delete_category($request);
    public function status_toogle($request);
    public function category_details($request);
    public function status();

}