<?php

namespace App\Http\Controllers\Category;

use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo){
        $this->categoryRepo = $categoryRepo;
    }
    public function index(Request $request){
        $filters = new CategoryFilter($request);
        $all_data = $this->categoryRepo->all_category($filters);
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'html' => view('components.table.user_table', compact('all_users'))->render(),
            ]);
        }
        return view('backend.admin.category.index', compact('all_data'));
    }
}
