@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS İçerik Sayfası Düzenle" }}@endsection

@section('page_title')
    <h1> İçerik Sayfası Düzenle</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Sayfalar</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('admin.content_page.index') }}">İçerik Sayfaları</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">İçerik Sayfası Düzenle</a>
        </li>
    </ul>
@endsection


@section('content')
    <div class="row">
        <div class="page-scaffold-main col-xs-12 col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze" style="width: 100%;">
                        <i class="icon-doc font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> İçerik Sayfası Düzenle</span>
                        <div class="right_container_responsive"><a id="open" href="#"><i class="fa fa-cog"></i> Ayarlar</a></div>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <div class="_flash"></div>

                    <button type="button" style="margin:0 5px 10px 5px;" class="btn blue pull-right sendform">Kaydet</button>
                    <a href="{!! route('admin.content_page.index') !!}" style="margin:0 5px 10px 5px;" class="btn default pull-right ">İptal</a>
                    <div class="clearfix"></div>

                    <div class="page-scaffold">
                        {!! $content_page->template->scaffold !!}
                        <div class="clearfix"></div>
                    </div><!-- page-scaffold-->

                </div>
            </div>
        </div>

        <div class="col-md-3 col-xs-3 content_right_container">
            <div class="row">
                <div class="scroll">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> Ayarlar
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            {!! Form::open(['method'=>'put','route'=>['admin.content_page.update',$content_page->id],'role'=>'form','class'=>'form-horizontal']) !!}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-12" for="form_control_1"><strong>Şablon Adı</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="{!! $content_page->name !!}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="form_control_1"><strong>Tema Seçiniz</strong></label>
                                        <div class="col-md-12">
                                            {!! Form::select('template',$templates,$content_page->template_id,['class'=>'form-control select_template']) !!}
                                        </div>
                                     </div>

                                    <div class="portlet box blue" style="margin-bottom:15px;">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-comments"></i> Alanları Gizle
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="expand">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body" style="display: none;">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="checkbox-list">
                                                       <div class="select_template_fields">
                                                        @if($template_fields->count()>0)
                                                            @foreach($template_fields as $template_field)
                                                                <div class="col-md-12"><label class="checkbox-inline"><input @if(Whole\Core\Http\Helpers\ContentPagesHelper::inValue($content_page->hiddenFields,$template_field->field)) checked="checked" @endif class="checkbox-page-scaffold" type="checkbox" value="{{ $template_field->field }}" name="field[]"> {{ $template_field->name }} </label></div>
                                                            @endforeach
                                                        @endif
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn blue">Kaydet</button>
                                            <a href="{{ route('admin.content_page.index') }}" class="btn default">Geri</a>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                            <div id="nl_item_main-content" class="dd nl_item">
                                <ol class="dd-list">
                                    <li class="dd-item dd3-item" data-type="main-content" data-data_id="0">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">İçerik</div>
                                        <div class="dd-remove disabled"><a href="#"> <i class="fa fa-remove"></i> </a></div>
                                    </li>
                                </ol>
                            </div>
                            <div class="_flash"></div>
                        </div>
                    </div>

                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i> Bloklar
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
                                        @foreach($blocks as $block)
                                            <li class="dd-item dd-item" data-type="block" data-data_id="{{ $block->id }}">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content"><a target="_blanks" href="{!! route('admin.block.edit',$block->id) !!}">{{ $block->name }}</a>
                                                    [<a target="_blanks" href="{!! route('admin.block.show',$block->id) !!}">Özl.</a>]</div>
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
                                <i class="fa fa-comments"></i> İçerikler
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
                                <i class="fa fa-comments"></i> Modül İçeriği
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
                                                <div class="dd3-content"><a target="_blanks" href="#">{{ $file->name." > ".$file->pivot->name }}</a></div>
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

    <div id="context-menu2">
        <ul class="dropdown-menu pull-left" role="menu">
            <li><a href="javascript:;">Bloklar</a>
                @if($blocks->count()>0)
                    <ul id="context-menu-block">
                        @foreach($blocks as $block)
                            <li data-type="block" data-data_id="{{ $block->id }}">
                                <a href="#">
                                    {{ $block->name }}
                                    <i class="list_check fa fa-plus"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
            <li><a href="javascript:;">İçerikler</a>
                @if($contents->count()>0)
                    <ul id="context-menu-content">
                        @foreach($contents as $content)
                            <li data-type="content" data-data_id="{{ $content->id }}">
                                <a href="#">
                                    {{ $content->title }}
                                    <i class="list_check fa fa-plus"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
            <li><a href="javascript:;">Modül İçeriği</a>
                @if($components->count()>0)
                    <ul id="context-menu-component-file">
                        @foreach($components as $component)
                            @foreach($component->file as $file)
                                <li data-type="component-file" data-data_id="{{ $file->pivot->id }}">
                                    <a href="#">{{ $file->name." > ".$file->pivot->name }}
                                        <i class="list_check fa fa-plus"></i>
                                    </a>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                @endif
            </li>
            <li><a href="javascript:;">Ana İçerik</a>
                <ul id="context-menu-main-content">
                    <li data-type="main-content" data-data_id="0">
                        <a href="#">İçerik
                            <i class="list_check fa fa-plus"></i>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
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
    {!! Html::script('assets/backend/global/plugins/bootstrap-contextmenu/bootstrap-contextmenu.js') !!}
    {!! Html::script('assets/backend/admin/pages/scripts/components-context-menu.js') !!}
    @include('backend::_layouts._table_js')
