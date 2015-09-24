@extends('backend::_layouts.application')

@section('title'){{ trans('whole::tr.layouts.not_allowed_title') }}@endsection



@section('content')
    <div class="row">
        <div class="col-md-12 page-500">
            <div class="number" style="text-align: center;">
                {{ trans('whole::tr.layouts.not_access') }}
            </div><br /><br />
            <div class=" details">
                <h3 class="text-center">{!! trans('whole::tr.layouts.not_access_message') !!}</h3>
            </div>
        </div>

    </div>

@endsection


@section('include_css')
    {!! Html::style('assets/backend/admin/pages/css/error.css') !!}
@endsection