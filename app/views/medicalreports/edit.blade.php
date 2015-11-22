@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Medicalreport</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($medicalreport, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('medicalreports.update', $medicalreport->id))) }}

        <div class="form-group">
            {{ Form::label('appointment_id', 'Appointment_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('appointment_id', Input::old('appointment_id'), array('class'=>'form-control', 'placeholder'=>'Appointment_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('bloodpressure', 'Bloodpressure:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('bloodpressure', Input::old('bloodpressure'), array('class'=>'form-control', 'placeholder'=>'Bloodpressure')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('temperature', 'Temperature:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('temperature', Input::old('temperature'), array('class'=>'form-control', 'placeholder'=>'Temperature')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('medicalreports.show', 'Cancel', $medicalreport->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop