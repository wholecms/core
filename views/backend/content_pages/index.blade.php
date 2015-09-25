@extends('backend::_layouts.application')

@section('title'){{ trans('whole::tr.content_pages.index_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::tr.content_pages.index_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::tr.content_pages.index_breadcrumb0') }}Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::tr.content_pages.index_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::tr.content_pages.index_breadcrumb2') }}</a>
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
                        <i class="icon-doc font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> {{ trans('whole::tr.content_pages.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.content_page.create') }}">
                            <i class="fa fa-plus"></i>{{ trans('whole::tr.content_pages.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::tr.content_pages.index_table_th1') }}</th>
                            <th>{{ trans('whole::tr.content_pages.index_table_th2') }}</th>
                            <th>{{ trans('whole::tr.content_pages.index_table_th3') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content_pages as $content_page)
                            <tr class="odd gradeX">
                                <td>{{ $content_page->id }}</td>
                                <td>{{ $content_page->name }}</td>
                                <td>{{ $content_page->template->name }}</td>
                                <td>
                                    <a href="{{ route('admin.content_page.edit',$content_page->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> {{ trans('whole::tr.content_pages.edit') }}</a>
                                    <a href="{{ route('admin.content_page.destroy',$content_page->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> {{ trans('whole::tr.content_pages.delete') }}</a>
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
