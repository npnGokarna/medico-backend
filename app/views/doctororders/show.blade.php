@extends('layouts.scaffold')

@section('main')

<h1>Show Doctororder</h1>

<p>{{ link_to_route('doctororders.index', 'Return to All doctororders', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Appointment_id</th>
				<th>Symptoms</th>
				<th>Diagnosis</th>
				<th>Medicine_prescribed</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $doctororder->appointment_id }}}</td>
					<td>{{{ $doctororder->symptoms }}}</td>
					<td>{{{ $doctororder->diagnosis }}}</td>
					<td>{{{ $doctororder->medicine_prescribed }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('doctororders.destroy', $doctororder->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('doctororders.edit', 'Edit', array($doctororder->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
