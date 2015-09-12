@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Kullanıcı Grupları" }}@endsection

@section('page_title')
    <h1>Kullanıcı Grupları<small>Tüm Kullanıcı Grupları</small></h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Kullanıcı İşlemleri</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Kullanıcı Grupları</a>
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
                        <span class="caption-subject bold uppercase"> Kullanıcı Grupları</span>
                        <a class="btn green pull-right" href="{{ route('admin.role.create') }}">
                            <i class="fa fa-plus"></i> Yeni Ekle
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Grup Adı</th>
                            <th>Erişim İzni</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr class="odd gradeX">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->role_name }}</td>
                                <td>{{ $role->permits==1?"Panele Erişim İzni Var":"Panele Erişim İzni Yok" }}</td>
                                <td>
                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Düzenle</a>
                                    <a href="{{ route('admin.role.destroy',$role->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> Sil</a>
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