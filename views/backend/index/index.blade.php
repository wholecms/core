@extends('backend::_layouts.application')

@section('title'){{ trans('whole::index.title') }}@endsection



@section('content')
    <div class="row">
        @include('backend::_errors.error')
		@include('backend::widgets.quick_menu')
        @include('backend::widgets.analytics')
        @include('backend::widgets.last_user')
    </div>
@endsection
