<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_15'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('admin_title',null,['placeholder'=>trans('whole::settings.form_label_15'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_16'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('admin_footer',null,['placeholder'=>trans('whole::settings.form_label_16'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_17'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'admin_logo','admin_logo_img','admin_logo_remove_btn')" class="img-thumbnail admin_logo_img" src="{!! $setting->admin_logo!=''?$setting->admin_logo:url('assets/backend/admin/layout4/img/logo-light.png') !!}" />
        </div>
        <a class="btn default admin_logo_remove_btn" @if($setting->admin_logo=="") style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>{{ trans('whole::settings.remove') }}</a>
        {!! Form::hidden('admin_logo') !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::settings.form_label_18'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'admin_login_logo','admin_login_logo_img','admin_login_logo_remove_btn')" class="img-thumbnail admin_login_logo_img" src="{!! $setting->admin_login_logo!=''?$setting->admin_login_logo:url('assets/backend/admin/layout4/img/logo-big.png') !!}" />
        </div>
        <a class="btn default admin_login_logo_remove_btn" @if($setting->admin_login_logo=="")style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>{{ trans('whole::settings.remove') }}</a>
        {!! Form::hidden('admin_login_logo') !!}
    </div>
</div>
