<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeAllowanceDataTable;
use App\Http\Requests\CreateEmployeeAllowanceRequest;
use App\Http\Requests\UpdateEmployeeAllowanceRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EmployeeAllowanceRepository;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Allowance;
use Flash;

class EmployeeAllowanceController extends AppBaseController
{
    /** @var EmployeeAllowanceRepository $employeeAllowanceRepository*/
    private $employeeAllowanceRepository;

    public function __construct(EmployeeAllowanceRepository $employeeAllowanceRepo)
    {
        $this->employeeAllowanceRepository = $employeeAllowanceRepo;
    }

    /**
     * Display a listing of the EmployeeAllowance.
     */
    public function index(EmployeeAllowanceDataTable $employeeAllowanceDataTable)
    {
    return $employeeAllowanceDataTable->render('employee_allowances.index');
    }


    /**
     * Show the form for creating a new EmployeeAllowance.
     */
    public function create()
    {
        $employees = Employees::pluck('first_name', 'id');
        $allowances = Allowance::pluck('allowance_type', 'id');

        return view('employee_allowances.create', compact('employees', 'allowances'));
    }

    /**
     * Store a newly created EmployeeAllowance in storage.
     */
    public function store(CreateEmployeeAllowanceRequest $request)
    {
        $input = $request->all();

        $employeeAllowance = $this->employeeAllowanceRepository->create($input);

        Flash::success('Employee Allowance saved successfully.');

        return redirect(route('employee_allowances.index'));
    }

    /**
     * Display the specified EmployeeAllowance.
     */
    public function show($id)
    {
        $employeeAllowance = $this->employeeAllowanceRepository->find($id);

        if (empty($employeeAllowance)) {
            Flash::error('Employee Allowance not found');

            return redirect(route('employee_allowances.index'));
        }

        return view('employee_allowances.show')->with('employee_allowance', $employeeAllowance);
    }

    /**
     * Show the form for editing the specified EmployeeAllowance.
     */
    public function edit($id)
    {
        $employeeAllowance = $this->employeeAllowanceRepository->find($id);

        if (empty($employeeAllowance)) {
            Flash::error('Employee Allowance not found');

            return redirect(route('employee_allowances.index'));
        }

        return view('employee_allowances.edit')->with('employee_allowance', $employeeAllowance);
    }

    /**
     * Update the specified EmployeeAllowance in storage.
     */
    public function update($id, UpdateEmployeeAllowanceRequest $request)
    {
        $employeeAllowance = $this->employeeAllowanceRepository->find($id);

        if (empty($employeeAllowance)) {
            Flash::error('Employee Allowance not found');

            return redirect(route('employee_allowances.index'));
        }

        $employeeAllowance = $this->employeeAllowanceRepository->update($request->all(), $id);

        Flash::success('Employee Allowance updated successfully.');

        return redirect(route('employee_allowances.index'));
    }

    /**
     * Remove the specified EmployeeAllowance from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeAllowance = $this->employeeAllowanceRepository->find($id);

        if (empty($employeeAllowance)) {
            Flash::error('Employee Allowance not found');

            return redirect(route('employee_allowances.index'));
        }

        $this->employeeAllowanceRepository->delete($id);

        Flash::success('Employee Allowance deleted successfully.');

        return redirect(route('employee_allowances.index'));
    }
}
