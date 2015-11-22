@extends('layouts.scaffold')

@section('main')

<h1>All Medicalrecords</h1>

<p>{{ link_to_route('medicalrecords.create', 'Add New Medicalrecord', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($medicalrecords->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Patient_id</th>
				<th>Patientinformation_id</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($medicalrecords as $medicalrecord)
				<tr>
					<td>{{{ $medicalrecord->patient_id }}}</td>
					<td>{{{ $medicalrecord->patient_information_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('medicalrecords.destroy', $medicalrecord->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('medicalrecords.edit', 'Edit', array($medicalrecord->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no medicalrecords
@endif

@stop
