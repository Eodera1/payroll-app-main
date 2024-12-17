<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employees;
use App\Models\Documentation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalEmployees = Employees::count();

        $totalDepartments = Department::count();

        $totalAttendances = Attendance::count();

        $totalDocumentations = Documentation::count();


        $employeeCountsByDepartment = Employees::selectRaw('department_id, count(*) as count')
            ->groupBy('department_id')
            ->get()
            ->keyBy('department_id')
            ->map(fn($item) => $item->count);
        return view('home', compact('totalEmployees', 'totalDepartments', 'totalAttendances', 'totalDocumentations', 'employeeCountsByDepartment'));
    }
}
