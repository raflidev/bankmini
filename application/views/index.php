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
                    <span>Total Transaksi (Juta Rupiah)</span>
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
                                        1,
                                        3,
                                        4,
                                        7,
                                        3,
                                        4,
                                        2,
                                        3,
                                        4,
                                        3,
                                        4,
                                        7

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