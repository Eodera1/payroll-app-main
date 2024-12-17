<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDeductionDataTable;
use App\Http\Requests\CreateEmployeeDeductionRequest;
use App\Http\Requests\UpdateEmployeeDeductionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EmployeeDeductionRepository;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Deduction;
use Flash;

class EmployeeDeductionController extends AppBaseController
{
    /** @var EmployeeDeductionRepository $employeeDeductionRepository*/
    private $employeeDeductionRepository;

    public function __construct(EmployeeDeductionRepository $employeeDeductionRepo)
    {
        $this->employeeDeductionRepository = $employeeDeductionRepo;
    }

    /**
     * Display a listing of the EmployeeDeduction.
     */
    public function index(EmployeeDeductionDataTable $employeeDeductionDataTable)
    {
    return $employeeDeductionDataTable->render('employee_deductions.index');
    }


    /**
     * Show the form for creating a new EmployeeDeduction.
     */
    public function create()
    {
        $employees = Employees::pluck('first_name', 'id');
        $deductions = Deduction::pluck('deduction_name', 'id');
        
        return view('employee_deductions.create', compact('employees', 'deductions'));
    }

    // return view('courses.create', compact('levels', 'departments'));

    /**
     * Store a newly created EmployeeDeduction in storage.
     */
    public function store(CreateEmployeeDeductionRequest $request)
    {
        $input = $request->all();

        $employeeDeduction = $this->employeeDeductionRepository->create($input);

        Flash::success('Employee Deduction saved successfully.');

        return redirect(route('employee_deductions.index'));
    }

    /**
     * Display the specified EmployeeDeduction.
     */
    public function show($id)
    {
        $employeeDeduction = $this->employeeDeductionRepository->find($id);

        if (empty($employeeDeduction)) {
            Flash::error('Employee Deduction not found');

            return redirect(route('employee_deductions.index'));
        }

        return view('employee_deductions.show')->with('employee_deduction', $employeeDeduction);
    }

    /**
     * Show the form for editing the specified EmployeeDeduction.
     */
    public function edit($id)
    {
        $employeeDeduction = $this->employeeDeductionRepository->find($id);

        if (empty($employeeDeduction)) {
            Flash::error('Employee Deduction not found');

            return redirect(route('employee_deductions.index'));
        }

        return view('employee_deductions.edit')->with('employee_deduction', $employeeDeduction);
    }

    /**
     * Update the specified EmployeeDeduction in storage.
     */
    public function update($id, UpdateEmployeeDeductionRequest $request)
    {
        $employeeDeduction = $this->employeeDeductionRepository->find($id);

        if (empty($employeeDeduction)) {
            Flash::error('Employee Deduction not found');

            return redirect(route('employee_deductions.index'));
        }

        $employeeDeduction = $this->employeeDeductionRepository->update($request->all(), $id);

        Flash::success('Employee Deduction updated successfully.');

        return redirect(route('employee_deductions.index'));
    }

    /**
     * Remove the specified EmployeeDeduction from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeDeduction = $this->employeeDeductionRepository->find($id);

        if (empty($employeeDeduction)) {
            Flash::error('Employee Deduction not found');

            return redirect(route('employee_deductions.index'));
        }

        $this->employeeDeductionRepository->delete($id);

        Flash::success('Employee Deduction deleted successfully.');

        return redirect(route('employee_deductions.index'));
    }
}
