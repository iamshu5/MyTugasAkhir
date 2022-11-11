@include('layouts.admin-layouts.header', ['title' => 'Dashboard'])

<section class="dashboard-admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('admin/alumni/data-alumni') }}" class=" px-3 card border-left-success shadow h-100 py-2 text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    TOTAL SISWA ALUMNI</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $alumni }} - Siswa Alumni</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate fa-2x text-gray-500"></i>
                                </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('admin/guru/data-guru') }}" class="card border-left-info shadow h-100 py-2 text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    TOTAL PENGAJAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $guru}} - Pengajar</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chalkboard-teacher fa-2x text-gray-500"></i>
                                </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('admin/kontak/data-kontak') }}" class="card border-left-info shadow h-100 py-2 text-decoration-none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    TOTAL KONTAK MASUKAN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kontak}} - Kontak Masukan</div>
                            </div>
                            <div class="col-auto">
                                {{-- <i class="fas fa-chalkboard-teacher fa-2x text-gray-500"></i> --}}
                                </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- CHART TOTAL ALUMNI --}}
            <div class="panel mb-3 col-md-6">
                <div id="chartTahun"></div>
            </div>

            <div class="panel col-md-6">
                <div id="chartSMA"></div>
            </div>
        </div>
    </div>
</section> {{-- End Dashboard Admin --}}

@include('layouts.admin-layouts.footer')

<script>
    Highcharts.chart('chartTahun', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Data Tahun Lulus Siswa Alumni '
    },
    subtitle: {
        text: 'Jumlah Siswa: ' +
            '<a href="https://www.ssb.no/en/statbank/table/08940/" ' +
            'target="_blank"></a>'
    },
    xAxis: {
            categories: {!! json_encode($categories) !!},
            crosshair: true
    },
    yAxis: {
        title: {
            useHTML: true,
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'TOTAL',
        data: {!! json_encode($data) !!},

    }]
});
</script>

<script>
Highcharts.chart('chartSMA', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'JUMLAH SISWA MASUK SMA & SMK'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f}%'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'SMA',
            y: {{ $data_sekolah['SMA'] }},
        }, {
            name: 'SMK',
            y: {{ $data_sekolah['SMK'] }}
        },  {
            name: 'MA',
            y: {{ $data_sekolah['MA'] }}
        }, {
            name: 'MAK',
            y: {{ $data_sekolah['MAK'] }}
        }, {
            name: 'PONDOK PESANTREN',
            y: {{ $data_sekolah['PONDOK_PESANTREN'] }}
        }]
    }]
});
</script>

// {{-- <script>
//     Highcharts.chart('chartSMA', {
//     chart: {
//         type: 'pie'
//     },
//     title: {
//         text: 'Data Siswa Alumni Masuk SMA dan SMK '
//     },
//     subtitle: {
//         text: 'Jumlah Siswa: ' +
//             '<a href="https://www.ssb.no/en/statbank/table/08940/" ' +
//             'target="_blank"></a>'
//     },
//     xAxis: {
//             categories: {!! json_encode($categories_sekolah) !!},
//             crosshair: true
//     },
//     yAxis: {
//         title: {
//             useHTML: true,
//             text: 'Jumlah'
//         }
//     },
//     tooltip: {
//         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//             '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
//         footerFormat: '</table>',
//         shared: true,
//         useHTML: true
//     },
//     plotOptions: {
//         column: {
//             pointPadding: 0.2,
//             borderWidth: 0
//         }
//     },
//     series: [{
//         name: 'TOTAL SEKOLAH LANJUTAN',
//         data: {!! json_encode($data_sekolah) !!}

//     }]
// });
// </script> --}}
