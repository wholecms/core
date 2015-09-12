@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS Bloklar" }}@endsection

@section('page_title')
    <h1>Bloklar <small>Tüm Bloklar</small></h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Bloklar</a>
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
                        <i class="fa fa-icon fa-list-alt font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Bloklar </span>
                        <a class="btn green pull-right" href="{{ route('admin.block.create') }}">
                            <i class="fa fa-plus"></i> Yeni Ekle
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    @include('backend::_errors.error')
                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Blok Adı</th>
                            <th>Blok Başlık</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $block)
                            <tr class="odd gradeX">
                                <td>{{ $block->id }}</td>
                                <td>{{ $block->name }}</td>
                                <td>{{ $block->title }}</td>
                                <td>
                                    <a href="{{ route('admin.block.show',$block->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-plus"></i> Özellikler</a>
                                    <a data-status="{{ $block->title_visibility }}" data-id="{{ $block->id }}" href="#" class="update_title_visibility btn btn-link btn-sm"> <i class="{!! $block->title_visibility==1?'fa fa-eye':'fa fa-eye-slash' !!}"></i> Başlık</a>
                                    <a data-status="{{ $block->status }}" data-id="{{ $block->id }}" href="#" class="update_status btn btn-link btn-sm"> <i class="fa {!! $block->status==1?'fa fa-eye':'fa fa-eye-slash' !!}"></i> Yayın</a>
                                    <a href="{{ route('admin.block.edit',$block->id) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Düzenle</a>
                                    <a href="{{ route('admin.block.destroy',$block->id) }}" class="btn btn-danger btn-sm" data-method="delete"> <i class="fa fa-trash"></i> Sil</a>
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
                    url: "{{ route('admin.block.ajax_update') }}",
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
                            alert("Bir Hata Meydana Geldi ve Güncellenemedi");
                        }
                    }
                });

                return false;
            });

        });
    </script>
@endsection