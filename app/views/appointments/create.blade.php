@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Appointment</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'appointments.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('date', 'Date:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('date', Input::old('date'), array('class'=>'form-control', 'placeholder'=>'Date')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('appointment_status', 'Appointment_status:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('appointment_status', Input::old('appointment_status'), array('class'=>'form-control', 'placeholder'=>'Appointment_status')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('doctor_id', 'Doctor_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('doctor_id', Input::old('doctor_id'), array('class'=>'form-control', 'placeholder'=>'Doctor_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('patient_id', 'Patient_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('patient_id', Input::old('patient_id'), array('class'=>'form-control', 'placeholder'=>'Patient_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('doctor_encounter_form', 'Doctor_encounter_form:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('doctor_encounter_form', Input::old('doctor_encounter_form'), array('class'=>'form-control', 'placeholder'=>'Doctor_encounter_form')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('doctor_order_form', 'Doctor_order_form:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('doctor_order_form', Input::old('doctor_order_form'), array('class'=>'form-control', 'placeholder'=>'Doctor_order_form')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('medical_report', 'Medical_report:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('medical_report', Input::old('medical_report'), array('class'=>'form-control', 'placeholder'=>'Medical_report')) }}
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


