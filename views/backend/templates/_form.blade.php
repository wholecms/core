<div class="form-group">
    {!! Form::label(trans('whole::templates.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::file('file',null,['placeholder'=>trans('whole::templates.form_label_1'),'class'=>'form-control']) !!}
        <p class="help-block">
            {{ trans('whole::templates.form_label_1') }}
        </p>
    </div>
</div>

