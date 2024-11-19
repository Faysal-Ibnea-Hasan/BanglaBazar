<?php

namespace App\Http\Controllers\SubCategory;

use App\Filters\SubCategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\SubCategoryRequest;
use App\Repositories\SubCategory\SubCategoryRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class SubCategoryController extends Controller
{
    protected $subCategoryRepo;
    public function __construct(SubCategoryRepositoryInterface $subCategoryRepo)
    {
        $this->subCategoryRepo = $subCategoryRepo;
    }
    public function index(Request $request)
    {
        $filters = new SubCategoryFilter($request);
        $all_data = $this->subCategoryRepo->all_sub_categories($filters);
        $status = $this->subCategoryRepo->status();
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'html' => view('components.table.sub_category_table', compact('all_data'))->render(),
            ]);
        }
        return view('backend.admin.subCategory.index', compact('all_data', 'status'));
    }
    public function store(SubCategoryRequest $request)
    {
        switch ($request->is_active) {
            case 'on':
                $request['is_active'] = 1;
                break;

            default:
                $request['is_active'] = 0;
                break;
        }
        $this->subCategoryRepo->store_sub_category($request);
        Session::flash('success', 'Sub-Category created successfully!');
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $sub_category_details = $this->subCategoryRepo->sub_category_details($request);
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'status' => true,
                'html' => view('components.modal.body.subCategory.edit', compact('sub_category_details'))->render(),
            ], 200);
        }
    }
    public function update(SubCategoryRequest $request)
    {
        switch ($request->is_active) {
            case 'on':
                $request['is_active'] = 1;
                break;

            default:
                $request['is_active'] = 0;
                break;
        }
        $this->subCategoryRepo->update_sub_category($request);
        Session::flash('success', 'Sub-Category updated successfully!');
        return redirect()->back();
    }
    public function status_toogle(Request $request)
    {
        // dd($request->all());
        $this->subCategoryRepo->status_toogle($request);
        Session::flash('success', 'Status was changed successfully!');
        return response()->json([
            'status' => true,
        ], 200);
    }
    public function destroy(Request $request)
    {
        $this->subCategoryRepo->delete_sub_category($request);
        Session::flash('success', 'Category deleted successfully!');
        return response()->json([
            'status' => true
        ], 200);
    }
}
