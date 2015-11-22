@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Doctororder</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'doctororders.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('appointment_id', 'Appointment_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('appointment_id', Input::old('appointment_id'), array('class'=>'form-control', 'placeholder'=>'Appointment_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('symptoms', 'Symptoms:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('symptoms', Input::old('symptoms'), array('class'=>'form-control', 'placeholder'=>'Symptoms')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('diagnosis', 'Diagnosis:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('diagnosis', Input::old('diagnosis'), array('class'=>'form-control', 'placeholder'=>'Diagnosis')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('medicine_prescribed', 'Medicine_prescribed:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('medicine_prescribed', Input::old('medicine_prescribed'), array('class'=>'form-control', 'placeholder'=>'Medicine_prescribed')) }}
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


