@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('whole::templates.create_title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('whole::templates.create_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::templates.create_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.template.index') }}">{{ trans('whole::templates.create_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::templates.create_breadcrumb2') }}</a>
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
                        <i class="icon-layers font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> {{ trans('whole::templates.create_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.template.store'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ URL::route('admin.template.index') }}" class="btn default">{{ trans('whole::templates.cancel') }}</a>
                                {!! Form::submit(trans('whole::templates.save'),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        @include('backend::templates._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::templates.save'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.template.index') }}" class="btn default">{{ trans('whole::templates.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection