<div class="form-group">
    {!! Form::label("Adı Soyadı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null,['placeholder'=>'Adı Soyadı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("E-Mail Adresi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('email',null,['placeholder'=>'E-Mail Adresi','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Şifresi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password',['placeholder'=>'Şifresi','class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Şifresi (Tekrar)",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::password('password_confirmation',['placeholder'=>'Şifresi (Tekrar)','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Kullanıcı Grubu",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('role',[''=>'--Seçiniz--']+$roles->toArray(),(isset($user) && isset($user->roles->first()->id)) ? $user->roles->first()->id:null,['class'=>'form-control']) !!}
        {{--collect([''=>'--Seçiniz--'])->merge($roles)->all()--}}
    </div>
</div>