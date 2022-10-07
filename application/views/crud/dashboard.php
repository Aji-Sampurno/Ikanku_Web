<?php
$getUser = $this->session->userdata('session_user');
$getGrup = $this->session->userdata('session_grup');

$d1=strtotime("-1 day");
$d2=strtotime("-2 day");
$d3=strtotime("-3 day");
$d4=strtotime("-4 day");
$d5=strtotime("-5 day");
$d6=strtotime("-6 day");

$tgl1=date('d');
$tgl2=date('d', $d1);
$tgl3=date('d', $d2);
$tgl4=date('d', $d3);
$tgl5=date('d', $d4);
$tgl6=date('d', $d5);
$tgl7=date('d', $d6);
$bulan=date('m');

$produklaporan = $this->M_Ikanku->countProdukLaporan()->row_array();
$produkstatistik1 = $this->M_Ikanku->countProdukStatistik1()->row_array();
$produkstatistik2 = $this->M_Ikanku->countProdukStatistik2()->row_array();
$produkstatistik3 = $this->M_Ikanku->countProdukStatistik3()->row_array();
$produkstatistik4 = $this->M_Ikanku->countProdukStatistik4()->row_array();
$produkstatistik5 = $this->M_Ikanku->countProdukStatistik5()->row_array();
$produkstatistik6 = $this->M_Ikanku->countProdukStatistik6()->row_array();
$produkstatistik7 = $this->M_Ikanku->countProdukStatistik7()->row_array();
$edukasi = $this->M_Ikanku->countEdukasi()->row_array();
?>

<script>
    window.onload = function () 
    {
        // Bar Chart Example
        var myBarChart = new Chart("myBarChart", {
        type: 'bar',
        data: {
            labels: [<?= $tgl7?>, <?= $tgl6?>, <?= $tgl5?>, <?= $tgl4?>, <?= $tgl3?>, <?= $tgl2?>, <?= $tgl1?>],
            datasets: [{
            label: "Revenue",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: [ <?= $produkstatistik7['total']?>,
            <?= $produkstatistik6['total']?>,
            <?= $produkstatistik5['total']?>,
            <?= $produkstatistik4['total']?>,
            <?= $produkstatistik3['total']?>,
            <?= $produkstatistik2['total']?>,
            <?= $produkstatistik1['total']?>,],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
            },
            scales: {
            xAxes: [{
                time: {
                unit: 'month'
                },
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 12
                },
                maxBarThickness: 25,
            }],
            yAxes: [{
                ticks: {
                min: 0,
                //max: 100,
                //maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return number_format(value);
                }
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return number_format(tooltipItem.yLabel);
                }
            }
            },
        }
        });
        myBarChart.render();
    }
</script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Produk Dilaporkan -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow mb-4">
            <!-- Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="h9 font-weight-bold text-primary text-uppercase mb-1">Produk di Laporkan</div>
                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="<?php echo base_url('Ikanku/produk');?>">Lihat Detail</a>
            </div>
            <!-- Body -->
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php if ($produklaporan['total']==null) 
                            {echo '0';} else {
                                echo $produklaporan['total'];
                            }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class='fas fa-exclamation-circle fa-2x text-gray-300'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edukasi -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow mb-4">
            <!-- Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="h9 font-weight-bold text-primary text-uppercase mb-1">Edukasi</div>
                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="<?php echo base_url('Ikanku/edukasi');?>">Lihat Detail</a>
            </div>
            <!-- Body -->
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                if ($edukasi['total']==null) {echo '0';} 
                                else {echo $edukasi['total'];
                            }?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class='fas fa-book fa-2x text-gray-300'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->

<div class="row">

    <!-- Grafik Padi -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="h9 font-weight-bold text-primary text-uppercase mb-1">Statistik Penjualan</div>
                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href='#'>Lihat Detail</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
</div>