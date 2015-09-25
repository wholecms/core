@extends('backend::_layouts.application')

@section('title'){{ trans('whole::contents.create_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::contents.create_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::contents.create_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.content.index') }}">{{ trans('whole::contents.create_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::contents.create_breadcrumb2') }}</a>
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
                        <span class="caption-subject bold uppercase">{{ trans('whole::contents.create_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.content.store'],'class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    {!! Form::submit(trans('whole::contents.save'),['class'=>'btn blue']) !!}
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
                                    {!! Form::submit(trans('whole::contents.save'),['class'=>'btn blue']) !!}
                                    <a href="{{ URL::route('admin.content.index') }}" class="btn default">{{ trans('whole::contents.cancel') }}</a>
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

        CKEDITOR.replace( 'editor',{
            filebrowserBrowseUrl : "{!! URL::to('/elfinder') !!}",
            language :'tr',
            //uiColor : '#F7B42C',
            //height : 300,
            toolbarCanCollapse : true,
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