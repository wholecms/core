@foreach($sidebar_menus as $sidebar_menu)
    @if($sidebar_menu->top_id==$top_id)
        @if($sidebar_menu->children_menu==1)
            <li @if(Whole\Core\Http\Helpers\SidebarMenuHelper::isActivePath($sidebar_menu->path) ||  Whole\Core\Http\Helpers\SidebarMenuHelper::isActive($sidebar_menus,$sidebar_menu->path,$sidebar_menu->id)) class="active" @endif>
                <a href="javascript:;">
                    @if($sidebar_menu->icon!="")<i class="{{ $sidebar_menu->icon }}"></i>@endif
                    <span class="title">{{ $sidebar_menu->title }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">@include('backend::_layouts._sidebar_menu',['sidebar_menus'=>$sidebar_menus,'top_id'=>$sidebar_menu->id])</ul>
            </li>
        @else
            <li @if(Whole\Core\Http\Helpers\SidebarMenuHelper::isActivePath($sidebar_menu->path)) class="active" @endif>
                <a href="{!! $sidebar_menu->route!='#'?route($sidebar_menu->route):'#' !!}">
                    @if($sidebar_menu->top_id==0) @if($sidebar_menu->icon!="") <i class="{{ $sidebar_menu->icon }}"></i> @endif @endif
                    <span class="title">{{ $sidebar_menu->title }}</span>
                </a>
            </li>
        @endif
    @endif
@endforeach