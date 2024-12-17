<?php

namespace App\Repositories;

use App\Models\Payroll;
use App\Repositories\BaseRepository;

class PayrollRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'employee_id',
        'month',
        'year'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Payroll::class;
    }
}
