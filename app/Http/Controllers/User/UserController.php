<?php

namespace App\Http\Controllers\User;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userRepo;
    protected $fileUploadService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepo, FileUploadService $fileUploadService)
    {
        $this->userRepo = $userRepo;
        $this->fileUploadService = $fileUploadService;
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $filters = new UserFilter($request);
        $all_users = $this->userRepo->all_users($filters);
        $user_status = $this->userRepo->user_status();
        $user_verification_status = $this->userRepo->user_verification_status();
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'html' => view('components.table.user_table', compact('all_users'))->render(),
            ]);
        }
        return view('backend.admin.user.index', compact('all_users', 'user_status', 'user_verification_status'));
    }
    public function store(UserRequest $request)
    {
        switch ($request->status) {
            case 'on':
                $request['status'] = 1;
                break;

            default:
                $request['status'] = 0;
                break;
        }
        switch ($request->verification_status) {
            case 'on':
                $request['verification_status'] = 1;
                break;

            default:
                $request['verification_status'] = 0;
                break;
        }
        $user_id = $this->userRepo->store_user($request);
        $request['user_id'] = $user_id;
        $request['country'] = 'Bangladesh';
        $this->userRepo->store_user_address($request);
        Session::flash('success', 'User created successfully!');
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $user_details = $this->userRepo->user_details($request);
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'status' => true,
                'html' => view('components.modal.body.user.edit', compact('user_details'))->render(),
            ], 200);
        }
    }
    public function update(UserRequest $request)
    {
        switch ($request->status) {
            case 'on':
                $request['status'] = 1;
                break;

            default:
                $request['status'] = 0;
                break;
        }
        switch ($request->verification_status) {
            case 'on':
                $request['verification_status'] = 1;
                break;

            default:
                $request['verification_status'] = 0;
                break;
        }
        $this->userRepo->update_user($request);
        $request['user_id'] = $request->id;
        $request['country'] = 'Bangladesh';
        $this->userRepo->update_user_address($request);
        Session::flash('success','User updated successfully!');
        return redirect()->back();
    }
    public function details(Request $request)
    {
        $user_details = $this->userRepo->user_details($request);
        if ($request->ajax()) {
            // Return a partial view that contains only the posts list
            return response()->json([
                'status' => true,
                'html' => view('components.modal.body.user.details', compact('user_details'))->render(),
            ]);
        }
    }
    public function status_toogle(Request $request)
    {
        // dd($request->all());
        $this->userRepo->status_toogle($request);
        Session::flash('success', 'Status was changed successfully');
        return response()->json([
            'status' => true,
        ], 200);
    }
    public function destroy(Request $request)
    {
        $this->userRepo->delete_user($request);
        Session::flash('success', 'User deleted successfully!');
        return response()->json([
            'status' => true
        ], 200);
    }
    public function imageUpload(Request $request)
    {
        // Upload and process an image
        if ($request->hasFile('image')) {
            $imagePath = $this->fileUploadService->upload(
                $request->file('image'),
                'public',
                'users'
            );
            // Get public URL of the uploaded image
            //$imageUrl = $this->fileUploadService->url($imagePath);
            $user = User::where('id', $request->id)->first();
            $user->profile_picture = $imagePath;
            $user->save();
        }
        return response()->json([
            'status' => true,
            'image_url' => $imageUrl ?? null
        ]);
    }

}
