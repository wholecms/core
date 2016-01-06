<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    {!! Html::style('assets/backend/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/uniform/css/uniform.default.css') !!}
    {!! Html::style('assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    @yield('include_css')
    {!! Html::style('assets/backend/global/css/components-md.css') !!}
    {!! Html::style('assets/backend/global/css/plugins-md.css') !!}
    {!! Html::style('assets/backend/admin/layout4/css/layout.css') !!}
    {!! Html::style('assets/backend/admin/layout4/css/themes/light.css') !!}
    {!! Html::style('assets/backend/admin/layout4/css/custom.css') !!}
    <link rel="shortcut icon" href="favicon.ico"/>
    @yield('head')
</head>
