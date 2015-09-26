@extends('backend::_layouts.application')

@section('title'){{ trans('whole::users.create_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::users.create_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::users.create_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.create_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.user.index') }}">{{ trans('whole::users.create_breadcrumb2') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.create_breadcrumb3') }}</a>
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
                        <span class="caption-subject bold uppercase"> {{ trans('whole::users.create_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.user.store'],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ URL::route('admin.user.index') }}" class="btn default">{{ trans('whole::users.cancel') }}</a>
                                {!! Form::submit(trans('whole::users.save'),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
                        <div class="form-body">
                            @include('backend::users._form')
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::users.save'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.user.index') }}" class="btn default">{{ trans('whole::users.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection