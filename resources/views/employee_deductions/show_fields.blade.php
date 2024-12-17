<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    <p>{{ $employee_deduction->employee->first_name }}</p>
</div>


<!-- Deduction Name Field -->
<div class="col-sm-12">
    {!! Form::label('deduction_id', 'Deduction Name:') !!}
    <p>{{ $employee_deduction->deduction->deduction_name ?? 'N/A' }}</p>
</div>