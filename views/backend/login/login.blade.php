<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>{{ trans('whole::tr.contents.title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    {!! Html::style('assets/backend/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/backend/global/plugins/uniform/css/uniform.default.css') !!}
    {!! Html::style('assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! Html::style('assets/backend/admin/pages/css/login.css') !!}
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    {!! Html::style('assets/backend/global/css/components-md.css') !!}
    {!! Html::style('assets/backend/global/css/plugins-md.css') !!}
    {!! Html::style('assets/backend/admin/layout/css/layout.css') !!}
    {!! Html::style('assets/backend/admin/layout/css/themes/default.css') !!}
    {!! Html::style('assets/backend/admin/layout/css/custom.css') !!}
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{!! URL::to('assets/backend/admin/layout4/img/logo-big.png') !!}" alt="WholeCMS"/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {!! Form::open(['route'=>'admin.login.action','method'=>'post','class'=>'login-form']) !!}
        <h3 class="form-title">{{ trans('whole::tr.contents.form_title') }}</h3>
    @include('backend::_errors.error')
    <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>{{ trans('whole::tr.contents.error') }}</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">{{ trans('whole::tr.contents.form_label_1') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="{{ trans('whole::tr.contents.form_label_1') }}" name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ trans('whole::tr.contents.form_label_2') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="{{ trans('whole::tr.contents.form_label_2') }}" name="password"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">{{ trans('whole::tr.contents.login') }}</button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1"/>{{ trans('whole::tr.contents.rememberme') }}</label>
				{{--<a href="javascript:;" id="forget-password" class="forget-password">{{ trans('whole::tr.contents.forget_password') }}</a>--}}
        </div>
        <div class="create-account">
            <p>&nbsp;</p>
        </div>
    {!! Form::close() !!}
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3>{{ trans('whole::tr.contents.forget_title') }}</h3>
        <p>
            {{ trans('whole::tr.contents.forget_content') }}
        </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="{{ trans('whole::tr.contents.form_label_1') }}" name="email"/>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">{{ trans('whole::tr.contents.back') }}</button>
            <button type="submit" class="btn btn-success uppercase pull-right">{{ trans('whole::tr.contents.send') }}</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<div class="copyright">
    {{ date("Y") }} &copy; Whole CMS
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! Html::script('assets/backend/global/plugins/respond.min.js') !!}
{!! Html::script('assets/backend/global/plugins/excanvas.min.js') !!}
<![endif]-->
{!! Html::script('assets/backend/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery-migrate.min.js') !!}
{!! Html::script('assets/backend/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery.blockui.min.js') !!}
{!! Html::script('assets/backend/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! Html::script('assets/backend/global/plugins/jquery.cokie.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script('assets/backend/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! Html::script('assets/backend/global/scripts/metronic.js') !!}
{!! Html::script('assets/backend/admin/layout/scripts/layout.js') !!}
{!! Html::script('assets/backend/admin/layout/scripts/demo.js') !!}
{!! Html::script('assets/backend/admin/pages/scripts/login.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>