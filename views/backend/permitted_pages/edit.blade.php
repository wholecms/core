@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Sayfa İzinleri" }}@endsection

@section('page_title')
    <h1>Sayfa İzinleri</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Sayfa İzinleri</a>
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
                        <i class="fa fa-icon fa-user-secret font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Sayfa İzinleri</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($permitted_page,['method' => 'post','route'=>['admin.permitted_page.store'],'class'=>'form-horizontal','role'=>'form']) !!}
                    {{--{!! Form::open(['method' => 'post','route'=>['admin.permitted_page.store'],'class'=>'form-horizontal','role'=>'form']) !!}--}}
                        <div class="form-body">
                            @include('backend::permitted_pages._form')
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::submit("Kaydet",['class'=>'btn blue']) !!}
                                    <a href="{{ URL::route('admin.permitted_page.index') }}" class="btn default">İptal Et</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('include_css')
    <style>
        .text-bold { font-weight: bold;}
    </style>
@endsection