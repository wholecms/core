@extends('backend::_layouts.application')

@section('title'){{ trans('whole::roles.index_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::roles.index_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::roles.index_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::roles.index_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::roles.index_breadcrumb2') }}</a>
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
                        <i class="icon-users font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::roles.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.role.create') }}">
                            <i class="fa fa-plus"></i>{{ trans('whole::roles.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::roles.index_table_th1') }}</th>
                            <th>{{ trans('whole::roles.index_table_th2') }}</th>
                            <th>{{ trans('whole::roles.index_table_th3') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr class="odd gradeX">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->role_name }}</td>
                                <td>{{ $role->permits==1? trans('whole::roles.permits_on') : trans('whole::roles.permits_off') }}</td>
                                <td>
                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i>{{ trans('whole::roles.edit') }}</a>
                                    <a href="{{ route('admin.role.destroy',$role->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i>{{ trans('whole::roles.delete') }}</a>
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