<?php

namespace App\Repositories;

use App\Models\Allowance;
use App\Repositories\BaseRepository;

class AllowanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'allowance_type',
        'amount'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Allowance::class;
    }
}
