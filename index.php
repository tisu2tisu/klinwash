<?php
session_start();
include_once 'header.php';
$app->cek_login();
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0">Selamat Datang !</h1>
  </div><!-- /.col -->
 

<!-- /.content-header -->

<!-- Main content -->
<div class="content">
<div class="container-fluid">
<h2> Statistik Keuangan </h2>
<div class="row">
  <div class="col-lg-3">

      <!-- total Penjualan -->
      <div class="small-box bg-light">
        <div class="inner">
          <h3><?php $app->hitung_total_penjualan(); ?> </h3>

          <p>Total Penjualan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">
        <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal"> More Info</button>
                <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>


      <!-- total Penjualan -->
      <div class="small-box bg-light">
        <div class="inner">
          <h3><?php $app->hitung_total_keuntungan(); ?></h3>

          <p>Total Keuntungan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">
        <br>
        </a>
      </div>
  </div>

  <!-- /.col-md-6 -->
  <div class="col-lg-3">
    <!-- total Penjualan -->
    <div class="small-box bg-light">
      <div class="inner">
        <h3><?php $app->hitung_total_kembalian_output(); ?></h3>

        <p>Total Pengeluaran</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">
      <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal1"> More Info</button>
                <i class="fas fa-arrow-circle-right"></i> 
      </a>
    </div>
    <!-- total Penjualan -->
    <div class="small-box bg-light">
      <div class="inner">
        <h3><?php $app->hitung_total_transaksi(); ?></h3>

        <p>Jumlah Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">
      <br>
      </a>
    </div>
  <!-- /.row -->

  <!-- total Penjualan -->
  

  </div>
  <div class="col-lg-4">
  <h2> Produk Terlaris </h2>

<div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
 

 <canvas id="myChart" width="400" height="400"></canvas>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Total Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- body modal  -->
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Tanggal</th>
                      <th>Penjualan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $app->tampilkan_info_penjualan(); ?>
                  </tbody>
                </table>
              </div>
    </div>
  </div>
</div>




</div>
  <!-- selesai rata rata transaksi -->
  
</div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Kembalian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- body modal  -->
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Tanggal</th>
                      <th>Penjualan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $app->tampilkan_total_pengeluaran(); ?>
                  </tbody>
                </table>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Total Keuntungan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- body modal  -->
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Tanggal</th>
                      <th>Penjualan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $app->tampilkan_total_pengeluaran(); ?>
                  </tbody>
                </table>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Jumlah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- body modal  -->
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Tanggal</th>
                      <th>Penjualan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $app->tampilkan_total_pengeluaran(); ?>
                  </tbody>
                </table>
    </div>
  </div>
</div>
   </div>
  </div>
</div>
<?php
include 'footer.php';
?>
