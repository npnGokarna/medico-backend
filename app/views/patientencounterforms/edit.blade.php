@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Patientencounterform</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($patientencounterform, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('patientencounterforms.update', $patientencounterform->id))) }}

        <div class="form-group">
            {{ Form::label('appointment_id', 'Appointment_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('appointment_id', Input::old('appointment_id'), array('class'=>'form-control', 'placeholder'=>'Appointment_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('chief_complaint', 'Chief_complaint:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('chief_complaint', Input::old('chief_complaint'), array('class'=>'form-control', 'placeholder'=>'Chief_complaint')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('summary_of_examination', 'Summary_of_examination:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('summary_of_examination', Input::old('summary_of_examination'), array('class'=>'form-control', 'placeholder'=>'Summary_of_examination')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('assessment_plan', 'Assessment_plan:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('assessment_plan', Input::old('assessment_plan'), array('class'=>'form-control', 'placeholder'=>'Assessment_plan')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('patientencounterforms.show', 'Cancel', $patientencounterform->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop