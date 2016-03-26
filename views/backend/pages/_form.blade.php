<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('content_page_id',[''=>trans('whole::pages.form_option_1')]+$content_pages->toArray(),null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('menu_title',null,['placeholder'=>trans('whole::pages.form_label_2'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_3'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('menu_description',null,['placeholder'=>trans('whole::pages.form_label_3'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_4'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="menu_icon">{!! (isset($page) && $page->menu_icon!="")?"<i class=\"$page->menu_icon\"></i>":'' !!}</div>
        <a class="btn default" data-toggle="modal" href="#menu_icon">{{ trans('whole::pages.select_icon') }}</a>
        <a class="btn default icon_remove_btn" @unless(isset($page) && $page->menu_icon!="")style="display: none;"@endunless>{{ trans('whole::pages.remove') }}</a>
        {!! Form::hidden('menu_icon') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_5'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this)" class="img-thumbnail color_img" style="height:64px;" src="{!! (isset($page) && $page->menu_image!='') ? $page->menu_image : 'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64' !!}" />
        </div>
        <a class="btn default image_remove_btn" @unless(isset($page) && $page->menu_image!="")style="margin-top:4px;display: none;"@else style="margin-top:4px;" @endunless>{{ trans('whole::pages.remove') }}</a>
        {!! Form::hidden('menu_image') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_6'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_title',null,['placeholder'=>trans('whole::pages.form_label_6'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_7'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_keywords',null,['placeholder'=>trans('whole::pages.form_label_7'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_8'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_description',null,['placeholder'=>trans('whole::pages.form_label_8'),'class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_9'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('content_title',null,['placeholder'=>trans('whole::pages.form_label_9'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_10'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('title_visibility','0') !!}
                {!! Form::checkbox('title_visibility','1',isset($page)?null:true) !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_11'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('status','0') !!}
                {!! Form::checkbox('status','1',isset($page)?null:true) !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_12'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('access[]',$roles->toArray()+['0'=>trans('whole::pages.form_option_2')],isset($page)?unserialize($page->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_13'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('link_target',['_self'=>trans('whole::pages.form_option_3'),'_blank'=>trans('whole::pages.form_option_4')],isset($page)?$page->link_target:'_self',['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_14'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('content_embed','0') !!}
                {!! Form::checkbox('content_embed','1') !!}
            </label>
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_15'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox-list">
            <label class="checkbox-inline">
                {!! Form::hidden('default','0') !!}
                {!! Form::checkbox('default','1') !!}
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('whole::pages.form_label_16'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('content_type',[''=>trans('whole::pages.form_option_1'),'content'=>trans('whole::pages.form_option_5'),'component'=>trans('whole::pages.form_option_6'),'link'=>trans('whole::pages.form_option_7')],isset($page)?$page->content_type:null,['class'=>'form-control content_type']) !!}
    </div>
</div>

<div class="content_type_is_content" @unless(isset($page) && $page->content_type=="content")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label(trans('whole::pages.form_label_17'),null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('content_id',[''=>trans('whole::pages.form_option_1')]+$contents->toArray(),null,['class'=>'select2_category form-control','data-placeholder'=>trans('whole::pages.form_label_17')]) !!}
            <a style="margin-top:10px;" class="btn default create_content">{{ trans('whole::pages.new_content') }}</a>
            <a style="margin-top:10px;display: none;" class="btn default cancel_content_form">{{ trans('whole::pages.cancel') }}</a>
        </div>
    </div>
    <div class="create_content_form" style="display: none;">
        <div class="form-group">
            {!! Form::label(trans('whole::pages.form_label_18'),null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('create_content_title',null,['placeholder'=>trans('whole::pages.form_label_18'),'class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label(trans('whole::pages.form_label_19'),null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <div class="checkbox-list">
                    <label class="checkbox-inline">
                        {!! Form::hidden('create_content_title_visibility','0') !!}
                        {!! Form::checkbox('create_content_title_visibility','1',true) !!}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label(trans('whole::pages.form_label_20'),null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                <div class="checkbox-list">
                    <label class="checkbox-inline">
                        {!! Form::hidden('create_content_status','0') !!}
                        {!! Form::checkbox('create_content_status','1',true) !!}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label(trans('whole::pages.form_label_21'),null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::select('create_content_access[]',$roles->toArray()+['0'=>trans('whole::pages.form_option_2')],isset($content)?unserialize($content->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label(trans('whole::pages.form_label_22'),null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('create_content_content',null,['id'=>'editor','placeholder'=>trans('whole::pages.form_label_22'),'class'=>'form-control']) !!}
            </div>
        </div>

    </div><!-- create_content_form -->
</div>

<div class="content_type_is_component" @unless(isset($page) && $page->content_type=="component")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label(trans('whole::pages.form_label_23'),null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('component_id',[''=>trans('whole::pages.form_option_1')]+$components->toArray(),null,['class'=>'select_component select2_category form-control','data-placeholder'=>trans('whole::pages.form_label_23')]) !!}
        </div>
    </div>

	@if(isset($page) && $page->route!="")
	  <div class="clear_route form-group">
		{!! Form::label("",null,['class'=>'col-md-2 control-label']) !!}
		<div class="col-md-10">
			{!!$page->route!!}		 
		</div>
	    </div>
	@endif
</div>

<div class="content_type_is_link" @unless(isset($page) && $page->content_type=="link")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label(trans('whole::pages.form_label_24'),null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('external_link',null,['placeholder'=>trans('whole::pages.form_label_24'),'class'=>'form-control']) !!}
        </div>
    </div>
</div>
