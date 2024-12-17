<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    public $table = 'deductions';

    public $fillable = [
        'deduction_name',
        'deduction_type',
        'amount'
    ];

    protected $casts = [
        'deduction_name' => 'string',
        'deduction_type' => 'string',
        'amount' => 'decimal:0'
    ];

    public static array $rules = [
        'deduction_name' => 'nullable|string|max:100',
        'deduction_type' => 'nullable|string|max:100',
        'amount' => 'nullable|numeric',
        'created_at',
        'updated_at'
    ];

    public function employeeDeductions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\EmployeeDeduction::class, 'deduction_id');
    }
}
