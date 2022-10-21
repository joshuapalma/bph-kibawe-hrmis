<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeProfile;
use App\Models\Leave;
use App\Models\Tardy;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'employeeCount' => EmployeeProfile::count(),
            'leaveCount' => Leave::count(),
            'tardyCount' => Tardy::where('month_generated', date('F'))->count(),
            'notification' => Tardy::where('month_generated', date('F'))->select('id', 'name', 'designation', 'undertime', 'tardy')->paginate(10)
        ];

        return view('pages.dashboard', $data);
    }
}
