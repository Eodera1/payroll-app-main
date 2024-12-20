<?php

namespace App\DataTables;

use App\Models\Payroll;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PayrollDataTable extends DataTable
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

        // Add employee name columnAllowances
        $dataTable->addColumn('employee_id', function (Payroll $payroll) {
            return $payroll->employee->first_name ?? 'N/A'; // Replace 'full_name' with the actual field in the Employee model
        });
           

        return $dataTable->addColumn('action', 'payrolls.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Payroll $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Payroll $model)
    {
        return $model->newQuery();
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
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'employee_id'  => ['title' => 'Employee Name'],
            'generated_date'
        ];
    }

    // 'level_name' => ['name' => 'level.name', 'data' => 'level.name'],

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'payrolls_datatable_' . time();
    }
}
