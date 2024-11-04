<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dashboardRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepositoryInterface $dashboardRepo)
    {
        $this->dashboardRepo = $dashboardRepo;
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $boxes = $this->dashboardRepo->dynamic();
        //return $boxes;
        return view('backend.admin.dashboard.dashboard',compact('boxes'));
    }
}
