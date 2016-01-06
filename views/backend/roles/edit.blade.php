@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('whole::roles.edit_title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('whole::roles.edit_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::roles.edit_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::roles.edit_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.role.index') }}">{{ trans('whole::roles.edit_breadcrumb2') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::roles.edit_breadcrumb3') }}</a>
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
                        <i class="icon-user font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::roles.edit_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($role,['method' => 'put','route'=>['admin.role.update',$role->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ URL::route('admin.role.index') }}" class="btn default">{{ trans('whole::roles.cancel') }}</a>
                                {!! Form::submit(trans('whole::roles.edit'),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        @include('backend::roles._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::roles.edit'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.role.index') }}" class="btn default">{{ trans('whole::roles.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection