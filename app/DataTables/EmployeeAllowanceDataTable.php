<?php

namespace App\DataTables;

use App\Models\EmployeeAllowance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EmployeeAllowanceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        // Add employee name column
        $dataTable->addColumn('employee_id', function (EmployeeAllowance $employeeAllowances) {
            return $employeeAllowances->employee->first_name ?? 'N/A'; // Replace 'full_name' with the actual field in the Employee model
        });

        // Add allowance name column
        $dataTable->addColumn('allowance_id', function (EmployeeAllowance $employeeallowance) {
            return $employeeallowance->allowance ? $employeeallowance->allowance->allowance_type : 'N/A';
        });
           

        return $dataTable->addColumn('action', 'employee_allowances.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EmployeeAllowance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeAllowance $model)
    {
        // Eager-load the related models to optimize queries
        return $model->newQuery()->with(['employee', 'allowance']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Uncomment buttons as needed
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'employee_id' => ['title' => 'Employee Name'],
            'allowance_id' => ['title' => 'Allowance Name'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'employee_allowances_datatable_' . time();
    }
}