@extends('layouts.scaffold')

@section('main')

<h1>Show Appointment</h1>

<p>{{ link_to_route('appointments.index', 'Return to All appointments', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

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
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
