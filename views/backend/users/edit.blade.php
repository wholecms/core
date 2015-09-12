@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Kullanıcı Düzenle" }}@endsection

@section('page_title')
    <h1>Kullanıcı Düzenle</h1>
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
            <a href="{{ route('admin.user.index') }}">Kullanıcılar</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Kullanıcı Düzenle</a>
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
                        <span class="caption-subject bold uppercase">Kullanıcı Düzenle</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    {!! Form::model($user,['method' => 'put','route'=>['admin.user.update',$user->id],'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-body">
                        @include('backend::users._form')
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                {!! Form::submit("Düzenle",['class'=>'btn blue']) !!}
                                <a href="{{ URL::route('admin.user.index') }}" class="btn default">İptal Et</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection