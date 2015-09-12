@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Giriş Logları" }}@endsection

@section('page_title')
    <h1>Giriş Logları</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Loglar</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Giriş Logları</a>
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
                        <i class="fa fa-icon fa-exclamation-circle font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Giriş Logları</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::open(['method' => 'delete','route'=>['admin.logs.clear'],'class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="form-body" style="margin: 0;padding: 0;">
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea(null,$logs,['placeholder'=>'Giriş Logları Boş','class'=>'form-control','rows'=>15,'disabled'=>'disabled']) !!}
                                    {!! Form::hidden('type','login') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-actions" style="margin: 0;padding: 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::submit("Logları Temizle",['class'=>'btn blue']) !!}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
