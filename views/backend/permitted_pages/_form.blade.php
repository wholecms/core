<div class="form-group">
    {!! Form::label(trans('whole::permitted_pages.form_label_1'),null,['class'=>'col-md-2 control-label text-bold']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('process','0') !!}
                {!! Form::checkbox('process','1',$permitted_page->count()>0?$permitted_page[0]->process:true) !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::permitted_pages.form_label_2'),null,['class'=>'col-md-2 control-label  text-bold']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('access','0') !!}
                {!! Form::checkbox('access','1',$permitted_page->count()>0?$permitted_page[0]->access:null) !!}
            </label>
        </div>
    </div>
</div>
@foreach($roles as $role)
    <div class="form-group col-md-6">
        {!! Form::label($role->role_name." ".trans('whole::permitted_pages.form_label_3'),null,['class'=>'col-md-12 text-left text-bold']) !!}
        <div class="col-md-12">
            {!! Form::select('path['.$role->id.'][]',$all_pages,isset($permit[$role->id])?$permit[$role->id]:null,['placeholder'=>trans('whole::permitted_pages.form_label_4'),'class'=>'form-control','multiple'=>'multiple','size'=>20]) !!}
        </div>
    </div>
@endforeach

