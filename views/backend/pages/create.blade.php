@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Yeni Sayfa Ekle" }}@endsection

@section('page_title')
    <h1>Yeni Sayfa Ekle</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.page.index') }}">Sayfalar</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Yeni Sayfa Ekle</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="fa fa-icon fa-map-signs font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Yeni Sayfa Ekle</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.page.store'],'class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">
                            @include('backend::pages._form')
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    {!! Form::submit("Kaydet",['class'=>'btn blue']) !!}
                                    <a href="{{ URL::route('admin.page.index') }}" class="btn default">İptal Et</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="menu_icon" tabindex="-1" role="menu_icon" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Icon Seçiniz</h4>
                </div>
                <div class="modal-body">
                    <h3>Bootstrap Icon</h3>
                    <ul class="bootstrap_icon"></ul>
                    <div class="clearfix"></div>
                    <h3>Font Awesome Icon</h3>
                    <ul class="fontawesome_icon"></ul>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Kapat</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection


@section('include_css')
    <style>
        .menu_icon i { font-size: 25px; margin-top:16px; margin-bottom: 5px;}
        .bootstrap_icon , .fontawesome_icon { margin: 0; padding: 0; list-style: none; }
        .bootstrap_icon li , .fontawesome_icon li { float: left; text-align: center; }
        .bootstrap_icon li a , .fontawesome_icon li a { display: block; padding:10px; text-align: center; }
        .bootstrap_icon li a:hover , .fontawesome_icon li a:hover {  background: #ccc;}
        .bootstrap_icon li a i , .fontawesome_icon li a i { font-size: 16px; }
    </style>
    {!! Html::style('assets/backend/global/plugins/select2/select2.css') !!}
@endsection

@section('include_js')
    {!! Html::script('assets/backend/global/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/backend/global/plugins/select2/select2.min.js') !!}
@endsection

@section('footer')
    {!! Html::script('assets/backend/admin/pages/scripts/form-samples.js') !!}
    <script>
        jQuery(document).ready(function() {
            FormSamples.init();
            $("body").on('click','.bootstrap_icon li a , .fontawesome_icon li a',function(){
                return false;
            });

            $("body").on('dblclick','.bootstrap_icon li a , .fontawesome_icon li a',function(){
                $(".menu_icon").html('<i class="'+$(this).attr("href")+'"></i>');
                $("input[name='menu_icon']").val($(this).attr("href"));
                $("#menu_icon").modal('hide');
                $(".icon_remove_btn").show();
            });

            $(".icon_remove_btn").click(function(){
                $(this).hide();
                $(".menu_icon").html("");
                $("input[name='menu_icon']").val('');
            });

            var bootstrap_icon = ['asterisk','plus','euro','eur','minus','cloud','envelope','pencil','glass','music','search','heart','star','star-empty','user','film','th-large','th','th-list','ok','remove','zoom-in','zoom-out','off','signal','cog','trash','home','file','time','road','download-alt','download','upload','inbox','play-circle','repeat','refresh','list-alt','lock','flag','headphones','volume-off','volume-down','volume-up','qrcode','barcode','tag','tags','book','bookmark','print','camera','font','bold','italic','text-height','text-width','align-left','align-center','align-right','align-justify','list','indent-left','indent-right','facetime-video','picture','map-marker','adjust','tint','edit','share','check','move','step-backward','fast-backward','backward','play','pause','stop','forward','fast-forward','step-forward','eject','chevron-left','chevron-right','plus-sign','minus-sign','remove-sign','ok-sign','question-sign','info-sign','screenshot','remove-circle','ok-circle','ban-circle','arrow-left','arrow-right','arrow-up','arrow-down','share-alt','resize-full','resize-small','exclamation-sign','gift','leaf','fire','eye-open','eye-close','warning-sign','plane','calendar','random','comment','magnet','chevron-up','chevron-down','retweet','shopping-cart','folder-close','folder-open','resize-vertical','resize-horizontal','hdd','bullhorn','bell','certificate','thumbs-up','thumbs-down','hand-right','hand-left','hand-up','hand-down','circle-arrow-right','circle-arrow-left','circle-arrow-up','circle-arrow-down','globe','wrench','tasks','filter','briefcase','fullscreen','dashboard','paperclip','heart-empty','link','phone','pushpin','usd','gbp','sort','sort-by-alphabet','sort-by-alphabet-alt','sort-by-order','sort-by-order-alt','sort-by-attributes','sort-by-attributes-alt','unchecked','expand','collapse-down','collapse-up','log-in','flash','log-out','new-window','record','save','open','saved','import','export','send','floppy-disk','floppy-saved','floppy-remove','floppy-save','floppy-open','credit-card','transfer','cutlery','header','compressed','earphone','phone-alt','tower','stats','sd-video','hd-video','subtitles','sound-stereo','sound-dolby','sound-5-1','sound-6-1','sound-7-1','copyright-mark','registration-mark','cloud-download','cloud-upload','tree-conifer','tree-deciduous','cd','save-file','open-file','level-up','copy','paste','alert','equalizer','king','queen','pawn','bishop','knight','baby-formula','tent','blackboard','bed','apple','erase','hourglass','lamp','duplicate','piggy-bank','scissors','bitcoin','btc','xbt','yen','jpy','ruble','rub','scale','ice-lolly','ice-lolly-tasted','education','option-horizontal','option-vertical','menu-hamburger','modal-window','oil','grain','sunglasses','text-size','text-color','text-background','object-align-top','object-align-bottom','object-align-horizontal','object-align-left','object-align-vertical','object-align-right','triangle-right','triangle-left','triangle-bottom','triangle-top','console','superscript','subscript','menu-left','menu-right','menu-down','menu-up'];
            $.each(bootstrap_icon,function(key,icon)
            {
                $("ul.bootstrap_icon").append('<li><a href="glyphicon glyphicon-'+icon+'"><i class="glyphicon glyphicon-'+icon+'"></i><br />'+icon+'</a></li>');
            });


            var fontawesome_icon = ['500px','amazon','balance-scale','battery-0','battery-1','battery-2','battery-3','battery-4','battery-empty','battery-full','battery-half','battery-quarter','battery-three-quarters','black-tie','calendar-check-o','calendar-minus-o','calendar-plus-o','calendar-times-o','cc-diners-club','cc-jcb','chrome','clone','commenting','commenting-o','contao','creative-commons','expeditedssl','firefox','fonticons','genderless','get-pocket','gg','gg-circle','hand-grab-o','hand-lizard-o','hand-paper-o','hand-peace-o','hand-pointer-o','hand-rock-o','hand-scissors-o','hand-spock-o','hand-stop-o','hourglass','hourglass-1','hourglass-2','hourglass-3','hourglass-end','hourglass-half','hourglass-o','hourglass-start','houzz','i-cursor','industry','internet-explorer','map','map-o','map-pin','map-signs','mouse-pointer','object-group','object-ungroup','odnoklassniki','odnoklassniki-square','opencart','opera','optin-monster','registered','safari','sticky-note','sticky-note-o','television','trademark','tripadvisor','tv','vimeo','wikipedia-w','y-combinator','yc',
                'adjust','anchor','archive','area-chart','arrows','arrows-h','arrows-v','asterisk','at','automobile','balance-scale','ban','bank','bar-chart','bar-chart-o','barcode','bars','battery-0','battery-1','battery-2','battery-3','battery-4','battery-empty','battery-full','battery-half','battery-quarter','battery-three-quarters','bed','beer','bell','bell-o','bell-slash','bell-slash-o','bicycle','binoculars','birthday-cake','bolt','bomb','book','bookmark','bookmark-o','briefcase','bug','building','building-o','bullhorn','bullseye','bus','cab','calculator','calendar','calendar-check-o','calendar-minus-o','calendar-o','calendar-plus-o','calendar-times-o','camera','camera-retro','car','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','cart-arrow-down','cart-plus','cc','certificate','check','check-circle','check-circle-o','check-square','check-square-o','child','circle','circle-o','circle-o-notch','circle-thin','clock-o','clone','close','cloud','cloud-download','cloud-upload','code','code-fork','coffee','cog','cogs','comment','comment-o','commenting','commenting-o','comments','comments-o','compass','copyright','creative-commons','credit-card','crop','crosshairs','cube','cubes','cutlery','dashboard','database','desktop','diamond','dot-circle-o','download','edit','ellipsis-h','ellipsis-v','envelope','envelope-o','envelope-square','eraser','exchange','exclamation','exclamation-circle','exclamation-triangle','external-link','external-link-square','eye','eye-slash','eyedropper','fax','feed','female','fighter-jet','file-archive-o','file-audio-o','file-code-o','file-excel-o','file-image-o','file-movie-o','file-pdf-o','file-photo-o','file-picture-o','file-powerpoint-o','file-sound-o','file-video-o','file-word-o','file-zip-o','film','filter','fire','fire-extinguisher','flag','flag-checkered','flag-o','flash','flask','folder','folder-o','folder-open','folder-open-o','frown-o','futbol-o','gamepad','gavel','gear','gears','gift','glass','globe','graduation-cap','group','hand-grab-o','hand-lizard-o','hand-paper-o','hand-peace-o','hand-pointer-o','hand-rock-o','hand-scissors-o','hand-spock-o','hand-stop-o','hdd-o','headphones','heart','heart-o','heartbeat','history','home','hotel','hourglass','hourglass-1','hourglass-2','hourglass-3','hourglass-end','hourglass-half','hourglass-o','hourglass-start','i-cursor','image','inbox','industry','info','info-circle','institution','key','keyboard-o','language','laptop','leaf','legal','lemon-o','level-down','level-up','life-bouy','life-buoy','life-ring','life-saver','lightbulb-o','line-chart','location-arrow','lock','magic','magnet','mail-forward','mail-reply','mail-reply-all','male','map','map-marker','map-o','map-pin','map-signs','meh-o','microphone','microphone-slash','minus','minus-circle','minus-square','minus-square-o','mobile','mobile-phone','money','moon-o','mortar-board','motorcycle','mouse-pointer','music','navicon','newspaper-o','object-group','object-ungroup','paint-brush','paper-plane','paper-plane-o','paw','pencil','pencil-square','pencil-square-o','phone','phone-square','photo','picture-o','pie-chart','plane','plug','plus','plus-circle','plus-square','plus-square-o','power-off','print','puzzle-piece','qrcode','question','question-circle','quote-left','quote-right','random','recycle','refresh','registered','remove','reorder','reply','reply-all','retweet','road','rocket','rss','rss-square','search','search-minus','search-plus','send','send-o','server','share','share-alt','share-alt-square','share-square','share-square-o','shield','ship','shopping-cart','sign-in','sign-out','signal','sitemap','sliders','smile-o','soccer-ball-o','sort','sort-alpha-asc','sort-alpha-desc','sort-amount-asc','sort-amount-desc','sort-asc','sort-desc','sort-down','sort-numeric-asc','sort-numeric-desc','sort-up','space-shuttle','spinner','spoon','square','square-o','star','star-half','star-half-empty','star-half-full','star-half-o','star-o','sticky-note','sticky-note-o','street-view','suitcase','sun-o','support','tablet','tachometer','tag','tags','tasks','taxi','television','terminal','thumb-tack','thumbs-down','thumbs-o-down','thumbs-o-up','thumbs-up','ticket','times','times-circle','times-circle-o','tint','toggle-down','toggle-left','toggle-off','toggle-on','toggle-right','toggle-up','trademark','trash','trash-o','tree','trophy','truck','tty','tv','umbrella','university','unlock','unlock-alt','unsorted','upload','user','user-plus','user-secret','user-times','users','video-camera','volume-down','volume-off','volume-up','warning','wheelchair','wifi','wrench',
                'hand-grab-o','hand-lizard-o','hand-o-down','hand-o-left','hand-o-right','hand-o-up','hand-paper-o','hand-peace-o','hand-pointer-o','hand-rock-o','hand-scissors-o','hand-spock-o','hand-stop-o','thumbs-down','thumbs-o-down','thumbs-o-up','thumbs-up',
                'ambulance','automobile','bicycle','bus','cab','car','fighter-jet','motorcycle','plane','rocket','ship','space-shuttle','subway','taxi','train','truck','wheelchair',
                'genderless','intersex','mars','mars-double','mars-stroke','mars-stroke-h','mars-stroke-v','mercury','neuter','transgender','transgender-alt','venus','venus-double','venus-mars',
                'file','file-archive-o','file-audio-o','file-code-o','file-excel-o','file-image-o','file-movie-o','file-o','file-pdf-o','file-photo-o','file-picture-o','file-powerpoint-o','file-sound-o','file-text','file-text-o','file-video-o','file-word-o','file-zip-o',
                'check-square','check-square-o','circle','circle-o','dot-circle-o','minus-square','minus-square-o','plus-square','plus-square-o','square','square-o','cc-amex','cc-diners-club','cc-discover','cc-jcb','cc-mastercard','cc-paypal','cc-stripe','cc-visa','credit-card','google-wallet','paypal','area-chart','bar-chart','bar-chart-o','line-chart','pie-chart','bitcoin','btc','cny','dollar','eur','euro','gbp','gg','gg-circle','ils','inr','jpy','krw','money','rmb','rouble','rub','ruble','rupee','shekel','sheqel','try','turkish-lira','usd','won','yen','align-center','align-justify','align-left','align-right','bold','chain','chain-broken','clipboard','columns','copy','cut','dedent','eraser','file','file-o','file-text','file-text-o','files-o','floppy-o','font','header','indent','italic','link','list','list-alt','list-ol','list-ul','outdent','paperclip','paragraph','paste','repeat','rotate-left','rotate-right','save','scissors','strikethrough','subscript','superscript','table','text-height','text-width','th','th-large','th-list','underline','undo','unlink',
                'angle-double-down','angle-double-left','angle-double-right','angle-double-up','angle-down','angle-left','angle-right','angle-up','arrow-circle-down','arrow-circle-left','arrow-circle-o-down','arrow-circle-o-left','arrow-circle-o-right','arrow-circle-o-up','arrow-circle-right','arrow-circle-up','arrow-down','arrow-left','arrow-right','arrow-up','arrows','arrows-alt','arrows-h','arrows-v','caret-down','caret-left','caret-right','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','caret-up','chevron-circle-down','chevron-circle-left','chevron-circle-right','chevron-circle-up','chevron-down','chevron-left','chevron-right','chevron-up','exchange','hand-o-down','hand-o-left','hand-o-right','hand-o-up','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','toggle-down','toggle-left',
                'toggle-right','toggle-up','arrows-alt','backward','compress','eject','expand','fast-backward','fast-forward','forward','pause','play','play-circle','play-circle-o','random','step-backward','step-forward','stop','youtube-play','ambulance','h-square','heart','heart-o','heartbeat','hospital-o','medkit','plus-square','stethoscope','user-md','wheelchair'];

            $.each(fontawesome_icon,function(key,icon)
            {
                $("ul.fontawesome_icon").append('<li><a href="fa fa-'+icon+'"><i class="fa fa-'+icon+'"></i><br />'+icon+'</a></li>');
            });

            $(".image_remove_btn").click(function(){
                $(this).hide();
                $("input[name='menu_image']").val("");
                $(".color_img").attr('src',"https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64");
            });

            $("select.content_type").change(function(){
                var type = $(this).val();
                $(".content_type_is_content , .content_type_is_component , .content_type_is_link").hide();
                switch (type)
                {
                    case "content":
                        $(".content_type_is_content").show();
                        break;
                    case "component":
                        $(".content_type_is_component").show();
                        break;
                    case "link":
                        $(".content_type_is_link").show();
                        break;
                }
            });

            $(".create_content").click(function(){
                $("select[name='content_id']").val('').trigger('change');
                $(".create_content_form , a.cancel_content_form").show();
                return false;
            });

            $(".cancel_content_form").click(function(){
                $(".create_content_form , a.cancel_content_form").hide();
                return false;
            });
        });

        function openKCFinder(field) {
            window.KCFinder = {
                callBack: function(url) {
                    $("input[name='menu_image']").val(url);
                    $(".color_img").attr('src',url);
                    $(".image_remove_btn").show();
                    window.KCFinder = null;
                }
            };
            window.open('{!! URL::to("/kcfinder") !!}', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=600'
            );
        }

        CKEDITOR.replace( 'editor',{
            filebrowserBrowseUrl : "{!! URL::to('/kcfinder') !!}",
            language :'tr',
            //uiColor : '#F7B42C',
            //height : 300,
            toolbarCanCollapse : true,
            enterMode : CKEDITOR.ENTER_BR
        });

    </script>
@endsection