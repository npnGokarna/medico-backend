@extends('layouts.scaffold')

@section('main')

<h1>Show Patientencounterform</h1>

<p>{{ link_to_route('patientencounterforms.index', 'Return to All patientencounterforms', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Appointment_id</th>
				<th>Chief_complaint</th>
				<th>Summary_of_examination</th>
				<th>Assessment_plan</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $patientencounterform->appointment_id }}}</td>
					<td>{{{ $patientencounterform->chief_complaint }}}</td>
					<td>{{{ $patientencounterform->summary_of_examination }}}</td>
					<td>{{{ $patientencounterform->assessment_plan }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('patientencounterforms.destroy', $patientencounterform->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('patientencounterforms.edit', 'Edit', array($patientencounterform->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
