<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Whole CMS Yönetim Paneli Giriş</title>
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
        <img src="{!! URL::to('assets/backend/admin/layout4/img/logo-big.png') !!}" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {!! Form::open(['route'=>'admin.login.action','method'=>'post','class'=>'login-form']) !!}
    {{--<form class="login-form" action="index.html" method="post">--}}
        <h3 class="form-title">Giriş Yap</h3>
    @include('backend::_errors.error')
    <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
			<span>
			E-Mail adresi ve şifre boşbırakılamaz. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">E-Mail Adresi</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="E-Mail Adresi" name="email"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Şifreniz</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifreniz" name="password"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Giriş Yap</button>
            <label class="rememberme check">
                <input type="checkbox" name="remember" value="1"/>Beni Hatırla</label>
            <a href="javascript:;" id="forget-password" class="forget-password">Şifremi Unuttum</a>
        </div>
        <div class="create-account">
            <p>&nbsp;</p>
        </div>
    {!! Form::close() !!}
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.html" method="post">
        <h3>Şifrenizi mi Unuttunuz?</h3>
        <p>
            Şifrenizi Sıfırlamak İçin E-Mail Adresinizi Giriniz
        </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="E-Mail Adresiniz" name="email"/>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Geri</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Gönder</button>
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