<div class="form-group">
    {!! Form::label(trans('whole::tr.components.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::file('file',null,['placeholder'=>trans('whole::tr.components.form_label_1'),'class'=>'form-control']) !!}
        <p class="help-block">
            {{ trans('whole::tr.components.form_label_1') }}
        </p>
    </div>
</div>

