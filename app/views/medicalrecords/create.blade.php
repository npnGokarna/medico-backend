@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Medicalrecord</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'medicalrecords.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('patient_id', 'Patient_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_id', Input::old('patient_id'), array('class'=>'form-control', 'placeholder'=>'Patient_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('patient_information_id', 'Patient_information_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_information_id', Input::old('patient_information_id'), array('class'=>'form-control', 'placeholder'=>'Patientinformation_id')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


