


      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a> Edited by Andy.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- AdminLTE App -->

<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
$(".nav-change").click(function(){
    $(".nav-change").toggleClass("active");
  });









$('.table-klik tr').hover(function() {
      $(this).addClass("kustomTable");
}, function(){
  $(this).removeClass("kustomTable");
});



// fungsi untuk menentukan harga dari setiap checkbox yang di check
// algoritma lama
function list_harga(hrg){
  switch(hrg){
    case 1:
      harga += 15000;
      break;

    case 2:
      harga += 20000;
      break;

    case 3:
      harga += 20000;
      break;

    case 4:
      harga += 35000;
      break;

    case 5:
      harga += 20000;
      break;

    case 6:
      harga += 20000;
      break;

    case 7:
      harga += 25000;
      break;

    case 8:
      harga += 30000;
      break;

    default:

  }
}

// end of algoritma lama



// fungsi untuk mengkalkulasi total harga
let total_harga = 0;
let harga = 0;
let list_qty = [];
let list_qty_value = [];

function calc_total_harga(){
    $(".paket_check").each(function(){
      if(this.checked){
        // ---------- algoritma lama ---------
        // harus di konvert ke int dulu baru bisa
  // list_harga(parseInt($(this).val()));

          // --------- end algoritma lama 
        // masukkan kedalam array yang nanti nya akan di kalikan dengan penjualan
        list_qty.push(parseInt($(this).val()));

        // jadi this val itu berisikan value 1,2,3,4 seterus nya agar menjadi patokan css paket1qty atau paket2qty
        var isi_dari_qty = $(".paket"+parseInt($(this).val())+"qty").find(":selected").text();
        list_qty_value.push(isi_dari_qty);

        // setelah itu kalikan harga dengan quantity
        let harga_temp = parseInt($(this).val());
        // jadikan harga sebenarnya,dikarenakan masih berisikan value 1,2,3,4,5
        switch(harga_temp){
          case 1:
            harga_temp = 15000;
            break;

          case 2:
            harga_temp = 20000;
            break;

          case 3:
            harga_temp = 20000;
            break;

          case 4:
            harga_temp = 35000;
            break;

          case 5:
            harga_temp = 20000;
            break;

          case 6:
            harga_temp = 20000;
            break;

          case 7:
            harga_temp = 25000;
            break;

          case 8:
            harga_temp = 30000;
            break;

          default:

        }

        // kalkulasi total harga
        harga = harga+harga_temp* isi_dari_qty;
     
        }
    });

      // console.log(list_qty_value);
    
    var penjualan = $(".nominal").val();
      penjualan = penjualan.replace(".",'');
    // console.log(list_qty);

    // mengubah menjadi string ke integer agar bisa di jumlahkan
    penjualan = parseInt(penjualan);
    harga = parseInt(harga);
    $(".total_harga").html("<h1>"+new Intl.NumberFormat(['ban', 'id']).format(harga)+"</h1>");
}