@endsection


@section('footer')
    <script>
        jQuery(document).ready(function() {
            UINestable.init();

            var hidden_fields = {!! $content_page->hiddenFields !!}
            $.each(hidden_fields,function(key,value){
                $("."+value['pivot']['field_name']).hide();
            });


            var field_details  = {!! $content_page_field !!};


            $.each( field_details, function( field_key, field_value ) {
                        if (field_value['fields_details'].length>0)
                        {var i = 0;
                            $.each(field_value['fields_details'],function(detail_key,detail_value){
                                var clone = $("ol li[data-data_id='"+detail_value['pivot']['data_id']+"'][data-type='"+detail_value['pivot']['type']+"']");
                                clone.find(".dd-remove").removeClass("disabled");
                                clone.remove();
                                $("#context-menu2 ul li[data-data_id='"+detail_value['pivot']['data_id']+"'][data-type='"+detail_value['pivot']['type']+"']").remove();
                                $(".page-scaffold ."+field_value['field']).children(".dd-empty").remove();
                                if(i==0){
                                    $(".page-scaffold ."+field_value['field']).append("<ol class=\"dd-list\"></ol>");
                                }
                                $(".page-scaffold ."+field_value['field']+" ol").append(clone.clone());
                            i++;});
                        }

            });



        $(".portlet-body .nl_item").each(function(){
            if($(this).children("ol").children("li").size()<1)
            {
                $(this).html('<div class="dd-empty"></div>');
            }
        });


        $(".select_template").change(function(){
            var tmplate_id = $(this).val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $("ol.dd-list li .dd-remove").trigger('click');
            $(".page-scaffold").html("");
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.content_page.select_template') }}",
                    data: { id: tmplate_id, _token:token },
                    success:function(response)
                    {
                        if (response!="false"){

                            $(".page-scaffold").html(response.scaffold+"<div class=\"clearfix\"></div>");
                            $(".select_template_fields").html("");
                            if (response.template_fields.length>0)
                            {
                                $.each(response.template_fields,function(key,value){
                                    $(".select_template_fields").append('<div class="col-md-12"><label class="checkbox-inline"><input class="checkbox-page-scaffold" type="checkbox" value="'+value.field+'" name="field[]"> '+value.name +' </label></div>');
                                });
                            }
                            UINestable.init();
                        }else
                        {
                            alert("Birşeyler Yanlış Gitti Doğru Temayı Seçtiğinize Emin Olun");
                        }
                    }
                });
                return false;
            });


        $(".sendform").click(function(){
            $("form").trigger("submit");
        });

            $("form").on("submit",function(){

                if($("input[name='name']").val()==""){
                    $("._flash").html('<div class="alert alert-danger">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    'Şablon Adı Boş Bırakılamaz'+
                    '</div>');
                    return false;
                }

                $(".form-actions button[type='submit']").html('<i class="fa fa-spinner fa-pulse"></i>');
                var token = $('meta[name="csrf-token"]').attr('content');
                var form = $(this).serialize();
                var header_top = $("#nl_header_top").size()>0?updateOutput($('#nl_header_top').data('output', $('#nestable_list_1_output'))):'[]';
                var header_top_left = $("#nl_header_top_left").size()>0?updateOutput($('#nl_header_top_left').data('output', $('#nestable_list_1_output'))):'[]';
                var header_top_right = $("#nl_header_top_right").size()>0?updateOutput($('#nl_header_top_right').data('output', $('#nestable_list_1_output'))):'[]';
                var header = $("#nl_header").size()>0?updateOutput($('#nl_header').data('output', $('#nestable_list_1_output'))):'[]';
                var header_left = $("#nl_header_left").size()>0?updateOutput($('#nl_header_left').data('output', $('#nestable_list_1_output'))):'[]';
                var header_right = $("#nl_header_right").size()>0?updateOutput($('#nl_header_right').data('output', $('#nestable_list_1_output'))):'[]';
                var header_bottom = $("#nl_header_bottom").size()>0?updateOutput($('#nl_header_bottom').data('output', $('#nestable_list_1_output'))):'[]';
                var navigation = $("#nl_navigation").size()>0?updateOutput($('#nl_navigation').data('output', $('#nestable_list_1_output'))):'[]';
                var content_top = $("#nl_content_top").size()>0?updateOutput($('#nl_content_top').data('output', $('#nestable_list_1_output'))):'[]';
                var content_left = $("#nl_content_left").size()>0?updateOutput($('#nl_content_left').data('output', $('#nestable_list_1_output'))):'[]';
                var content_main = $("#nl_content_main").size()>0?updateOutput($('#nl_content_main').data('output', $('#nestable_list_1_output'))):'[]';
                var content_right = $("#nl_content_right").size()>0?updateOutput($('#nl_content_right').data('output', $('#nestable_list_1_output'))):'[]';
                var content_bottom = $("#nl_content_bottom").size()>0?updateOutput($('#nl_content_bottom').data('output', $('#nestable_list_1_output'))):'[]';
                var footer_top = $("#nl_footer_top").size()>0?updateOutput($('#nl_footer_top').data('output', $('#nestable_list_1_output'))):'[]';
                var footer = $("#nl_footer").size()>0?updateOutput($('#nl_footer').data('output', $('#nestable_list_1_output'))):'[]';
                var footer_bottom = $("#nl_footer_bottom").size()>0?updateOutput($('#nl_footer_bottom').data('output', $('#nestable_list_1_output'))):'[]';
                var hidden_field_1 = $("#nl_hidden_field_1").size()>0?updateOutput($('#nl_hidden_field_1').data('output', $('#nestable_list_1_output'))):'[]';
                var hidden_field_2 = $("#nl_hidden_field_2").size()>0?updateOutput($('#nl_hidden_field_2').data('output', $('#nestable_list_1_output'))):'[]';
                var hidden_field_3 = $("#nl_hidden_field_3").size()>0?updateOutput($('#nl_hidden_field_3').data('output', $('#nestable_list_1_output'))):'[]';
                var other_field_1 = $("#nl_other_field_1").size()>0?updateOutput($('#nl_other_field_1').data('output', $('#nestable_list_1_output'))):'[]';
                var other_field_2 = $("#nl_other_field_2").size()>0?updateOutput($('#nl_other_field_2').data('output', $('#nestable_list_1_output'))):'[]';
                var other_field_3 = $("#nl_other_field_3").size()>0?updateOutput($('#nl_other_field_3').data('output', $('#nestable_list_1_output'))):'[]';
                var other_field_4 = $("#nl_other_field_4").size()>0?updateOutput($('#nl_other_field_4').data('output', $('#nestable_list_1_output'))):'[]';
                var other_field_5 = $("#nl_other_field_5").size()>0?updateOutput($('#nl_other_field_5').data('output', $('#nestable_list_1_output'))):'[]';




                $.ajax({
                    method: "POST",
                    url: "{!! route('admin.content_page.update',$content_page->id) !!}",
                    data: form+
                    "&header_top="+header_top+
                    "&header_top_left="+header_top_left+
                    "&header_top_right="+header_top_right+
                    "&header="+header+
                    "&header_left="+header_left+
                    "&header_right="+header_right+
                    "&header_bottom="+header_bottom+
                    "&content_top="+content_top+
                    "&navigation="+navigation+
                    "&content_left="+content_left+
                    "&content_main="+content_main+
                    "&content_right="+content_right+
                    "&content_bottom="+content_bottom+
                    "&footer_top="+footer_top+
                    "&footer="+footer+
                    "&footer_bottom="+footer_bottom+
                    "&hidden_field_1="+hidden_field_1+
                    "&hidden_field_2="+hidden_field_2+
                    "&hidden_field_3="+hidden_field_3+
                    "&other_field_1="+other_field_1+
                    "&other_field_2="+other_field_2+
                    "&other_field_3="+other_field_3+
                    "&other_field_4="+other_field_4+
                    "&other_field_5="+other_field_5,
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
                            location =  "{!! route('admin.content_page.index') !!}";
                        }
                        $(".form-actions button[type='submit']").html('Kaydet');
                    }
                });

                return false;
            });



        $("body").on('click','.dd-remove',function(){
            if (!$(this).hasClass("disabled"))
            {
                var ths = $(this).parents("ol.dd-list");
                var item = $(this).parents("li");
                item.children(".dd-remove").addClass("disabled");
                var type = item.attr("data-type");
                var id = item.attr("data-data_id");
                var text = item.text();

                $.each(['master_page-content','block','content','component-file','main-content'],function(key,class_type){
                    if (class_type==type)
                    {
                        if (typeof $("#nl_item_"+class_type).children("ol.dd-list")[0] === "undefined")
                        {
                            $("#nl_item_"+class_type).html('<ol class="dd-list"></ol>');
                        }
                        $("#nl_item_"+class_type).children("ol.dd-list").append(item.clone());
                        $("ul#context-menu-"+type).append('<li data-data_id="'+id+'" data-type="'+type+'"><a href="#">'+text+' <i class="list_check fa fa-plus"></i></a></li>');
                        if(item.parents("ol.dd-list").find("li").size()==1)
                        {
                            $(ths).parent("div").append('<div class="dd-empty"></div>');
                            $(ths).remove();
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
