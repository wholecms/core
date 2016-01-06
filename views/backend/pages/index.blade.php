@inject('settings', 'Whole\Core\Injections\SettingsInjection')
@extends('backend::_layouts.application')

@section('title'){{ trans('whole::pages.index_title',['title'=>($settings->get()->admin_title!="") ? $settings->get()->admin_title : 'Whole CMS']) }}@endsection

@section('page_title')
    <h1>{{ trans('whole::pages.index_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::pages.index_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::pages.index_breadcrumb1') }}</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze" style="width: 100%;">
                        <i class="fa fa-icon fa-map-signs font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::pages.index_portlet_title') }}</span>
                        <a class="btn green pull-right" href="{{ route('admin.page.create') }}">
                            <i class="fa fa-plus"></i>{{ trans('whole::pages.add_new') }}
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('whole::pages.index_table_th1') }}</th>
                            <th>{{ trans('whole::pages.index_table_th2') }}</th>
                            <th>{{ trans('whole::pages.index_table_th3') }}</th>
                            <th>{{ trans('whole::pages.index_table_th4') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr class="odd gradeX">
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->menu_title }}</td>
                                <td>
                                    @if($page->content_type == "content")
                                        {{ trans('whole::pages.content') }}<br />
                                        <a target="_blank" href="{{ route('admin.content.edit',$page->content->id) }}">{{ $page->content->title }}</a>
                                    @elseif($page->content_type == "component")
                                        {{ trans('whole::pages.component') }}<br />
                                        {{ $page->component->component->name }} > {{ $page->component->name }}
                                    @elseif($page->content_type == "link")
                                        {{ trans('whole::pages.link') }}<br />
                                        {!! strlen($page->external_link)>20?'<a href="'.$page->external_link.'" target="_blank">'.substr($page->external_link,0,15).'</a>':'<a href="'.$page->external_link.'">'.$page->external_link.'</a>'!!}
                                    @endif
                                </td>
                                <td>
                                    <input type="text" onclick="select();" style="width: 150px;" value="{{ route('content_page',[str_slug($page->menu_title),$page->id]) }}" />
                                </td>
                                <td>
                                    <a data-status="{{ $page->title_visibility }}" data-id="{{ $page->id }}" href="#" class="update_title_visibility btn btn-link btn-sm"> <i class="{!! $page->title_visibility==1?'fa fa-eye':'fa fa-eye-slash' !!}"></i> {{ trans('whole::pages.title') }}</a>
                                    <a data-status="{{ $page->status }}" data-id="{{ $page->id }}" href="#" class="update_status btn btn-link btn-sm"> <i class="fa {!! $page->status==1?'fa fa-eye':'fa fa-eye-slash' !!}"></i> {{ trans('whole::pages.status') }}</a>
                                    <a href="{{ route('admin.page.edit',$page->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> {{ trans('whole::pages.edit') }}</a>
                                    <a href="{{ route('admin.page.destroy',$page->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i>{{ trans('whole::pages.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('include_css')
    @include('backend::_layouts._table_css')
@endsection

@section('include_js')
    @include('backend::_layouts._table_js')
@endsection

@section('footer')
    <script type="text/javascript">
        $(function(){
            $(".update_title_visibility , .update_status").click(function(){
                var ths = $(this);
                var type = ths.hasClass('update_title_visibility')?"title_visibility":"status";
                var id = ths.attr("data-id");
                var status = ths.attr("data-status")=="1"?"0":"1";
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.page.ajax_update') }}",
                    data: { type: type, id: id, status: status, _token:token },
                    success:function(response)
                    {
                        if (response=="true")
                        {
                            var klass;
                            ths.attr("data-status",status);
                            if (status=="1"){ klass="fa fa-eye";}
                            else{ klass="fa fa-eye-slash";}
                            ths.children("i").attr("class",klass);
                        }
                        else
                        {
                            alert("{{ trans('whole::pages.ajax_error0') }}");
                        }
                    }
                });

                return false;
            });

        });
    </script>
@endsection