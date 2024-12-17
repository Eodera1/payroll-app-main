<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Name:') !!}
    {!! Form::select('employee_id', $employees, null, ['class' => 'form-control',  'placeholder' => 'select employee', 'required']) !!}
</div>

<!-- Document Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_type', 'Document Type:') !!}
    {!! Form::select('document_type', ['academic' => 'Academic', 'cover_letter' => 'Cover_Letter', 'resume' => 'Resume', 'identification_document' => 'Identification_Document'], null, ['class' => 'form-control', 'placeholder' => 'select document_type', 'required']) !!}
</div>


<!-- Document Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_name', 'Document Name:') !!}
    {!! Form::select('document_name', ['certificates' => 'Certificates', 'cover_letter' => 'Cover_Letter', 'resume' => 'Resume', 'id' => 'ID', 'passport' => 'Passport'], null, ['class' => 'form-control', 'placeholder' => 'select document_type', 'required']) !!}
</div>

<!-- File Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_path', 'Choose a File:', ['class' => 'form-label'] ) !!}
    {!! Form::file('file_path', ['class' => 'form-control', 'required' => true]) !!}
</div>
