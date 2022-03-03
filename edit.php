<?php session_start();
require 'header.php';

?>
<div class="lihat_transaksi_true"></div>

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
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Paket</th>
                      <th>Quantity</th>
                      <th>No Kartu</th>
                      <th>No Bon</th>
                      <th>Total Harga</th>
                      <th>Penjualan</th>
                      <th>Kembalian</th>
                      <th>No HP</th>
                      <th>Wash</th>
                      <th>Dry</th>
                      <th>Koin Terpakai</th>
                      <th>Catatan</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                      <th>Tanggal di ambil </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $app->edit_data_transaksi($_GET['id']); ?>
                    
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


<?php
include 'footer.php';
?>
