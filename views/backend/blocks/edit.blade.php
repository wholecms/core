@extends('backend::_layouts.application')

@section('title'){{ trans('whole::blocks.edit_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::blocks.edit_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::blocks.edit_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.block.index') }}">{{ trans('whole::blocks.edit_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::blocks.edit_breadcrumb2') }}</a>
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
                        <i class="fa fa-icon fa-list-alt font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::blocks.edit_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($block,['method' => 'put','route'=>['admin.block.update',$block->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ URL::route('admin.block.index') }}" class="btn default">{{ trans('whole::blocks.cancel') }}</a>
                                {!! Form::submit(trans("whole::blocks.edit"),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
					
					<div class="form-body">
                        @include('backend::blocks._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit(trans("whole::blocks.edit"),['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.block.index') }}" class="btn default">{{ trans('whole::blocks.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection