<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    <p>{{ $payroll->employee->first_name }}</p>
</div>

<!-- Generated Date Field -->
<div class="col-sm-12">
    {!! Form::label('generated_date', 'Generated Date:') !!}
    <p>{{ $payroll->generated_date }}</p>
</div>

