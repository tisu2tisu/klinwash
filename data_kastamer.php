<?php session_start();
require 'header.php';
$app->cek_login(); 

?>
<div class="data_kastamer_true"></div>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penjualan </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Dibuat</th>
                      <th>No Kartu</th>
                      <th>Nama</th>
                      <th>No HP</th>
                      <th>Hitung Cap</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $app->tampilkan_data_kastamer(); ?>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


<?php
include 'footer.php';
?>