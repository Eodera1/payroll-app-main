<?php

namespace App\Repositories;

use App\Models\EmployeeDeduction;
use App\Repositories\BaseRepository;

class EmployeeDeductionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'deduction_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EmployeeDeduction::class;
    }
}
