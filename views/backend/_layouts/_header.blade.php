<div class="page-header-inner">
    <div class="page-logo">
        <a href="{{ route('admin.index') }}">
            @if($settings->get()->admin_logo=="")
                <img class="logo-default" src="{{ URL::to('assets/backend/admin/layout4/img/logo-light.png') }}" alt="{{ ($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS' }}"/>
            @else
                <img class="logo-default" src="{!! $settings->get()->admin_logo !!}" alt="{{ ($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS' }}"/>
            @endif
        </a>
        <div class="menu-toggler sidebar-toggler">
            <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
        </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->

    <!-- BEGIN PAGE TOP -->
    <div class="page-top">
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="separator hide">
                </li>
                <li class="dropdown dropdown-user dropdown-dark">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{ $user->name }} </span>
                        <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                        <img alt="" class="img-circle" src="{!! URL::to('assets/backend/admin/layout4/img/avatar.png') !!}"/>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ route('admin.user.edit',$user->id) }}">
                                <i class="icon-user"></i> {{ trans('whole::layouts.profile') }} </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="icon-key"></i> {{ trans('whole::layouts.logout') }} </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END PAGE TOP -->
</div>