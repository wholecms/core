<div class="form-group">
    {!! Form::label(trans('whole::users.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null,['placeholder'=>trans('whole::users.form_label_1'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::users.form_label_2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null,['placeholder'=>trans('whole::users.form_label_2'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::users.form_label_3'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password',['placeholder'=>trans('whole::users.form_label_3'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::users.form_label_4'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password_confirmation',['placeholder'=>trans('whole::users.form_label_4'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::users.form_label_5'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('role',[''=>trans('whole::users.form_option_1')]+$roles->toArray(),(isset($user) && isset($user->roles->first()->id)) ? $user->roles->first()->id:null,['class'=>'form-control']) !!}
    </div>
</div>