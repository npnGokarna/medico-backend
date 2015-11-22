@extends('layouts.scaffold')

@section('main')

<h1>All Medicalreports</h1>

<p>{{ link_to_route('medicalreports.create', 'Add New Medicalreport', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($medicalreports->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Appointment_id</th>
				<th>Bloodpressure</th>
				<th>Temperature</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($medicalreports as $medicalreport)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no medicalreports
@endif

@stop
