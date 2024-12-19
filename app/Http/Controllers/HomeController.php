<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employees;
use App\Models\Documentation;
use Illuminate\Support\Facades\DB;
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
    public function employeesByDepartment()
    {
        $data = DB::table('employees')
            ->join('departments', 'employees.department_id', '=', 'departments.id')
            ->select('departments.department_name as department', DB::raw('count(employees.id) as total'))
            ->groupBy('departments.department_name')
            ->get();
    
        $departments = $data->pluck('department'); // Get department names
        $totals = $data->pluck('total');          // Get total employees per department
    
        return view('home', compact('departments', 'totals'));
    }
    
        public function index()
        {
            {
                // Get the total number of users
                $totalEmployees = Employees::count();
                $totalDepartments = Department::count();
                $totalAttendances = Attendance::count();
                $totalDocumentations = Documentation::count();
 
                
                $departments = Department::pluck('department_name')->toArray(); 
                $employeeCountsByDepartment = Department::withCount('employees')->pluck('employees_count')->toArray();
    
                $data = DB::table('employees')
                ->leftjoin('departments', 'employees.department_id', '=', 'departments.id')
                ->select('departments.department_name as department', DB::raw('count(employees.id) as total'))
                ->groupBy('departments.department_name')
                ->get();
        
            $departments = $data->pluck('department');
            $totals = $data->pluck('total');
    
                // Pass the total number of users to the view
                return view('home', compact('totalEmployees','totalDepartments', 'totalAttendances', 'totalDocumentations', 'departments', 'employeeCountsByDepartment', 'totals'));

            }
        }
    }





