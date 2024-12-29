@extends('admin.layouts.index')
@section('content')
    <div class="content sm-gutter">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid padding-25 sm-padding-10">
            <div class="row">
                <div class="col-lg-3 col-xl-3 col-xlg-2 ">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET widget_progressTileFlat-->
                            <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                                <div class="full-height d-flex flex-column">
                                    <div class="card-header ">
                                        <div class="card-title">
                                            <span class="font-montserrat fs-11 all-caps">Users </span>
                                        </div>
                                    </div>
                                    <div class="p-l-20">
                                        <h3 class="no-margin p-b-5">{{ $users }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-xlg-2 ">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET widget_progressTileFlat-->
                            <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                                <div class="full-height d-flex flex-column">
                                    <div class="card-header ">
                                        <div class="card-title">
                                            <span class="font-montserrat fs-11 all-caps">Quiz Attempts </span>
                                        </div>
                                    </div>
                                    <div class="p-l-20">
                                        <h3 class="no-margin p-b-5">
                                            {{ $quizes }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-xlg-2 ">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET widget_progressTileFlat-->
                            <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                                <div class="full-height d-flex flex-column">
                                    <div class="card-header ">
                                        <div class="card-title">
                                            <span class="font-montserrat fs-11 all-caps">Translations</span>
                                        </div>
                                    </div>
                                    <div class="p-l-20">
                                        <h3 class="no-margin p-b-5">{{ $translations }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 col-xlg-2 ">
                    <div class="row">
                        <div class="col-md-12 m-b-10">
                            <!-- START WIDGET widget_progressTileFlat-->
                            <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                                <div class="full-height d-flex flex-column">
                                    <div class="card-header ">
                                        <div class="card-title">
                                            <span class="font-montserrat fs-11 all-caps">Languages</span>
                                        </div>
                                    </div>
                                    <div class="p-l-20">
                                        <h3 class="no-margin p-b-5">{{ $languages }}</h3>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Translations Per Month</h4>
                    <canvas id="translationYear"></canvas>
                </div>
            </div>
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
@endsection
@section('custom_script')
    <script>
        var options = {
            indexAxis: 'x',
            elements: {
                bar: {
                    borderWidth: 4,
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    min: 0,
                }
            },
        };

        $(document).ready(function() {

            new Chart(
                document.getElementById('translationYear'), {
                    type: 'bar',
                    data: {
                        labels: [
                            'January',
                            'Feburary',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                        ],
                        datasets: [{
                            data: {!! json_encode($monthlyCounts) !!},
                            borderColor: "rgb(14, 143, 232)",
                            backgroundColor: "rgb(154, 208, 245)",
                            maxBarThickness: "50",
                            fillColor: "rgb(154, 208, 245)"
                        }, ]
                    },
                    options: options,
                }
            );
        });
    </script>
@endsection
