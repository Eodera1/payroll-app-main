<?php

namespace App\Repositories;

use App\Models\EmployeeAllowance;
use App\Repositories\BaseRepository;

class EmployeeAllowanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'allowance_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return EmployeeAllowance::class;
    }
}
