<div class="form-group">
    {!! Form::label("İşlem Yapma Kapalı",null,['class'=>'col-md-2 control-label text-bold']) !!}
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
    {!! Form::label("Erişim Kapalı",null,['class'=>'col-md-2 control-label  text-bold']) !!}
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
        {!! Form::label($role->role_name." Sayfa İzinleri",null,['class'=>'col-md-12 text-left text-bold']) !!}
        <div class="col-md-12">
            {!! Form::select('path['.$role->id.'][]',$all_pages,isset($permit[$role->id])?$permit[$role->id]:null,['placeholder'=>'Site Başlığı','class'=>'form-control','multiple'=>'multiple','size'=>20]) !!}
            {{--{!! Form::text('title',null,['placeholder'=>'Site Başlığı','class'=>'form-control']) !!}--}}
        </div>
    </div>

@endforeach

