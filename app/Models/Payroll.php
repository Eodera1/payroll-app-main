<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public $table = 'payrolls';

    public $fillable = [
        'employee_id',
        'generated_date'
    ];

    protected $casts = [
        'generated_date' => 'date',
    ];

    public static array $rules = [
        'employee_id' => 'nullable',
        'generated_date' => 'nullable',
        'updated_at',
        'created_at' 
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

    public function getGeneratedDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