$(document).ready(function() {
  
  //Date picker
$('#datepicker').datepicker({
  autoclose: true
});

$('#datepicker1').datepicker({ 
        format: 'yyyy-mm-dd'
    });
$('#datepicker2').datepicker({ 
        format: 'yyyy-mm-dd'
    });
  // fungsi untuk setiap checkbox yang di check
  $(".paket_check").on('change', function(event){
    // reset ulang variable
     list_qty = [];
     list_qty_value = [];
     harga = 0;
      calc_total_harga();
      console.log(harga);
  });

  $(".tambah_transaksi_keluar").click(function(){
    var data = $(".form_tambah_transaksi_keluar").serialize();
    // alert(data); return false;
    $.ajax({
      type: 'POST',
      url: 'proses_transaksi_keluar.php',
      data: data,
      success: function(){
        location.reload();
      }
    });
  });

 
  
  // untuk menyambung 00 jika tidak pake plus maka akan keluar satu digit angka saja
  $(".no_kartu").attr("value", "00"+<?php $app->set_no_kartu(); ?>);

  // untuk update box kastamer sebelumnya
    $(".kastamer_sebelumnya").click(hapus_disabled);
    function hapus_disabled(){
      if(this.checked){
        $(".select_kastamer_sebelumnya").prop("disabled", false);
        $(".form_kastamer_sebelumnya").toggleClass('bg-opacity-25','bg-opacity-100');
      } else {  
        $(".select_kastamer_sebelumnya").prop("disabled", true);
        $(".form_kastamer_sebelumnya").toggleClass('bg-opacity-25','bg-opacity-25');
      }
    }

  // untuk update input kembalian
  $(".nominal").keyup(function(){
    var penjualan = $(this).val();
    $('.kembalian').attr("value", new Intl.NumberFormat(['ban', 'id']).format(penjualan-harga));
  }).keyup();
    
  //untuk update select dari kastamer sebelum nya 
  $(".select_kastamer_sebelumnya").on('change', function(event){
    // mencari value dari select kastamer
    var select_kastamer_no_kartu = $(".select_kastamer_sebelumnya").find(":selected").text();
    var select_kastamer_nama = $(".select_kastamer_sebelumnya").find(":selected").text();
    // kita pisah value nya dari zaki - 001 menjadi 001 saja
    select_kastamer_no_kartu = select_kastamer_no_kartu.split("-").pop();
    select_kastamer_nama = select_kastamer_nama.split("-")[0];
    

    // auto ubah nilai dari box no kartu sama nama
    //pertama dari no kartu , karna sudah di hapus nama nya
    $(".no_kartu").attr("value", select_kastamer_no_kartu);
    $(".nama").attr("value", select_kastamer_nama);
    });


    if($("div").hasClass("lihat_transaksi_true")){
      $(".nav-change").removeClass("active");
      $(".lihat_transaksi").addClass("active");
        }

    if($("div").hasClass("tambah_transaksi_true")){
      $(".nav-change").removeClass("active");
      $(".tambah_transaksi").addClass("active");
        }
          
    if($("div").hasClass("transaksi_keluar_true")){
      $(".nav-change").removeClass("active");
      $(".transaksi_keluar").addClass("active");
        }

      
    if($("div").hasClass("data_kastamer_true")){
      $(".nav-change").removeClass("active");
      $(".data_kastamer").addClass("active");
        }
      
    if($("div").hasClass("laporan_true")){
      $(".nav-change").removeClass("active");
      $(".laporan").addClass("active");
        }

    $(".logout").click(function(){
      if(confirm('Apakah anda yakin ingin keluar?')){
        location.replace('logout.php');
      } else {

      }    
    });

    $(".edit_transaksi").click(function(){
      if(confirm('Apakah anda yakin ingin edit?')){
        // dapetin value dari td pertama yaitu id yang akan di lempar ke fungsi php
        var value=$(this).closest('tr').children('td:first').text();
        location.replace('edit.php?id='+value);
      } else {

      }
     });

     $(".hapus_transaksi").click(function(){
      if(confirm('Apakah anda yakin ingin menghapus?')){
        // dapetin value dari td pertama yaitu id yang akan di lempar ke fungsi php
        var value=$(this).closest('tr').children('td:first').text();
        location.replace('hapus.php?id='+value);
      } else {

      }
     });

    });


// buat chart
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Lipat /3kg', 'Lipat /6kg', 'Strika /3kg', 'Strika /6kg', 'Selimut', 'Bed Cover Single', 'Bed Cover Queen', 'Bed Cover KING'],
        datasets: [{
            label: 'Penjualan',

            // data nya di ambil dari database
            data: [<?php $app->hitung_produk_terlaris('Cuci - Kering - Lipat /3kg') ?>,
                   <?php $app->hitung_produk_terlaris('Cuci - Kering - Lipat /6kg') ?>, 
                   <?php $app->hitung_produk_terlaris('Cuci - Kering - Strika /3kg') ?>, 
                   <?php $app->hitung_produk_terlaris('Cuci - Kering - Strika /6kg') ?>, 
                   <?php $app->hitung_produk_terlaris('Selimut') ?>, 
                   <?php $app->hitung_produk_terlaris('Bed Cover Single 90cm - 120 cm') ?>,
                   <?php $app->hitung_produk_terlaris('Bed Cover Queen - 120cm - 160 cm') ?>,
                   <?php $app->hitung_produk_terlaris('Bed Cover KING - 160cm - 200 cm MAX') ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});




</script>

<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
