@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Patientinformation</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'patientinformations.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('patient_id', 'Patient_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_id', Input::old('patient_id'), array('class'=>'form-control', 'placeholder'=>'Patient_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('surgical_history', 'Surgical_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('surgical_history', Input::old('surgical_history'), array('class'=>'form-control', 'placeholder'=>'Surgical_history')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('obstetic_history', 'Obstetic_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('obstetic_history', Input::old('obstetic_history'), array('class'=>'form-control', 'placeholder'=>'Obstetic_history')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('medical_allergy', 'Medical_allergy:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('medical_allergy', Input::old('medical_allergy'), array('class'=>'form-control', 'placeholder'=>'Medical_allergy')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('family_history', 'Family_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('family_history', Input::old('family_history'), array('class'=>'form-control', 'placeholder'=>'Family_history')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('social_history', 'Social_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('social_history', Input::old('social_history'), array('class'=>'form-control', 'placeholder'=>'Social_history')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('habits', 'Habits:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('habits', Input::old('habits'), array('class'=>'form-control', 'placeholder'=>'Habits')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('immunization_history', 'Immunization_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('immunization_history', Input::old('immunization_history'), array('class'=>'form-control', 'placeholder'=>'Immunization_history')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('development_history', 'Development_history:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('development_history', Input::old('development_history'), array('class'=>'form-control', 'placeholder'=>'Development_history')) }}
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


