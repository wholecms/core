@extends('backend::_layouts.application')

@section('title'){{ trans('whole::contents.edit_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::contents.edit_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::contents.edit_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.content.index') }}">{{ trans('whole::contents.edit_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::contents.edit_breadcrumb2') }}</a>
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
                        <i class="fa fa-icon fa-pencil font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::contents.edit_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($content,['method' => 'put','route'=>['admin.content.update',$content->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::contents.edit'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.content.index') }}" class="btn default">{{ trans('whole::contents.cancel') }}</a>
                            </div>
                        </div>
                    </div>
					<div class="form-body">
                        @include('backend::contents._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::contents.edit'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.content.index') }}" class="btn default">{{ trans('whole::contents.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close(); !!}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('include_js')
    {!! Html::script('assets/backend/global/plugins/ckeditor/ckeditor.js') !!}
@endsection

@section('footer')
    <script type="text/javascript">

        CKEDITOR.replace( 'editor',{
            filebrowserBrowseUrl : "{!! URL::to('/elfinder') !!}",
            language :'tr',
            //uiColor : '#F7B42C',
            //height : 300,
            toolbarCanCollapse : true,
            allowedContent : true,
//            allowedContent : true,
            enterMode : CKEDITOR.ENTER_BR
        });

CKEDITOR.protectedSource.push(/<i[^>]*><\/i>/g);
CKEDITOR.protectedSource.push(/<span[^>]*><\/span>/g);
CKEDITOR.protectedSource.push( /<\?[\s\S]*?\?>/g );
CKEDITOR.protectedSource.push(/[^<]*(<h1>([^<]+)<\/h1>)/g);
CKEDITOR.protectedSource.push( /<cfscript[\s\S]*?\/cfscript>/g );
CKEDITOR.protectedSource.push( /<br[\s\S]*?\/>/g );   // BR Tags
CKEDITOR.protectedSource.push( /<img[\s\S]*?\/>/g );   // IMG Tags
CKEDITOR.protectedSource.push( /{exp:[\s\S]*?{\/exp:[^\}]+}/g );    // Expression Engine style server side code
CKEDITOR.protectedSource.push( /{.*?}/g);
CKEDITOR.protectedSource.push( /<tex[\s\S]*?\/tex>/g);
CKEDITOR.protectedSource.push( /<object[\s|\S]+?<\/object>/g); // Protects <OBJECT> tags
CKEDITOR.protectedSource.push( /<style[\s\S]*?\/style>/g); // Protects <STYLE> tags
CKEDITOR.protectedSource.push( /<cfoutput[\s\S]*?\/cfoutput>/g); // Protects <CFOUTPUT> tags
CKEDITOR.protectedSource.push( /<pre[\s\S]*?\/pre>/g);
CKEDITOR.protectedSource.push( /<code[\s\S]*?\/code>/g);
CKEDITOR.protectedSource.push( /<cfinclude[\s\S]*?\/cfinclude>/g);
CKEDITOR.protectedSource.push( /<cfloop[\s\S]*?\/cfloop>/g);
CKEDITOR.protectedSource.push( /<cfset[\s\S]*?\/cfset/g);
CKEDITOR.protectedSource.push( /<cf[\s\S]*?>/gi ) ; // ColdFusion cf tags - OPEN.
CKEDITOR.protectedSource.push( /<\/cf[\s\S]*?>/gi ) ; // ColdFusion cf tags - CLOSE.

        //        CKEDITOR.editorConfig = function( config ) {
        //            config.language = 'es';
        //            config.uiColor = '#F7B42C';
        //            config.height = 300;
        //            config.toolbarCanCollapse = true;
        //        };
    </script>
@endsection