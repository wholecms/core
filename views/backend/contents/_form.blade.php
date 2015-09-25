<div class="form-group">
    {!! Form::label(trans('whole::contents.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>trans('whole::contents.form_label_1'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::contents.form_label_2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('title_visibility','0') !!}
                {!! Form::checkbox('title_visibility','1',true) !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::contents.form_label_3'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('status','0') !!}
                {!! Form::checkbox('status','1',true) !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::contents.form_label_4'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('access[]',$roles->toArray()+['0'=>trans('whole::contents.form_option_1')],isset($content)?unserialize($content->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::contents.form_label_5'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('content',null,['id'=>'editor','placeholder'=>trans('whole::contents.form_label_5'),'class'=>'form-control']) !!}
    </div>
</div>

