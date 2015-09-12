@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Ayarlar" }}@endsection

@section('page_title')
    <h1>Site Ayarları</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Site Ayarları</a>
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
                        <i class="fa fa-icon fa-cogs font-green-haze"></i>
                        <span class="caption-subject bold uppercase">Site Ayarları</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($setting,['method' => 'put','route'=>['admin.setting.update',$setting->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-body">
                        @include('backend::settings._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit("Düzenle",['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.setting.index') }}" class="btn default">İptal Et</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('include_js')
    {!! Html::script('assets/backend/global/plugins/ckeditor/ckeditor.js') !!}
@endsection

@section('footer')
    <script>
        $(function(){
            $(".logo_remove_btn").click(function(){
                $(this).hide();
                $("input[name='logo']").val("");
                $(".logo_img").attr('src',"https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=128&h=128");
            });

            $(".favicon_remove_btn").click(function(){
                $(this).hide();
                $("input[name='favicon']").val("");
                $(".favicon_img").attr('src',"https://placeholdit.imgix.net/~text?txtsize=17&bg=efefef&txtclr=aaaaaa%26amp%3Btext%3Dresim%2Byok&txt=Resim+Yok&w=64&h=64");
            });

        });

        function openKCFinder(field,input_name,img_class,btn_class) {
            window.KCFinder = {
                callBack: function(url) {
                    $("input[name='"+input_name+"']").val(url);
                    $("."+img_class).attr('src',url);
                    $("."+btn_class).show();
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
//            toolbarCanCollapse : true,
            enterMode : CKEDITOR.ENTER_BR
        });

        CKEDITOR.replace( 'editor2',{
            filebrowserBrowseUrl : "{!! URL::to('/kcfinder') !!}",
            language :'tr',
            toolbarGroups: [
                { name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
                '/',																// Line break - next group will be placed in new line.
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'links' }
            ],
            enterMode : CKEDITOR.ENTER_BR
        });

        //        CKEDITOR.editorConfig = function( config ) {
        //            config.language = 'es';
        //            config.uiColor = '#F7B42C';
        //            config.height = 300;
        //            config.toolbarCanCollapse = true;
        //        };
    </script>
@endsection