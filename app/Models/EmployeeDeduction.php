<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDeduction extends Model
{
    public $table = 'employee_deductions';

    public $fillable = [
        'employee_id',
        'deduction_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'deduction_id' => 'nullable',
        'updated_at',
        'created_at'
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

    public function deduction()
    {
        return $this->belongsTo(Deduction::class, 'deduction_id');
    }

}