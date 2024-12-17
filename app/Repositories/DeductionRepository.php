<?php

namespace App\Repositories;

use App\Models\Deduction;
use App\Repositories\BaseRepository;

class DeductionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'deduction_name',
        'deduction_type',
        'amount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Deduction::class;
    }
}
