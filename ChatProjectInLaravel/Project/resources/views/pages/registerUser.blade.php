

{!! Form::open(['action' => 'registerController@store','method'=>'POST']) !!}
    
    <div class="form-group">
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Title'])}}

    </div>
    <div class="form-group">
        {{Form::label('pass','password')}}
{{ Form::password('password', ['class' => 'awesome']) }}


    </div>
    <div class="form-group">
        {{Form::label('conf-pass','Confpassword')}}
{{ Form::password('password-confirm', ['class' => 'awesome']) }}


    </div>


    <div class="form-group">
        {{Form::label('title','email')}}
{{Form::email('email', $value = null, $attributes = [])}}

    </div>



    {{Form::submit('Submit',['class'=>'btn btn-info'])}}

{!! Form::close() !!}


 