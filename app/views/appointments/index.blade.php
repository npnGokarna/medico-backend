@extends('layouts.scaffold')

@section('main')

<h1>All Appointments</h1>

<p>{{ link_to_route('appointments.create', 'Add New Appointment', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($appointments->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Appointment_status</th>
				<th>Doctor_id</th>
				<th>Patient_id</th>
				<th>Doctor_encounter_form</th>
				<th>Doctor_order_form</th>
				<th>Medical_report</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($appointments as $appointment)
				<tr>
					<td>{{{ $appointment->date }}}</td>
					<td>{{{ $appointment->appointment_status }}}</td>
					<td>{{{ $appointment->doctor_id }}}</td>
					<td>{{{ $appointment->patient_id }}}</td>
					<td>{{{ $appointment->doctor_encounter_form }}}</td>
					<td>{{{ $appointment->doctor_order_form }}}</td>
					<td>{{{ $appointment->medical_report }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('appointments.destroy', $appointment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('appointments.edit', 'Edit', array($appointment->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no appointments
@endif

@stop
