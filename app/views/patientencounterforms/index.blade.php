@extends('layouts.scaffold')

@section('main')

<h1>All Patientencounterforms</h1>

<p>{{ link_to_route('patientencounterforms.create', 'Add New Patientencounterform', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($patientencounterforms->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Appointment_id</th>
				<th>Chief_complaint</th>
				<th>Summary_of_examination</th>
				<th>Assessment_plan</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($patientencounterforms as $patientencounterform)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no patientencounterforms
@endif

@stop
