<?php

namespace App\Http\Controllers\Category;

use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    protected $categoryRepo;
    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function index(Request $request)
    {
        $filters = new CategoryFilter($request);
        $all_data = $this->categoryRepo->all_category($filters);
        $status = $this->categoryRepo->status();
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'html' => view('components.table.category_table',compact('all_data'))->render(),
            ]);
        }
        return view('backend.admin.category.index', compact('all_data', 'status'));
    }
    public function store(CategoryRequest $request)
    {
        switch ($request->is_active) {
            case 'on':
                $request['is_active'] = 1;
                break;

            default:
                $request['is_active'] = 0;
                break;
        }
        $this->categoryRepo->store_category($request);
        Session::flash('toast-success', [
            'title' => 'Success',
            'body' => 'Category created successfully!'
        ]);
        return redirect()->back()->with('formType', 'create');
    }
    public function edit(Request $request){
        $category_details = $this->categoryRepo->category_details($request);
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'status' => true,
                'html' => view('components.modal.body.category.edit', compact('category_details'))->render(),
            ],200);
        }
    }
    public function update(CategoryRequest $request){
        switch ($request->is_active) {
            case 'on':
                $request['is_active'] = 1;
                break;

            default:
                $request['is_active'] = 0;
                break;
        }
        $this->categoryRepo->update_category($request);
        Session::flash('toast-success', [
            'title' => 'Success',
            'body' => 'Category updated successfully!'
        ]);
        return redirect()->back()->with('formType', 'update');
    }
    public function status_toogle(Request $request)
    {
        // dd($request->all());
        $this->categoryRepo->status_toogle($request);
        Session::flash('toast-success', [
            'title' => 'Success',
            'body' => 'Status was changed successfully!'
        ]);
        return response()->json([
            'status' => true,
        ], 200);
    }
    public function destroy(Request $request){
        $this->categoryRepo->delete_category($request);
        Session::flash('toast-success',[
            'title' => 'Success',
            'body' => 'Category deleted successfully!'
        ]);
        return response()->json([
            'status' => true
        ],200);
    }
}
