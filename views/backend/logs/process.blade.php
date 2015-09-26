@extends('backend::_layouts.application')

@section('title'){{ trans('whole::logs.process_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::logs.process_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::logs.process_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::logs.process_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::logs.process_breadcrumb2') }}</a>
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
                        <i class="fa fa-icon fa-exclamation-circle font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::logs.process_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'delete','route'=>['admin.logs.clear'],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                {!! Form::submit(trans('whole::logs.clear'),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-body" style="margin: 0;padding: 0;">
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea(null,$logs,['placeholder'=>trans('whole::logs.process_portlet_title'),'class'=>'form-control','rows'=>15,'disabled'=>'disabled']) !!}
                                    {!! Form::hidden('type','process') !!}
                                </div>
                            </div>
                        </div>
                    <div class="form-actions" style="margin: 0;padding: 0;">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::submit(trans('whole::logs.clear'),['class'=>'btn blue']) !!}
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection