<div class="form-group">
    {!! Form::label("Grup Adı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('role_name',null,['placeholder'=>'Grup Adı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Yönetim Paneli Erişim",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label>
                {!! Form::hidden('permits','0') !!}
                {!! Form::checkbox('permits',1) !!}
            </label>
        </div>
    </div>
</div>