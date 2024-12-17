<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAllowance extends Model
{
    public $table = 'employee_allowances';

    public $fillable = [
        'employee_id',
        'allowance_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'allowance_id' => 'nullable',
        'created_at',
        'updated_at'
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

    public function allowance()
    {
        return $this->belongsTo(Allowance::class, 'allowance_id');
    }
}
