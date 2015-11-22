@extends('layouts.scaffold')

@section('main')

<h1>Show Medicalreport</h1>

<p>{{ link_to_route('medicalreports.index', 'Return to All medicalreports', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Appointment_id</th>
				<th>Bloodpressure</th>
				<th>Temperature</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $medicalreport->appointment_id }}}</td>
					<td>{{{ $medicalreport->bloodpressure }}}</td>
					<td>{{{ $medicalreport->temperature }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('medicalreports.destroy', $medicalreport->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('medicalreports.edit', 'Edit', array($medicalreport->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
