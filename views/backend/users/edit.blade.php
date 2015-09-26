@extends('backend::_layouts.application')

@section('title'){{ trans('whole::users.edit_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::users.edit_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::users.edit_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.edit_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.user.index') }}">{{ trans('whole::users.edit_breadcrumb2') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.edit_breadcrumb3') }}</a>
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
                        <span class="caption-subject bold uppercase">{{ trans('whole::users.edit_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($user,['method' => 'put','route'=>['admin.user.update',$user->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans('whole::users.edit'),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.user.index') }}" class="btn default">{{ trans('whole::users.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        @include('backend::users._form')
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection