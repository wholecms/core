<div class="form-group">
    {!! Form::label(trans('whole::blocks.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null,['placeholder'=>trans('whole::blocks.form_label_1'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::blocks.form_label_2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>trans('whole::blocks.form_label_2'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::blocks.form_label_3'),null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label(trans('whole::blocks.form_label_4'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('list_embed','0') !!}
                {!! Form::checkbox('list_embed','1') !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::blocks.form_label_5'),null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label(trans('whole::blocks.form_label_6'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('access[]',$roles->toArray()+['0'=>'Ziyaretçi'],isset($block)?unserialize($block->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
    </div>
</div>