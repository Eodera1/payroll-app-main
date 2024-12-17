<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    <p>{{ $employee_allowance->employee->first_name }}</p>
</div>

<!-- Allowance Id Field -->
<div class="col-sm-12">
    {!! Form::label('allowance_id', 'Allowance Name:') !!}
    <p>{{ $employee_allowance->allowance->allowance_type }}</p>
</div>

