@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Medicalrecord</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($medicalrecord, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('medicalrecords.update', $medicalrecord->id))) }}

        <div class="form-group">
            {{ Form::label('patient_id', 'Patient_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_id', Input::old('patient_id'), array('class'=>'form-control', 'placeholder'=>'Patient_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('patientinformation_id', 'Patientinformation_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_information_id', Input::old('patient_information_id'), array('class'=>'form-control', 'placeholder'=>'Patientinformation_id')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('medicalrecords.show', 'Cancel', $medicalrecord->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop