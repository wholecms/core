@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('whole::templates.index_title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('whole::templates.index_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::templates.index_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.template.index') }}">{{ trans('whole::templates.index_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::templates.index_breadcrumb2') }}</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze" style="width: 100%;">
                        <i class="icon-layers font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::templates.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.template.create') }}">
                            <i class="fa fa-plus"></i> {{ trans('whole::templates.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::templates.index_table_th1') }}</th>
                            <th>{{ trans('whole::templates.index_table_th2') }}</th>
                            <th>{{ trans('whole::templates.index_table_th3') }}</th>
                            <th>{{ trans('whole::templates.index_table_th4') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($templates as $template)
                            <tr class="odd gradeX">
                                <td>{{ $template->id }}</td>
                                <td>{{ $template->name }}</td>
                                <td>{{ $template->description }}</td>
                                <td>
                                    @if($setting->template!==null)
                                        @if($setting->template_id == $template->id)
                                            {{ trans('whole::templates.active_template') }}
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.template.destroy',$template->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> {{ trans('whole::templates.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('include_css')
    @include('backend::_layouts._table_css')
@endsection

@section('include_js')
    @include('backend::_layouts._table_js')
@endsection