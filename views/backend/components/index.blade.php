@extends('backend::_layouts.application')

@section('title'){{ trans('whole::components.index_title') }}@endsection


@section('page_title')
    <h1>{{ trans('whole::components.index_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::components.index_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::components.index_breadcrumb1') }}</a>
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
                        <i class="fa fa-icon fa-puzzle-piece font-green-haze"></i>
                        <span class="caption-subject bold uppercase">  {{ trans('whole::components.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.component.create') }}">
                            <i class="fa fa-plus"></i>{{ trans('whole::components.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::components.index_table_th1') }}</th>
                            <th>{{ trans('whole::components.index_table_th2') }}</th>
                            <th>{{ trans('whole::components.index_table_th3') }}</th>
                            <th>{{ trans('whole::components.index_table_th4') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($components as $component)
                            <tr class="odd gradeX">
                                <td>{{ $component->id }}</td>
                                <td>{{ $component->name }}</td>
                                <td>{{ $component->description }}</td>
                                <td>
                                    @foreach($component->file as $file)
                                        <div class="row" style="margin-bottom:5px;">
                                            <div class="col-md-4 text-right">{{$file->pivot->name}}:</div>
                                            <div class="col-md-8 text-left"><input style="width:100%" type="text" value="{{ "{{ ".$component->folder.".".$file->pivot->file }} }}" onclick="select();" /> </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.component.destroy',$component->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> {{ trans('whole::components.delete') }}</a>
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
