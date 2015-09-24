@extends('backend::_layouts.application')

@section('title'){{ trans('whole::tr.components.create_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::tr.components.create_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::tr.components.create_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.component.index') }}">{{ trans('whole::tr.components.create_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::tr.components.create_breadcrumb2') }}</a>
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
                        <i class="fa fa-icon fa-puzzle-piece font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> {{ trans('whole::tr.components.create_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.component.store'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-10">
								{!! Form::submit(trans('whole::tr.components.save'),['class'=>'btn blue']) !!}
								<a href="{{ URL::route('admin.component.index') }}" class="btn default">{{ trans('whole::tr.components.cancel') }}</a>
							</div>
						</div>
					</div>
                        <div class="form-body">
                            @include('backend::components._form')
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    {!! Form::submit(trans('whole::tr.components.save'),['class'=>'btn blue']) !!}
                                    <a href="{{ URL::route('admin.component.index') }}" class="btn default">{{ trans('whole::tr.components.cancel') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection