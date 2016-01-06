<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>trans('whole::settings.form_label_1'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_keywords',null,['placeholder'=>trans('whole::settings.form_placeholder_2'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_3'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_description',null,['placeholder'=>trans('whole::settings.form_placeholder_3'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_4'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('rss_title',null,['placeholder'=>trans('whole::settings.form_label_4'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_5'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('rss_description',null,['placeholder'=>trans('whole::settings.form_label_5'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_6'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('template_id',[''=>trans('whole::settings.form_option_1')]+$templates->toArray(),null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_7'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'logo','logo_img','logo_remove_btn')" class="img-thumbnail logo_img" style="height:128px;" src="{!! $setting->logo!=''?$setting->logo:'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=128&h=128' !!}" />
        </div>
        <a class="btn default logo_remove_btn" @if($setting->logo=="") style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>{{ trans('whole::settings.remove') }}</a>
        {!! Form::hidden('logo') !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_8'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('logo_title',null,['placeholder'=>trans('whole::settings.form_label_8'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_9'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('logo_description',null,['placeholder'=>trans('whole::settings.form_label_9'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_10'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'favicon','favicon_img','favicon_remove_btn')" class="img-thumbnail favicon_img" style="height:64px;" src="{!! $setting->favicon!=''?$setting->favicon:'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64' !!}" />
        </div>
        <a class="btn default favicon_remove_btn" @if($setting->favicon=="")style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>{{ trans('whole::settings.remove') }}</a>
        {!! Form::hidden('favicon') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_11'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('status','0') !!}
                {!! Form::checkbox('status','1') !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_12'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('offline_message',null,['id'=>'editor','placeholder'=>trans('whole::settings.form_label_12'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_13'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('copyright',null,['id'=>'editor2','placeholder'=>trans('whole::settings.form_label_13'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_14'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('google_analytics',null,['placeholder'=>trans('whole::settings.form_label_14'),'class'=>'form-control','rows'=>5]) !!}
    </div>
</div>