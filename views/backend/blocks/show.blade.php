@extends('backend::_layouts.application')

@section('title'){{ trans('whole::tr.blocks.show_title') }}@endsection

@section('page_title')
    <h1>{{ trans('whole::tr.blocks.show_page_title') }}</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">{{ trans('whole::tr.blocks.show_breadcrumb0') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.block.index') }}">{{ trans('whole::tr.blocks.show_breadcrumb1') }}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">{{ trans('whole::tr.blocks.show_breadcrumb2') }}</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="col-xs-9 col-md-9">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="fa fa-icon fa-list-alt font-green-haze"></i>
                        <span class="caption-subject bold uppercase">{{ trans('whole::tr.blocks.show_portlet_title') }}</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    @include('backend::_errors.error')
                    <div class="_flash"></div>
                    {!! Form::open(['method'=>'post','route'=>['admin.block.attribute_create',$id]]) !!}
					<div class="text-right">
                        <button type="submit" class="post_attribute btn blue">{{ trans('whole::tr.blocks.save') }}</button>
                        <a href="{{ URL::route('admin.block.index') }}" class="btn default">{{ trans('whole::tr.blocks.cancel') }}</a>
                    </div>
					<div class="clearfix"></div>
					
                    <div id="nl_block_attribute" class="dd">
                        <div class="dd-empty"></div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="text-right">
                        <button type="submit" class="post_attribute btn blue">{{ trans('whole::tr.blocks.save') }}</button>
                        <a href="{{ URL::route('admin.block.index') }}" class="btn default">{{ trans('whole::tr.blocks.cancel') }}</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-3 col-xs-3 content_right_container" style="display: block;">
            <div class="row">
                <div class="scroll">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> {{ trans('whole::tr.blocks.pages') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body ">
                            <div id="nl_item_page" class="nl_item dd">
                                @if($pages->count()>0)
                                    <ol class="dd-list">
                                        @foreach($pages as $page)
                                            <li class="dd-item dd-item" data-type="page" data-data_id="{{ $page->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content"><a target="_blanks" href="{!! route('admin.page.edit',$page->id) !!}">{{ $page->menu_title }}</a></div>
                                                <div class="dd-remove disabled"><a href="#"> <i class="fa fa-remove"></i> </a></div>
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <div class="dd-empty"></div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> {{ trans('whole::tr.blocks.blocks') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body ">
                            <div id="nl_item_block" class="nl_item dd">
                                @if($blocks->count()>0)
                                    <ol class="dd-list">
                                        @foreach($blocks as $item)
                                            <li class="dd-item dd-item" data-type="block" data-data_id="{{ $item->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content"><a target="_blanks" href="{!! route('admin.block.edit',$item->id) !!}">{{ $item->name  }}</a>
                                                    [<a target="_blanks" href="{!! route('admin.block.show',$item->id) !!}">{{ trans('whole::tr.blocks.fet') }}</a>]
                                                </div>
                                                <div class="dd-remove disabled"><a href="#"> <i class="fa fa-remove"></i> </a></div>
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <div class="dd-empty"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> {{ trans('whole::tr.blocks.contents') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body ">
                            <div id="nl_item_content" class="nl_item dd">
                                @if($contents->count()>0)
                                    <ol class="dd-list">
                                        @foreach($contents as $content)
                                            <li class="dd-item dd-item" data-type="content" data-data_id="{{ $content->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content"><a target="_blanks" href="{!! route('admin.content.edit',$content->id) !!}">{{ $content->title }}</a></div>
                                                <div class="dd-remove disabled"><a href="#"> <i class="fa fa-remove"></i> </a></div>
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <div class="dd-empty"></div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> {{ trans('whole::tr.blocks.components') }}
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body ">
                            <div id="nl_item_component-file" class="nl_item dd">
                                @if($components->count()>0)
                                    <ol class="dd-list">
                                        @foreach($components as $component)
                                            @foreach($component->file as $file)
                                                <li class="dd-item dd-item" data-type="component-file" data-data_id="{{ $file->pivot->id }}">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content"><a href="#"> {{ $file->name." > ".$file->pivot->name }}</a></div>
                                                    <!-- TODO:Modüllerin link'ini düzenle -->
                                                    <div class="dd-remove disabled"><a href="#"> <i class="fa fa-remove"></i> </a></div>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ol>
                                @else
                                    <div class="dd-empty"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

@endsection



@section('include_css')
    {!! Html::style('assets/backend/global/css/page-scaffold.css') !!}
    {!! Html::style('assets/backend/global/plugins/jquery-nestable/jquery.nestable.css') !!}
    @include('backend::_layouts._table_css')
@endsection

@section('include_js')
    {!! Html::script('assets/backend/global/scripts/page-scaffold.js') !!}
    {!! Html::script('assets/backend/global/plugins/jquery-nestable/jquery.nestable.js') !!}
    {!! Html::script('assets/backend/admin/pages/scripts/ui-nestable.js') !!}
    @include('backend::_layouts._table_js')
@endsection


@section('footer')
    <script>
        jQuery(document).ready(function() {
            UINestable.init();

//            var block_detail = JSON.parse('[{"type":"page","data_id":17,"children":[{"type":"page","data_id":16}]},{"type":"page","data_id":15}]');


            @if(isset($block) && $block->item_json!="")
            var block_detail = $.parseJSON('{!! $block->item_json !!}');

            if (block_detail.length>0){$("#nl_block_attribute").html('<ol class="dd-list"></ol>');
                $("#nl_block_attribute").before('<div class="_load">{{ trans('whole::tr.blocks.loading') }}</div>');
                list_block_items(block_detail,false);
                $("._load").remove();
            }

            $(".portlet-body .nl_item").each(function(){
                if($(this).children("ol").children("li").size()<1)
                {
                    $(this).html('<div class="dd-empty"></div>');
                }
            });


            function list_block_items(block_detail,element)
            {
                element = element || false;
                if (element==false){ var $element = $("#nl_block_attribute ol");}
                else { $(element).append('<ol class="dd-list"></ol>');
                    var $element = $(element+" ol"); }
                $.each(block_detail,function(key,value){
                    var item = $("li[data-data_id='"+value['data_id']+"'][data-type='"+value['type']+"']");
                    item.children(".dd-remove").removeClass("disabled");
                    $element.append(item.clone());
                    if(value['children'])
                    {
                        list_block_items(value['children'],"#nl_block_attribute ol li[data-data_id='"+value['data_id']+"'][data-type='"+value['type']+"']");
                    }
                    item.remove();
                });
            }
            @endif

        $("form").on("submit",function(){

            var btn = $(this).children("button[type='submit']");
            btn.html('<i class="fa fa-spinner fa-pulse"></i>');
            var token = $('meta[name="csrf-token"]').attr('content');
            var form = $(this).serialize();
            var block_attribute = $("#nl_block_attribute").size()>0?updateOutput($('#nl_block_attribute').data('output', $('#nestable_list_1_output'))):'[]';


            $.ajax({
                method: "POST",
                url: $(this).attr("action"),
                data: form+
                "&block_attribute="+block_attribute,
                success:function(response)
                {
                    if (response!="true")
                    {
                        $("._flash").html('<div class="alert alert-danger">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                        response[1]+
                        '</div>');
                    }
                    else
                    {
                            location =  "{!! route('admin.block.index') !!}";
                    }
                    btn.html("{{ trans('whole::tr.blocks.save') }}");
                }
            });

            return false;
        });

            $("body").on('click','.dd-remove',function(){
                if (!$(this).hasClass("disabled"))
                {
                    var item = $(this).parents("li");
                    item.children(".dd-remove").addClass("disabled");
                    var type = item.attr("data-type");
                    $.each(['page','block','content','component-file'],function(key,class_type){
                        if (class_type==type)
                        {
                            if (typeof $("#nl_item_"+class_type).children("ol.dd-list")[0] === "undefined")
                            {
                                $("#nl_item_"+class_type).html('<ol class="dd-list"></ol>');
                            }
                            $("#nl_item_"+class_type).children("ol.dd-list").append(item.clone());
                            if(item.parents("ol.dd-list").find("li").size()==1)
                            {
                                $("#nl_block_attribute").html('<div class="dd-empty"></div>');
                            }
                            item.remove();
                        }
                    });
                }
                return false;
            });

        });


        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                    output = list.data('output');
            return window.JSON.stringify(list.nestable('serialize'));
            //if (window.JSON) {
            //    console.log(window.JSON.stringify(list.nestable('serialize')));
            //    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            //} else {
            //    output.val('JSON browser support required for this demo.');
            //    console.log('JSON browser support required for this demo.');
            //}
        };
    </script>
@endsection