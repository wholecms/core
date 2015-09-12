@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Yeni Kullanıcı Grubu Ekle" }}@endsection

@section('page_title')
    <h1>Yeni Kullanıcı Grubu Ekle</h1>
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
            <a href="{{ route('admin.role.index') }}">Kullanıcı Grupları</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Yeni Kullanıcı Grubu Ekle</a>
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
                        <span class="caption-subject bold uppercase"> Yeni Kullanıcı Grubu Ekle</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.role.store'],'class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body">
                            @include('backend::roles._form')
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-2 col-md-10">
                                    {!! Form::submit("Kaydet",['class'=>'btn blue']) !!}
                                    <a href="{{ URL::route('admin.role.index') }}" class="btn default">İptal Et</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection