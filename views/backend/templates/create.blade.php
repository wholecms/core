@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Yeni Şablon Ekle" }}@endsection

@section('page_title')
    <h1>Yeni Şablon Ekle</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.template.index') }}">Şablon Yöneticisi</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Yeni Şablon Ekle</a>
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
                        <i class="icon-layers font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Yeni Şablon Ekle</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'post','route'=>['admin.template.store'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    <div class="form-body">
                        @include('backend::templates._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit("Kaydet",['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.template.index') }}" class="btn default">İptal Et</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection