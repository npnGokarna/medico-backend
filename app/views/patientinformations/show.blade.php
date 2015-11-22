@extends('layouts.scaffold')

@section('main')

<h1>Show Patientinformation</h1>

<p>{{ link_to_route('patientinformations.index', 'Return to All patientinformations', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Patient_id</th>
				<th>Surgical_history</th>
				<th>Obstetic_history</th>
				<th>Medical_allergy</th>
				<th>Family_history</th>
				<th>Social_history</th>
				<th>Habits</th>
				<th>Immunization_history</th>
				<th>Development_history</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $patientinformation->patient_id }}}</td>
					<td>{{{ $patientinformation->surgical_history }}}</td>
					<td>{{{ $patientinformation->obstetic_history }}}</td>
					<td>{{{ $patientinformation->medical_allergy }}}</td>
					<td>{{{ $patientinformation->family_history }}}</td>
					<td>{{{ $patientinformation->social_history }}}</td>
					<td>{{{ $patientinformation->habits }}}</td>
					<td>{{{ $patientinformation->immunization_history }}}</td>
					<td>{{{ $patientinformation->development_history }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patientinformations.destroy', $patientinformation->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('patientinformations.edit', 'Edit', array($patientinformation->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
