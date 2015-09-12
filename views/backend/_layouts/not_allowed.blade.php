@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Yönetim Paneli" }}@endsection



@section('content')
    <div class="row">
        <div class="col-md-12 page-500">
            <div class="number" style="text-align: center;">
                Erişim İzni Yok
            </div><br /><br />
            <div class=" details">
                <h3 class="text-center">Bu Sayfayı Görebilmeniz İçin Sayfa Erişim İzniniz Bulunması Gerekmektedir.
                    <br />Site Yöneticisinden Erişim İzni Talep Edebilirsiniz</h3>
            </div>
        </div>

    </div>

@endsection


@section('include_css')
    {!! Html::style('assets/backend/admin/pages/css/error.css') !!}
@endsection