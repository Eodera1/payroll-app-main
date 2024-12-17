<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    public $table = 'allowances';

    public $fillable = [
        'allowance_type',
        'amount'
    ];

    protected $casts = [
        'allowance_type' => 'string',
        'amount' => 'decimal:0'
    ];

    public static array $rules = [
        'allowance_type' => 'nullable|string|max:65535',
        'amount' => 'nullable|numeric',
        'created_at',
        'updated_at' 
    ];

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'allowance_id');
    }

}
