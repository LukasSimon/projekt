<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2 align="center">Grafy</h2>

            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">


            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Tržba za jednotlivé dni</h2>
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Dátum', 'Tržba'],
                                        <?php
                                        foreach ($cesta as $cesta) {
                                            echo "[ '$cesta->datum', $cesta->cena],";
                                        }
                                        ?>
                                    ]);

                                    var options = {
                                        title: 'Tržba za jednotlivé dni',
                                        curveType: 'function',
                                        legend: { position: 'bottom' }
                                    };

                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="curve_chart" style="width: 700px; height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Počet služieb v jednoltivých dňoch</h2>
                    </div>
                    <div class="panel-body">
                        <div id="morris-area-chart">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Meno', 'Počet služieb'],
                                        <?php
                                        foreach ($sluzby as $sluzby) {
                                            echo "[ '$sluzby->datum', $sluzby->pocet],";
                                        }
                                        ?>
                                    ]);
                                    var options = {

                                    };
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <center>
                                <div id="piechart" style="width: 900px; height: 500px;"></div></center>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Rozdelenie vodičov podľa tržby</h2>
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Meno', 'Tžba'],
                                        <?php
                                        foreach ($vodici as $vodici) {
                                            echo "[ '$vodici->meno $vodici->priezvisko', $vodici->cena],";
                                        }
                                        ?>
                                    ]);

                                    var options = {
                                        title: 'Tržby',
                                        pieHole: 0.4,
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="donutchart" style="width: 750px; height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Počet objednávok na danú adresu zákazníka</h2>
                    </div>
                    <div class="panel-body">
                        <div id="morris-line-chart">
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Počet', 'Počet'],
                                        <?php
                                        foreach ($adresy as $adresy) {
                                            echo "[ '$adresy->oobec $adresy->oulica', $adresy->pocet],";
                                        }
                                        ?>
                                    ]);

                                    var options = {
                                        title: 'Počet ',
                                        hAxis: {title: 'Dni',  titleTextStyle: {color: '#333'}},
                                        vAxis: {minValue: 0}
                                    };

                                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div id="chart_div" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>