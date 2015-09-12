<div class="form-group">
    {!! Form::label("Blok Adı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name',null,['placeholder'=>'Blok Adı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Blok Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>'Blok Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Başlık Görünürlük",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Listeyi Göm",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Yayın",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Erişim Seviyesi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('access[]',$roles->toArray()+['0'=>'Ziyaretçi'],isset($block)?unserialize($block->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
    </div>
</div>




