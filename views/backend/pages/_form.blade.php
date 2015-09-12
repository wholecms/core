<div class="form-group">
    {!! Form::label("Şablon Sayfası",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('content_page_id',[''=>'--Seçiniz--']+$content_pages->toArray(),null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Menü Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('menu_title',null,['placeholder'=>'Menü Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Menü Icon",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="menu_icon">{!! (isset($page) && $page->menu_icon!="")?"<i class=\"$page->menu_icon\"></i>":'' !!}</div>
        <a class="btn default" data-toggle="modal" href="#menu_icon">Icon Seçiniz</a>
        <a class="btn default icon_remove_btn" @unless(isset($page) && $page->menu_icon!="")style="display: none;"@endunless>Kaldır</a>
        {!! Form::hidden('menu_icon') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Menü Resmi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this)" class="img-thumbnail color_img" style="height:64px;" src="{!! (isset($page) && $page->menu_image!='') ? $page->menu_image : 'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64' !!}" />
        </div>
        <a class="btn default image_remove_btn" @unless(isset($page) && $page->menu_image!="")style="margin-top:4px;display: none;"@else style="margin-top:4px;" @endunless>Kaldır</a>

        {!! Form::hidden('menu_image') !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Meta Başlık",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_title',null,['placeholder'=>'Meta Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Meta Keywords",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_keywords',null,['placeholder'=>'Meta Keywords','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Meta Description",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_description',null,['placeholder'=>'Meta Description','class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Sayfa Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('content_title',null,['placeholder'=>'Sayfa Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Başlık Görünürlük",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Sayfa Yayın",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Erişim Seviyesi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('access[]',$roles->toArray()+['0'=>'Ziyaretçi'],isset($page)?unserialize($page->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Tıklandığında Açılma",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('link_target',['_self'=>'Aynı Sayfada','_blank'=>'Farklı Sayfada'],isset($page)?$page->link_target:'_self',['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("İçeriği Göm",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Varsayılan Sayfa",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Sayfa Tipi",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('content_type',[''=>'--Seçiniz--','content'=>'İçerik Sayfası','component'=>'Bileşen Sayfası','link'=>'Link'],isset($page)?$page->content_type:null,['class'=>'form-control content_type']) !!}
    </div>
</div>

<div class="content_type_is_content" @unless(isset($page) && $page->content_type=="content")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label("Sayfa İçeriği",null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('content_id',[''=>'--Seçiniz--']+$contents->toArray(),null,['class'=>'select2_category form-control','data-placeholder'=>'İçerik Seçiniz']) !!}
            <a style="margin-top:10px;" class="btn default create_content">Yeni İçerik Ekle</a>
            <a style="margin-top:10px;display: none;" class="btn default cancel_content_form">İptal Et</a>
        </div>
    </div>
    <div class="create_content_form" style="display: none;">
        <div class="form-group">
            {!! Form::label("İçerik Başlığı",null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text('create_content_title',null,['placeholder'=>'İçerik Başlığı','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label("Başlık Görünürlük",null,['class'=>'col-md-2 control-label']) !!}
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
            {!! Form::label("Yayın",null,['class'=>'col-md-2 control-label']) !!}
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
            {!! Form::label("Erişim Seviyesi",null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::select('create_content_access[]',$roles->toArray()+['0'=>'Ziyaretçi'],isset($content)?unserialize($content->access):$roles->keys()->toArray()+[$roles->count()=>0],['class'=>'form-control','multiple'=>'multiple','size'=>$roles->count()+1]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label("İçerik",null,['class'=>'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::textarea('create_content_content',null,['id'=>'editor','placeholder'=>'İçerik','class'=>'form-control']) !!}
            </div>
        </div>

    </div><!-- create_content_form -->
</div>

<div class="content_type_is_component" @unless(isset($page) && $page->content_type=="component")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label("Bileşen",null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('component_id',[''=>'--Seçiniz--']+$components->toArray(),null,['class'=>'select2_category form-control','data-placeholder'=>'İçerik Seçiniz']) !!}
        </div>
    </div>
</div>

<div class="content_type_is_link" @unless(isset($page) && $page->content_type=="link")style="display: none;"@endunless>
    <div class="form-group">
        {!! Form::label("Dış Bağlantı (Link)",null,['class'=>'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('external_link',null,['placeholder'=>'Dış Bağlantı (Link)','class'=>'form-control']) !!}
        </div>
    </div>
</div>