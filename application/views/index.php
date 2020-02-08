<div class="body-content">
    <div class="container">
        <div class="sub">
            Overview
        </div>
        <div class="row">
            <div class="col-md-4 box  m-0">
                <div>User</div>
                <span><?= $countUser ?></span>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 box">
                <div>Transaksi</div>
                <span><?= $countTransaksi ?></span>
            </div>
        </div>
        <div class="sub">
            Realtime
        </div>
        <div class="row">
            <div class="col-md-12  p-0">
                <div class="box-l">
                    <span>Transaksi Perbulan</span>
                    <div>
                        <canvas id="canvas" width="829px" height="250px"></canvas>
                    </div>
                    <script>
                        var MONTHS = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];
                        var config = {
                            type: 'line',
                            data: {
                                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'],
                                datasets: [{
                                    label: 'Total',
                                    borderColor: '#707070',
                                    borderWidth: 2,
                                    backgroundColor: '#29294D',
                                    pointBorderWidth: 8,
                                    data: [
                                        <?php foreach($laporan as $row) :
                                        echo $row->jumlah_bulanan.","; 
                                        endforeach
                                            ?>                               
                                    ],
                                    fill: false,
                                }]
                            },
                            options: {
                                responsive: true,

                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function (tooltipItem) {
                                            return tooltipItem.yLabel;
                                        }
                                    }
                                },
                                hover: {
                                    mode: 'nearest',
                                    intersect: true
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        gridLines: {
                                            display: true,
                                            color: "black"
                                        },

                                    }],
                                    yAxes: [{
                                        gridLines: {
                                            display: false
                                        },
                                        display: true,
                                        scaleLabel: {
                                            display: true
                                        }
                                    }]
                                }
                            }
                        };

                        window.onload = function () {
                            var ctx = document.getElementById('canvas').getContext('2d');
                            window.myLine = new Chart(ctx, config);
                        };
                    </script>
                </div>
            </div>
        </div>

    </div>
</div>