<?php session_start();
require 'header.php';
$app->cek_login(); 

?>
<div class="tambah_transaksi_true"></div>
<div class="row">
<div class="col-lg-6">
            <div class="card card-success card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Penjualan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Pengeluaran</a>
                  </li>

                </ul>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                  <form method="post">
                  <div class="custom-control custom-checkbox bg-dark bg-opacity-25 p-2 mb-3 form_kastamer_sebelumnya">
                    <div class="form-check">
                      <input class="form-check-input kastamer_sebelumnya" value="kastamer_sebelumnya" type="checkbox">
                      <!-- untuk javascript nya paket label -->
                      <label class="form-check-label">Kastamer Sebelumnya?</label>
                      <br>
                      <select name="paket1qty" class="form-select select_kastamer_sebelumnya" aria-label="Default select example" disabled>
                        <option value="1" disabled="" selected="">List Kastamer</option>
                        <?php $app->show_kastamer(); ?>
                    </select>
                    </div>
                  </div>

                  <span class="float-left badge bg-danger pt-3 pl-3 pr-3 pb-2" style="width: 40%;">  <h6><b>No Kartu</b></h6><input type="text" name="no_kartu" class="form-control no_kartu" value=""></span>

                  <span class="float-right badge bg-warning pt-3 pl-3 pr-3 pb-2" style="width: 40%;">  <h6><b>No Bon</b></h6><input type="text" name="no_bon" class="form-control"></span>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih Paket : </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body list-penjualan  " style="display: block;">
                <?php $app->show_data_paket(); ?>
              </div>
              <!-- /.card-body -->
            </div>
                    
            </div>

           




                </div>
              </div>
      </div> <!-- row end -->
<div class="col-lg-4">
<label class="col-form-label"></i> Total Harga : <div class="total_harga"></div></label>
                    <div class="form-group">
                      <label class="col-form-label" for="inputSuccess"></i> Nama</label>
                      <input type="text" name="nama" class="form-control nama" required>
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="inputSuccess"></i> Nominal Penjualan</label>
                      <input type="text" name="nominal_penjualan"  class="form-control form-penjualan text-success nominal" id="inputSuccess" placeholder="Rp" >
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="inputSuccess"></i> Kembalian</label>
                      <input type="text" name="kembalian" class="form-control form-kembalian kembalian text-danger" id="inputSuccess" placeholder="Rp">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="inputSuccess"></i> No HP</label>
                      <input type="text" name="no_hp" class="form-control" placeholder="Rp" >
                    </div>

                      <div class="custom-control custom-checkbox border solid">
                        <label class="col-form-label text-center" for="inputSuccess"></i> Wash </label>
                        <div class="form-check">
                          <br>
                          <input class="form-check-input" name="wash[]" type="checkbox" value="Mesin 1">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 1 </label><br>
                          <input class="form-check-input" name="wash[]" type="checkbox" value="Mesin 2">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 2 </label><br>
                          <input class="form-check-input" name="wash[]" type="checkbox" value="Mesin 3">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 3 </label><br>
                        </div>
                      </div>
                      <br>
                      <div class="custom-control custom-checkbox border solid">
                        <label class="col-form-label text-center" for="inputSuccess"></i> Dryer</label>
                        <div class="form-check">
                          <br>
                          <input   class="form-check-input" name="dry[]" type="checkbox" value="Mesin 1">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 1 </label><br>
                          <input class="form-check-input" name="dry[]" type="checkbox" value="Mesin 2">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 2 </label><br>
                          <input class="form-check-input" name="dry[]" type="checkbox" value="Mesin 3">
                          <label class="col-form-label" for="inputSuccess"></i> Mesin 3 </label><br>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="inputSuccess"></i>Koin Terpakai</label>
                        <input type="text" name="koin_terpakai" class="form-control" id="inputSuccess" >
                      </div>

                    <label class="col-form-label" for="inputSuccess"></i> Catatan</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-clipboard"></i></span>
                      </div>
                      <input type="text" name="catatan" class="form-control" placeholder="-">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Transaksi:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" name="tanggal" class="form-control float-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-block btn-success" value="Lunas">
                      <input type="submit" name="submit" class="btn btn-block btn-danger" value="Belum Lunas">
                    </div>
</form>
</div>
<?php 
if(isset($_POST['submit'])){
  if($app->simpan_data_penjualan()){
    echo "<script>alert('data berhasil di simpan');</script>";
    $app->save_data_kastamer();
       }
  }
 ?>



<?php
include 'footer.php';
?>
