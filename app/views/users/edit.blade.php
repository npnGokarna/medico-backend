@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit User</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($user, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

        <div class="form-group">
            {{ Form::label('username', 'Username:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Address:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('address', Input::old('address'), array('class'=>'form-control', 'placeholder'=>'Address')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control', 'placeholder'=>'Phone')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('fullname', 'Fullname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('fullname', Input::old('fullname'), array('class'=>'form-control', 'placeholder'=>'Fullname')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('dateofbirth', 'Dateofbirth:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('dateofbirth', Input::old('dateofbirth'), array('class'=>'form-control', 'placeholder'=>'Dateofbirth')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('ssn', 'Ssn:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('ssn', Input::old('ssn'), array('class'=>'form-control', 'placeholder'=>'Ssn')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('gender', 'Gender:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('gender', Input::old('gender'), array('class'=>'form-control', 'placeholder'=>'Gender')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('photourl', 'Photourl:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('photourl', Input::old('photourl'), array('class'=>'form-control', 'placeholder'=>'Photourl')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('usertype', 'Usertype:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('usertype', Input::old('usertype'), array('class'=>'form-control', 'placeholder'=>'Usertype')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('familydocotorname', 'Familydocotorname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('familydocotorname', Input::old('familydocotorname'), array('class'=>'form-control', 'placeholder'=>'Familydocotorname')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop