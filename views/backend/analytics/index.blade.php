@extends('backend::_layouts.application')

@section('title'){{ "Whole CMS İstatistikler" }}@endsection

@section('page_title')
    <h1>İstatistikler</h1>
@endsection


@section('page_breadcrumb')
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Yönetim Paneli</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">İstatistikler</a>
        </li>
    </ul>
@endsection


@section('content')
    @if ($response)
        <div class="row margin-top-10">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat2" style="height:240px;">
                    <div class="display">
                        <div class="number">
                            <h3 style="font-size:32px;color: #AAB5BC;font-weight: 600;text-transform: uppercase;">Şu an SİTEDE</h3>
                            @if($active_user[0]=="true")
                                <h3 class="loadPost font-green-sharp" style="font-size:130px;">{{ $active_user[1] }}</h3>
                            @else
                                <h3 class="loadPost font-green-sharp" style="font-size:40px;">{{ $active_user[1] }}</h3>
                            @endif
                            <small style="font-size: 25px;">ETKİN Kullanıcı Var</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2" style="height:110px;">
                    <div class="display">
                        <div class="number">
                            <small>Ziyaretçi Sayısı</small>
                            <h3 class="font-green-sharp">{{ $today_and_yesterday[1]['visitors'] }}</h3>
                            <small>Bugün</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2" style="height:110px;">
                    <div class="display">
                        <div class="number">
                            <small>Sayfa Gösterİmİ</small>
                            <h3 class="font-green-sharp">{{ $today_and_yesterday[1]['pageViews'] }}</h3>
                            <small>Bugün</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2" style="height:110px;">
                    <div class="display">
                        <div class="number">
                            <small>Ziyaretçi Sayısı</small>
                            <h3 class="font-green-sharp">{{ $today_and_yesterday[0]['visitors'] }}</h3>
                            <small>Dün</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2" style="height:110px;">
                    <div class="display">
                        <div class="number">
                            <small>Sayfa Gösterİmİ</small>
                            <h3 class="font-green-sharp">{{ $today_and_yesterday[0]['pageViews'] }}</h3>
                            <small>Dün</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Haftalık ZİyaretÇİ İstatİstİĞİ</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="weekly_visitors" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Haftalık Sayfa GÖsterİm İstatİstİĞİ</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="weekly_pageViews" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Bugün Zİyaret Edİlen Sayfalar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="today_visited_pages"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Tüm Zİyaret Edİlen 20 Sayfa</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="all_visited_pages"></div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 col-lg-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Hangİ Sayfalardan Gelİndİ</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="referrers"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6" style="height: 505px;">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light" style="height:100%;">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Tarayıcılar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="browsers"></div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-lg-6" style="height: 505px;">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light" style="height: 100%;">
                    <div class="portlet-title">
                        <div class="caption font-green-haze" style="width: 100%;">
                            <i class="icon-bar-chart  font-green-haze"></i>
                            <span class="caption-subject bold uppercase">Anahtar Kelimeler</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="scroll">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Anahtar Kelimi Adı</th>
                                        <th>Oturum</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($keywords as $keyword)
                                        <tr class="odd gradeX">
                                            <td>{{ $keyword['keyword'] }}</td>
                                            <td>{{ $keyword['sessions'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @else
        <h3>Google Analytics Verileri Alınamıyor!</h3>
    @endif

@endsection


@section('include_css')
    @include('backend::_layouts._table_css')
    {!! Html::style('assets/backend/global/css/page-scaffold.css') !!}
    {!! Html::style('assets/backend/global/plugins/jquery-nestable/jquery.nestable.css') !!}
@endsection

@section('include_js')
    @include('backend::_layouts._table_js')
    {!! Html::script('assets/backend/global/plugins/highcharts/js/highcharts.js') !!}
    {!! Html::script('assets/backend/global/plugins/highcharts/js/modules/exporting.js') !!}
    {!! Html::script('assets/backend/global/scripts/page-scaffold.js') !!}
    {!! Html::script('assets/backend/global/plugins/jquery-nestable/jquery.nestable.js') !!}
    {!! Html::script('assets/backend/admin/pages/scripts/ui-nestable.js') !!}
@endsection

@section('footer')
    @if ($response)
        <script type="text/javascript">

            function guncelle()
            {
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type:"POST",
                    data: { _token:token },
                    url:"{!! route('admin.analytics.active_user') !!}",
                    success: function (response) {
                        if (response[0]=="true")
                        {
                            $(".loadPost").html(response[1]);
                        }else
                        {
                            $(".loadPost").css({"font-size":"40px"});
                            $(".loadPost").html(response[1]);
                        }
                    }
                });
            }

            $(function () {
                UINestable.init();


                $('.scroll').slimScroll({
                    height: '420px'
                });

                var int=self.setInterval("guncelle()",5000);
//            $(".loadPost").

                $('#weekly_pageViews').highcharts({
                    chart: {
                        type: 'area'
                    },
                    title: {
                        text: 'Haftalık Sayfa Gösterim İstatistiği'
                    },
                    xAxis: {
                        categories: [
                            @foreach($last_week as $k=>$pageViews)
                            @if((count($last_week)-($k+1))==0) "{!! day_localize($pageViews['date']->format('l'),'en','tr') !!} ( Bugün )"
                            @elseif((count($last_week)-($k+1))==1) "{!! day_localize($pageViews['date']->format('l'),'en','tr') !!} ( Dün )"
                            @else
                        "{!! day_localize($pageViews['date']->format('l'),"en","tr") !!}"
                            @endif
                            ,
                            @endforeach
                    ]
                    },
                    yAxis: {
                        title: {
                            text: 'Sayfa Gösterim Sayısı'
                        }
                    },
                    tooltip: {
                        headerFormat: '{series.name}<br />{point.key} ',
                        pointFormat: ' günü sayfa gösterim sayısı <b>{point.y:,.0f}</b>'
                    },
                    plotOptions: {
                        area: {
                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 2,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    },
                    series: [
                        {
                            name: 'Bu Hafta',
                            data:[
                                @foreach($this_week as $pageViews)
                                {{ $pageViews['pageViews']."," }}
                                @endforeach
                                ]
                        },
                        {
                            name: 'Geçen Hafta',
                            data:[
                                @foreach($last_week as $pageViews)
                                {{ $pageViews['pageViews']."," }}
                                @endforeach
                                ]
                        }
                    ]
                });

                $('#weekly_visitors').highcharts({
                    chart: {
                        type: 'area'
                    },
                    title: {
                        text: 'Haftalık Ziyaretçi İstatistiği'
                    },
                    xAxis: {
                        categories: [
                            @foreach($last_week as $k=>$visitors)
                            @if((count($last_week)-($k+1))==0) "{!! day_localize($visitors['date']->format('l'),'en','tr') !!} ( Bugün )"
                            @elseif((count($last_week)-($k+1))==1) "{!! day_localize($visitors['date']->format('l'),'en','tr') !!} ( Dün )"
                            @else
                        "{!! day_localize($visitors['date']->format('l'),"en","tr") !!}"
                            @endif
                            ,
                            @endforeach
                    ]
                    },
                    yAxis: {
                        title: {
                            text: 'Ziyaretçi Sayısı'
                        }
                    },
                    tooltip: {
                        headerFormat: '{series.name}<br />{point.key} ',
                        pointFormat: ' günü ziyaretçi sayısı <b>{point.y:,.0f}</b>'
                    },
                    plotOptions: {
                        area: {
                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 2,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    },
                    series: [
                        {
                            name: 'Bu Hafta',
                            data:[
                                @foreach($this_week as $visitors)
                                {{ $visitors['visitors']."," }}
                                @endforeach
                                ]
                        },
                        {
                            name: 'Geçen Hafta',
                            data:[
                                @foreach($last_week as $visitors)
                                {{ $visitors['visitors']."," }}
                                @endforeach
                                ]
                        }
                    ]
                });

                var all_visited_pages_categories= [
                    @foreach($all_visited_pages as $k=>$pages)
                    @if($k!=0) , @endif
                "{!! $pages['url'] !!}"
                    @endforeach
                    ];

                var today_visited_pages_categories = [
                    @foreach($today_visited_pages as $k=>$pages)
                    @if($k!=0) , @endif
                "{!! $pages['url'] !!}"
                    @endforeach
                    ];

                $('#today_visited_pages').highcharts({
                    chart: {
                        type: 'bar',
                        height: 650
                    },
                    title: {
                        text: 'Bugün Ziyaret Edilen Sayfalar'
                    },
                    xAxis: [{
                        categories: today_visited_pages_categories
                    }],
                    yAxis:[
                        {title: {
                            text: null
                        }
                        }
                    ],
                    tooltip: {
                        formatter: function () {
                            return this.point.category +' Sayfa Ziyaret Sayısı:' +  this.point.y;
                        }
                    },
                    plotOptions: {
                        series: {
                            pointWidth: 20,
                            pointPadding: 0,
                            groupPadding: 0
                        }
                    },
                    series: [{
                        name: 'Bugün',
                        data: [@foreach($today_visited_pages as $k=>$pages)
                            @if($k!=0) , @endif
                        {{ $pages['pageViews'] }}
                            @endforeach]
                    }]
                });

                $('#all_visited_pages').highcharts({
                    chart: {
                        type: 'bar',
                        height: 650
                    },
                    title: {
                        text: 'Tüm Ziyaret Edilen Sayfalar'
                    },
                    xAxis: [{
                        categories: all_visited_pages_categories
                    }],
                    yAxis:[
                        {title: {
                            text: null
                        }
                        }
                    ],
                    tooltip: {
                        formatter: function () {
                            return this.point.category +' Sayfa Ziyaret Sayısı:' +  this.point.y;
                        }
                    },
                    plotOptions: {
                        series: {
                            pointWidth: 20,
                            pointPadding: 0,
                            groupPadding: 0
                        }
                    },
                    series: [{
                        name: 'Tümü',
                        data: [@foreach($all_visited_pages as $k=>$pages)
                            @if($k!=0) , @endif
                        {{ $pages['pageViews'] }}
                            @endforeach]
                    }]
                });


                $('#referrers').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Hangi Sayfalardan Gelindi'
                    },
                    xAxis: {
                        type: 'category',
                        labels: {
                            rotation: -45,
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Sayfa Gösterim Sayısı'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Sayfa Gösterim Sayısı {point.y}'
                    },
                    series: [{
                        name: 'Erişim Sayısı',
                        data: [
                            @foreach($referrers as $k=>$referrer)
                            @if($k!=0) , @endif
                            ["{!! $referrer['url'] !!}",{!! $referrer['pageViews'] !!}]
                @endforeach
            ],
                dataLabels: {
                    enabled: true,
                            rotation: 0,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                        fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
            });

            $('#browsers').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Tarayıcılar',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 40
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white',
                                textShadow: '0px 1px 2px black'
                            }
                        },
                        startAngle: -90,
                        endAngle: 90,
                        center: ['50%', '75%']
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Tarayıcı Sayfa Gösterimi',
                    innerSize: '50%',
                    data: [
                        @foreach($browsers as $k=>$browser)
                        ["{!! $browser['browser'] !!}",{!! $browser['sessions'] !!}],
                @endforeach
                {
                name: null,
                        y: 0.2,
                    dataLabels: {
                enabled: false
            }
            }
            ]
            }]
            });

            });
        </script>

    @endif
@endsection