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
    public function __construct(SubCategoryRepositoryInterface $subCategoryRepo){
        $this->subCategoryRepo = $subCategoryRepo;
    }
    public function index(Request $request){
        $filters = new SubCategoryFilter($request);
        $all_data = $this->subCategoryRepo->all_sub_categories($filters);
        $status = $this->subCategoryRepo->status();
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'html' => view('components.table.sub_category_table', compact('all_data'))->render(),
            ]);
        }
        return view('backend.admin.subCategory.index', compact('all_data','status'));
    }
    public function store(SubCategoryRequest $request){
        switch ($request->is_active) {
            case 'on':
                $request['is_active'] = 1;
                break;

            default:
                $request['is_active'] = 0;
                break;
        }
        $this->subCategoryRepo->store_sub_category($request);
        Session::flash('toast-success', [
            'title' => 'Success',
            'body' => 'Sub-Category created successfully!'
        ]);
        return redirect()->back()->with('formType', 'create');
    }
    public function edit(){

    }
    public function update(SubCategoryRequest $request){

    }
    public function destroy(Request $request){

    }

}
