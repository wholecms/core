<div class="form-group">
    {!! Form::label("Site Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>'Site Başlığı','class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Meta Keywords",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_keywords',null,['placeholder'=>'Site İle İlgili Anahtar Kelimeler','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Meta Description",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('meta_description',null,['placeholder'=>'Site Hakkında Kısa Açıklama','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("RSS Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('rss_title',null,['placeholder'=>'RSS Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("RSS Açıklaması",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('rss_description',null,['placeholder'=>'RSS Açıklaması','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Aktif Şablon",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('template_id',[''=>'--Seçiniz--']+$templates->toArray(),null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Logo",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'logo','logo_img','logo_remove_btn')" class="img-thumbnail logo_img" style="height:128px;" src="{!! $setting->logo!=''?$setting->logo:'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=128&h=128' !!}" />
        </div>
        <a class="btn default logo_remove_btn" @if($setting->logo=="") style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>Kaldır</a>
        {!! Form::hidden('logo') !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Logo Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('logo_title',null,['placeholder'=>'Logo Başlığı','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Logo Başlığı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('logo_description',null,['placeholder'=>'Logo Başlığı','class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Favicon",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div>
            <img id="imagesfile" onclick="openKCFinder(this,'favicon','favicon_img','favicon_remove_btn')" class="img-thumbnail favicon_img" style="height:64px;" src="{!! $setting->favicon!=''?$setting->favicon:'https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64' !!}" />
        </div>
        <a class="btn default favicon_remove_btn" @if($setting->favicon=="")style="display:none;margin-top:4px;" @else style="margin-top:4px;" @endif>Kaldır</a>
        {!! Form::hidden('favicon') !!}
    </div>
</div>





<div class="form-group">
    {!! Form::label("Site Çevirim İçi",null,['class'=>'col-md-2 control-label']) !!}
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
    {!! Form::label("Çevirim Dışı Mesajı",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('offline_message',null,['id'=>'editor','placeholder'=>'Çevirim Dışı Mesajı','class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::label("Copyright Metni",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('copyright',null,['id'=>'editor2','placeholder'=>'Copyright Metni','class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("Google Analytics Kodu",null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('google_analytics',null,['placeholder'=>'Google Analytics Kodu','class'=>'form-control','rows'=>5]) !!}
    </div>
</div>

