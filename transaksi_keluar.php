<?php session_start();
require 'header.php';

?>
<div class="transaksi_keluar_true"></div>

       

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengeluaran</h3>
                <button type="button" class="btn btn-block btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right; width: 60px">+</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Catatan</th>
                      <th>Total Pengeluaran</th>
                      <th>tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php $app->tampilkan_transaksi_keluar(); ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>

   

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <!-- body modal  -->
      <div class="card-body">
      <form type="post" class="form_tambah_transaksi_keluar">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Catatan</label>
        <div class="col-sm-10">
            <input type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan">
        </div>
        
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Total Pengeluaran</label>
        <div class="col-sm-10">
            <input type="text" name="total_pengeluaran" class="form-control" id="total_pengeluaran" placeholder="Total Pengeluaran">
        </div>
        
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Tanggal">
        </div>

    </div>
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="tambah_transaksi_keluar btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>








<?php
include 'footer.php';
?>
