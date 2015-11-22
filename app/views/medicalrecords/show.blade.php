@extends('layouts.scaffold')

@section('main')

<h1>Show Medicalrecord</h1>

<p>{{ link_to_route('medicalrecords.index', 'Return to All medicalrecords', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Patient_id</th>
				<th>Patientinformation_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $medicalrecord->patient_id }}}</td>
					<td>{{{ $medicalrecord->patientinformation_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('medicalrecords.destroy', $medicalrecord->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('medicalrecords.edit', 'Edit', array($medicalrecord->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
