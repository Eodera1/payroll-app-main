<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control',  'placeholder' => 'Select employee', 'required']) !!}
</div>

<!-- Generated Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generated_date', 'Generated Date:') !!}
    {!! Form::date('generated_date', null, ['class' => 'form-control','id'=>'generated_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#generated_date').datepicker()
    </script>
@endpush