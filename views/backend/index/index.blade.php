@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Yönetim Paneli" }}@endsection



@section('content')
    <div class="row">
        @include('backend::widgets.quick_menu')
        @include('backend::widgets.analytics')
        @include('backend::widgets.last_user')
    </div>
@endsection
