<?php session_start();
require 'header.php';

?>
<div class="laporan_true"></div>
<div class="row">
    <div class="col-3">
        <form method="post" class="form_laporan"> 
        <div class="form-group">
            <label>Tanggal Awal:</label>

            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <input type="text" name="dari_tanggal" class="form-control float-right" id="datepicker1">
            </div>
            <!-- /.input group -->
        </div>
    </div>
    
    <div class="col-3">
        <div class="form-group">
            <label>Tanggal Akhir:</label>

            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <input type="text" name="sampai_tanggal" class="form-control float-right" id="datepicker2">
            
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <div class="col-2">
    <br>
    <input type="submit" name="submit" class="btn btn-block btn-primary filter_laporan">FILTER</button>
    </div>
</form>
</div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Tanggal</th>
                      <th>No bon</th>
                      <th>Transaksi</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                  <?php   
                    if(isset($_POST['submit'])){
                        $app->tampilkan_laporan();
                    }
                    ?>
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
<?php
include 'footer.php';
?>
