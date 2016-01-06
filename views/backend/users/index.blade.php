@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('whole::users.index_title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('whole::users.index_page_title') }}</h1>
@endsection

@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::users.index_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.index_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::users.index_breadcrumb1') }}</a>
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
                        <span class="caption-subject bold uppercase"> {{ trans('whole::users.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.user.create') }}">
                            <i class="fa fa-plus"></i> {{ trans('whole::users.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::users.index_table_th1') }}</th>
                            <th>{{ trans('whole::users.index_table_th2') }}</th>
                            <th>{{ trans('whole::users.index_table_th3') }}</th>
                            <th>{{ trans('whole::users.index_table_th4') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ isset($user->roles->first()->role_name)?$user->roles->first()->role_name:"Grup Seçilmemiş" }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> {{ trans('whole::users.edit') }}</a>
                                    <a href="{{ route('admin.user.destroy',$user->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> {{ trans('whole::users.delete') }}</a>
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