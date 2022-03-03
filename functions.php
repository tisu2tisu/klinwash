<?php


class klinwash{
  private $db; // untuk handle database
  private $e; // untuk handle error
  private $data_paket = array();


  function __construct($con){
    $this->db = $con;
  }

  

  // fungsi ini untuk mendefinisikan paket paket yang ada di klin wash
  public function get_paket($id){
    switch ($id) {
      case '1':
        $this->data_paket['nama_paket'][1] = "Cuci - Kering - Lipat /3kg";
        $this->data_paket['harga_paket'][1] = "15000";
        break;

      case '2':
        $this->data_paket['nama_paket'][2] = "Cuci - Kering - Lipat /6kg";
        $this->data_paket['harga_paket'][2] = "20000";
        break;

      case '3':
        $this->data_paket['nama_paket'][3] = "Cuci - Kering - Strika /3kg";
        $this->data_paket['harga_paket'][3] = "20000";
        break;

      case '4':
        $this->data_paket['nama_paket'][4] = "Cuci - Kering - Strika /6kg";
        $this->data_paket['harga_paket'][4] = "35000";
        break;

      case '5':
        $this->data_paket['nama_paket'][5] = "Selimut";
        $this->data_paket['harga_paket'][5] = "20000";
        break;

      case '6':
        $this->data_paket['nama_paket'][6] = "Bed Cover Single 90cm - 120 cm ";
        $this->data_paket['harga_paket'][6] = "20000";
        break;

      case '7':
        $this->data_paket['nama_paket'][7] = "Bed Cover Queen - 120cm - 160 cm ";
        $this->data_paket['harga_paket'][7] = "25000";
        break;

      case '8':
        $this->data_paket['nama_paket'][8] = "Bed Cover KING - 160cm - 200 cm MAX ";
        $this->data_paket['harga_paket'][8] = "30000";
        break;

      default:
        // code...
        break;
    }
  }


  public function get_data(){
    // inisialisasi variable
    $data_yang_dipesan = array();
    $kumpulan_spesifik_nama_yang_di_pesan = "";
    $kumpulan_spesifik_list_harga_yang_di_pesan = "";
    $kumpulan_spesifik_harga_yang_di_pesan = 0;
    $kumpulan_spesifik_qty_yang_di_pesan = "";


    if(isset($_POST['submit'])){
        $paket = $_POST['paket'];

        if(!empty($paket)){
          foreach($paket as $data){
            $this->get_paket($data);

            echo $this->data_paket['nama_paket'][$data];

            $kumpulan_spesifik_nama_yang_di_pesan .= $this->data_paket['nama_paket'][$data] . ",";
            echo "<br >" ;

            echo $this->data_paket['harga_paket'][$data];
            // simpan kedalam pesanan
            $data_yang_dipesan['harga_paket'][$data] = $this->data_paket['harga_paket'][$data];

            // langsung hitung total harga nya
            $kumpulan_spesifik_harga_yang_di_pesan += $this->data_paket['harga_paket'][$data] * $_POST['paket'.$data."qty"];

            // untuk menghindari koma , di akhir variable list harga
            if($data == end($paket)){
              $kumpulan_spesifik_list_harga_yang_di_pesan .= $this->data_paket['harga_paket'][$data];
            } else {
              $kumpulan_spesifik_list_harga_yang_di_pesan .= $this->data_paket['harga_paket'][$data] . ",";
            }

            echo "<br>";
            echo $_POST['paket'.$data."qty"];
            //  simpan kedalam pesanan
            $data_yang_dipesan['qty'][$data] = $_POST['paket'.$data."qty"];
            // untuk menghindari koma , di akhir variable qty yang di pesan
            if($data == end($paket)){
              $kumpulan_spesifik_qty_yang_di_pesan .= $_POST['paket'.$data."qty"];
            } else {
              $kumpulan_spesifik_qty_yang_di_pesan .= $_POST['paket'.$data."qty"] . ",";
            }
            echo "<br>";
            echo "-----------------------------------------";
            echo "<br>";
          }
        }

          $no_kartu = $_POST['no_kartu'];
          $no_bon = $_POST['no_bon'];
          $nama = $_POST['nama'];
          $nominal_penjualan = $_POST['nominal_penjualan'];
          $kembalian = $_POST['kembalian'];
          $no_hp = $_POST['no_hp'];
          $wash = $_POST['wash'];
          $dry = $_POST['dry'];
          $koin_terpakai = $_POST['koin_terpakai'];
          $tanggal = $_POST['tanggal'];
          $catatan = $_POST['catatan'];

          if(!empty($wash)){
            foreach($wash as $data){
              echo $data;
            }
          }

          if(!empty($dry)){
            foreach($dry as $data){
              echo $data;
            }
          }
          echo "<br>------------------------------------------";
          echo "DEBUG<br>";

          // pertama membuat foreach dengan mengambil variable data yang di pesan sebagai key => value untuk mengubah data object menjadi pecahan
        // contoh isi yang ada di variable data yang di pesan $data_yang_di_pesan['nama_paket'] => [0] => "data pertama"
        //                                                                                         [1] => "data kedua dan seterus nya"
          foreach($data_yang_dipesan as $key=>$value){
            // mengubah varibale $data_yang_dipesan menjadi $key=>$value sama saja dengan $data_yang_dipesan['nama_paket'] ataupun $data_yang_dipesan['harga'] dan seterusnya
              // $key = $data_yang_dipesan['nama_paket']
              // $number = $data_yang_dipesan['nama_paket'][0] no 1,2,3
              // $paket = $data_yang_dipesan['nama'][0] isi dari no 1,2,3
             foreach($value as $number=>$paket){
              // mengambil semua isi dari dalam variable $data_yang_dipesan $value disini berfungsi untuk menjadi $data_yang_dipesan dan $number=>$paket berfungsi untuk mengambil
              // data yang ada di dalam variable $data_yang_dipesan
              // echo "{$key} has a {$number} named {$paket} <br>"  ; // tampilkan semua data yang ada di dalam array $data_yang_dipesan
           }
         }
         echo "<br> catatan : " .$catatan ."<br>";
         echo $kumpulan_spesifik_nama_yang_di_pesan . "<br>";
         echo $kumpulan_spesifik_harga_yang_di_pesan . "<br>";
         echo $kumpulan_spesifik_qty_yang_di_pesan . "<br>";
         echo $kumpulan_spesifik_list_harga_yang_di_pesan . "<br>";
         echo $_POST['submit'];

        }
      }



  public function simpan_data_penjualan(){
    // inisialisasi variable
    $data_yang_dipesan = array();
    $kumpulan_spesifik_nama_yang_di_pesan = "";
    $kumpulan_spesifik_list_harga_yang_di_pesan = "";
    $kumpulan_spesifik_harga_yang_di_pesan = 0;
    $kumpulan_spesifik_qty_yang_di_pesan = "";


    if(isset($_POST['submit'])){
        $paket = $_POST['paket'];
        $status = $_POST['submit'];
        if(!empty($paket)){
          foreach($paket as $data){
            $this->get_paket($data);
            $kumpulan_spesifik_nama_yang_di_pesan .= $this->data_paket['nama_paket'][$data] . ",";
            // simpan kedalam pesanan
            $data_yang_dipesan['harga_paket'][$data] = $this->data_paket['harga_paket'][$data];

            // simpan untuk qty
            $data_yang_dipesan['qty'][$data] = $_POST['paket'.$data."qty"];
            // untuk menghindari koma , di akhir variable qty yang di pesan
            if($data == end($paket)){
              $kumpulan_spesifik_qty_yang_di_pesan .= $_POST['paket'.$data."qty"];
            } else {
              $kumpulan_spesifik_qty_yang_di_pesan .= $_POST['paket'.$data."qty"] . ",";
            }

            // langsung hitung total harga nya
            $kumpulan_spesifik_harga_yang_di_pesan += $this->data_paket['harga_paket'][$data] * $_POST['paket'.$data."qty"];

            // untuk menghindari koma , di akhir variable list harga
            if($data == end($paket)){
              $kumpulan_spesifik_list_harga_yang_di_pesan .= $this->data_paket['harga_paket'][$data];
            } else {
              $kumpulan_spesifik_list_harga_yang_di_pesan .= $this->data_paket['harga_paket'][$data] . ",";
            }

          }
        }

          $no_kartu = $_POST['no_kartu'];
          $no_bon = $_POST['no_bon'];
          $nama = $_POST['nama'];
          $nominal_penjualan = $_POST['nominal_penjualan'];
          $kembalian = $_POST['kembalian'];
          $no_hp = $_POST['no_hp'];
          $wash = $_POST['wash'];
          $dry = $_POST['dry'];
          $koin_terpakai = $_POST['koin_terpakai'];
          $catatan = $_POST['catatan'];
          $tanggal = $_POST['tanggal'];

          //simpan semua data mesin cuci yang di pakai didalam variable ini
          $list_wash = "";
          if(!empty($wash)){
            foreach($wash as $data){
              $list_wash .= $data;
            }
          }

          //simpan data mesin kering yang di pakai didalam variable ini
          $list_dry = "";
          if(!empty($dry)){
            foreach($dry as $data){
              $list_dry .= $data;
            }
          }

          try {
            $stmt = $this->db->prepare("INSERT INTO tb_penjualan (nama,paket,qty,no_kartu,no_bon,list_harga,total_harga,nominal_penjualan,kembalian,no_hp,wash,dry,koin_terpakai,catatan,status,tanggal) VALUES
                                                                 (:nama,:paket,:qty,:no_kartu,:no_bon,:list_harga,:total_harga,:nominal_penjualan,:kembalian,:no_hp,:wash,:dry,:koin_terpakai,:catatan,:status,:tanggal)");
            $stmt->bindParam("nama", $nama);
            $stmt->bindParam("qty",$kumpulan_spesifik_qty_yang_di_pesan);
            $stmt->bindParam("paket", $kumpulan_spesifik_nama_yang_di_pesan);
            $stmt->bindParam("no_kartu",$no_kartu);
            $stmt->bindParam("no_bon",$no_bon);
            $stmt->bindParam("list_harga",$kumpulan_spesifik_list_harga_yang_di_pesan);
            $stmt->bindParam("total_harga",$kumpulan_spesifik_harga_yang_di_pesan);
            $stmt->bindParam("nominal_penjualan",$nominal_penjualan);
            // update kembalian dengan mengurangi total penjualan
            $kembalian = $nominal_penjualan - $kumpulan_spesifik_harga_yang_di_pesan;
            $stmt->bindParam("kembalian",$kembalian);
            $stmt->bindParam("no_hp",$no_hp);
            $stmt->bindParam("wash",$list_wash);
            $stmt->bindParam("dry", $list_dry);
            $stmt->bindParam("koin_terpakai",$koin_terpakai);
            $stmt->bindParam("catatan",$catatan);
            $stmt->bindParam("status",$status);
            $stmt->bindParam("tanggal",$tanggal);
            $stmt->execute();
            return true;
          } catch(PDOException $e){
            echo $e->getMessage();
          }
        }
      }
  
  public function get_cap($no_kartu){
    try {
 
      $stmt = $this->db->prepare("SELECT hitung_cap FROM tb_kastamer WHERE no_kartu=$no_kartu");
      $stmt->execute();
      
      if($stmt->rowCount() > 0 ){
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          // pertama ubah dulu ke tipe data objek ke integer
          $x = (int)$data['hitung_cap'];
          // terus return biar nanti nilai ini di ambil sama fungsi tambah_cap
          return $x;
        }
      }
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function tambah_cap($no_kartu){

    // passing lagi value nya dari fungsi get cap
    $no_kartu_baru = $this->get_cap($no_kartu);

    // langsung update ke database nilai pertambahan nya juga
    $stmt = $this->db->prepare("UPDATE tb_kastamer SET hitung_cap = $no_kartu_baru+1 WHERE no_kartu = $no_kartu");
    $stmt->execute();

    
  }

  public function set_no_kartu(){
    try {
      // buat dapetin nilai terakhir
      $stmt = $this->db->prepare("SELECT * FROM tb_kastamer ORDER BY no DESC LIMIT 1");
      $stmt->execute();
      
      if($stmt->rowCount() > 0 ){
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          // dapetin value no kartu nya
          $x = $data['no_kartu'];
          // di karenakan pelanggan baru jdi auto nambah no kartu nya
          $x += 1;
          echo $x;
        }
      }
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function check_kastamer($no_kartu){
    try {
      $stmt = $this->db->prepare("SELECT * FROM tb_kastamer WHERE no_kartu = $no_kartu");
      $stmt->execute();
      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function save_data_kastamer(){

    // inisialisasi variable 
    $tanggal_dibuat = $_POST['tanggal'];
    $no_kartu = $_POST['no_kartu'];
    $nama = $_POST['nama']; 
    $no_hp = $_POST['no_hp'];
    $tanggal_cap = $_POST['tanggal'];
    $hitung_cap = 1;

    // cek dulu apakah ada kastamer yang sama? untuk menghindari data duplicate kastamer
    if($this->check_kastamer($no_kartu)){
      echo "<script>console.log('datakastamer ada!');</script>";

      // lalu dapatkan nilai cap 
      $this->tambah_cap($no_kartu);
      exit();
    }
    // jika sudah di cek tidak ada maka masukkan data kastamer yang baru
    try{
      $stmt = $this->db->prepare("INSERT INTO tb_kastamer (tanggal_dibuat,no_kartu,nama,no_hp,tanggal_cap,hitung_cap) VALUES (:tanggal_dibuat,:no_kartu,:nama,:no_hp,:tanggal_cap,:hitung_cap)");
      $stmt->bindParam("tanggal_dibuat", $tanggal_dibuat);
      $stmt->bindParam("no_kartu",$no_kartu);
      $stmt->bindParam("nama",$nama);
      $stmt->bindParam("no_hp",$no_hp);
      $stmt->bindParam("tanggal_cap",$tanggal_cap);
      $stmt->bindParam("hitung_cap",$hitung_cap);
      $stmt->execute();
      if(isset($_SESSION['save_kastamer'])){
        unset($_SESSION['save_kastamer']);
        }
      return true;
    } catch(PDOException $e){
      echo $e->getMessage();
    }

  }
  

  public function show_data_paket(){
    try{
      $stmt = $this->db->prepare("SELECT * FROM tb_list_harga"); // mengambil data dari tabel
      $stmt->execute(); // eksekusi

      if($stmt->rowCount() > 0){ // jika ada data dalam tabel database
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="custom-control custom-checkbox bg-dark p-2 bg-opacity-75 class<?php echo $data['id']; ?>qty" >
            <div class="form-check">
              <input class="form-check-input paket_check" name="paket[]" value="<?php echo $data['id']; ?>" type="checkbox">
              <!-- untuk javascript nya paket label -->
              <label class="form-check-label paket_label<?php echo $data['id']; ?>"><?php echo $data['paket'] . ' @ ' . number_format($data['harga'],2,',','.'); ?></label>
              <br>
              <select name="paket<?php echo $data['id']; ?>qty" class="form-select paket<?php echo $data['id']; ?>qty" aria-label="Default select example">
                <option value="1" disabled selected>Qty</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            </div>
          </div>
          <br>
          <?php
        }
      }
    } catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    echo $hasil_rupiah;
  }

  public function show_kastamer(){
    try{
      $stmt = $this->db->prepare("SELECT * FROM tb_kastamer");
      $stmt->execute();

      if($stmt->rowCount() > 0){
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?> <option value="<?php echo $data['no_kartu']; ?>"><?php echo "" . $data['nama'] . " - " . $data['no_kartu']; ?></option>

          <?php

        }
      }
    } catch(PDOException $e){
      echo $e->getMessage();
    }
  }

  public function hitung_total_penjualan(){
    $stmt = $this->db->prepare("SELECT sum(nominal_penjualan) as total_penjualan FROM tb_penjualan");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      // karna satu data pake if saja
      if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // langsung jadiin tipe data nya jdi integer
        $penjualan = (int)$data['total_penjualan'];
        // convert rupiah
        $this->rupiah($penjualan);

  
      }
    }
  }

  public function hitung_total_kembalian_output(){
    $stmt = $this->db->prepare("SELECT sum(kembalian) as total_kembalian FROM tb_penjualan");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      // karna satu data pake if saja
      if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // langsung jadiin tipe data nya jdi integer
        $kembalian = (int)$data['total_kembalian'];
        // convert rupiah
        $this->rupiah($kembalian);
      }
    }
  }


  public function hitung_total_keuntungan(){
    $stmt = $this->db->prepare("SELECT sum(nominal_penjualan) as total_penjualan FROM tb_penjualan");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      // karna satu data pake if saja
      if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // langsung jadiin tipe data nya jdi integer
        $penjualan = (int)$data['total_penjualan'];
        // dapetin nilai dari fungsi kembalian
        $kembalian = $this->hitung_total_kembalian();
        // langsung jumlahkan hasil penjualan

        $penjualan = $penjualan - $kembalian;
        //convert ke rupiah
        $this->rupiah($penjualan);

  
      }
    }
  }

  public function hitung_total_kembalian(){
    $stmt = $this->db->prepare("SELECT sum(kembalian) as total FROM tb_penjualan");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      // karna satu data pake if saja
      if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // langsung jadiin tipe data nya jdi integer
        $x = (int)$data['total'];
        return $x;
      }
    }
  }

  public function hitung_total_transaksi(){
    $stmt = $this->db->prepare("SELECT count(id) as total FROM tb_penjualan");
    $stmt->execute();
    if($stmt->rowCount() > 0){
      // karna satu data pake if saja
      if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // langsung jadiin tipe data nya jdi integer
        $x = (int)$data['total'];
        echo $x;
      }
    }
  }


  public function hitung_produk_terlaris($produk){

    // pertama2 ambil data dari database 
    $stmt = $this->db->prepare("SELECT paket FROM tb_penjualan");

    //eksekusi
    $stmt->execute();

    // inisialisasi variable
    $str = array();

    // jika berhasil
    if($stmt->rowCount() > 0){
      //lakukan perulangan untuk mengambil data yang ada di database
      while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
        // pertama pisahin dulu dari Cuci - Kering - Lipat /6kg,selimut jadi Cuci - Kering - Lipat /6kg saja alias ambil data di belakang koma saja
        $row = (explode(",",$data['paket']));

        // lalu masukkan kedalam variable str
        array_push($str,$row);
        }
      }
      // untuk menghitung jumlah produk tertentu yang laris
      $count = 0;

      // lakukan perulangan terhadap variable str yang tadi di simpan
      foreach($str as $data){
        // untuk debugging saja
        // echo $data[0] . "<br>";

        // kalo isi dari data[0] == 'Cuci - Kering - Lipat /6kg' atau produk tertentu 
        if($data[0] == $produk){
          // tambahkan hitungan nya
          $count +=1;
        }
      }
      // tampilkan hitungan produk terlaris
      echo $count;
  
    }

    public function tampilkan_data_transaksi(){
      $stmt = $this->db->prepare("SELECT * FROM tb_penjualan");
      $stmt->execute();
      if($stmt->rowCount() > 0){
         while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
            <td class="id_transaksi"><?php echo $data['id']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['paket']; ?></td>
            <td><?php echo $data['qty']; ?></td>
            <td><?php echo $data['no_kartu']; ?></td>
            <td><?php echo $data['no_bon']; ?></td>
            <td><?php echo $data['total_harga']; ?></td>
            <td><?php echo $data['nominal_penjualan']; ?></td>
            <td><?php echo $data['kembalian']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['wash']; ?></td>
            <td><?php echo $data['dry']; ?></td>
            <td><?php echo $data['koin_terpakai']; ?></td>
            <td><?php echo $data['catatan']; ?></td>
            <td><?php echo $data['Status']; ?></td>
            <td><?php echo $data['tanggal'];?>
            <td><?php echo $data['tanggal_diambil']; ?></td>
            <td>
            <?php 
            // untuk cek apakah admin atau karyawan yang login, kalo admin bisa edit hapus kalo karyawan tidak bisa
            if($_SESSION['user'] == 'admin'){
            ?>
              <button type="button" class="btn btn-block btn-primary edit_transaksi btn-sm" style="width: 70px;">Edit</button><button type="button" class="btn btn-block btn-danger hapus_transaksi btn-xs" style="width: 70px;">Hapus</button></td>
            <?php
            }
            ?>
            
          </tr>
          <?php
        }
      }
    }

    public function edit_data_transaksi($id){
        $stmt = $this->db->prepare("SELECT * FROM tb_penjualan WHERE id='$id'");
      $stmt->execute();
      if($stmt->rowCount() > 0){
         if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <form method="post">

          <tr>
            <td><input type="hidden" name="id" value="<?php echo $data['id']; ?>"></td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            <td><input type="text" name="paket" value="<?php echo $data['paket']; ?>"></td>
            <td><input type="text" name="qty" value="<?php echo $data['qty']; ?>"></td>
            <td><input type="text" name="no_kartu" value="<?php echo $data['no_kartu']; ?>"></td>
            <td><input type="text" name="no_bon" value="<?php echo $data['no_bon']; ?>"></td>
            <td><input type="text" name="total_harga" value="<?php echo $data['total_harga']; ?>"></td>
            <td><input type="text" name="nominal_penjualan" value="<?php echo $data['nominal_penjualan']; ?>"></td>
            <td><input type="text" name="kembalian" value="<?php echo $data['kembalian']; ?>"></td>
            <td><input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"></td>
            <td><input type="text" name="wash" value="<?php echo $data['wash']; ?>"></td>
            <td><input type="text" name="dry" value="<?php echo $data['dry']; ?>"></td>
            <td><input type="text" name="koin_terpakai" value="<?php echo $data['koin_terpakai']; ?>"></td>
            <td><input type="text" name="catatan" value="<?php echo $data['catatan']; ?>"></td>
            <td><input type="text" name="status" value="<?php echo $data['Status']; ?>"></td>
            <td><input type="text" name="tanggal" value="<?php echo $data['tanggal']; ?>"></td>
            <td><input type="text" name="tanggal" value="<?php echo $data['tanggal_diambil']; ?>"></td>
            <td><input type="submit" name="submit" class="btn btn-block btn-primary btn-sm" style="width: 70px;" value="Submit"></button><button type="button" class="btn btn-block btn-danger hapus_transaksi btn-xs" style="width: 70px;">Hapus</button></td>
          </tr>
         </form>
         <?php
                        if(isset($_POST['submit'])){
                           
                            $this->save_edit_data_transaksi();
                            echo "<script>alert('berhasil di ubah');
                            window.location.replace('lihat_transaksi.php');
                            </script>";
                            
                        }
                    ?>
          <?php
        }
      }
    }

    public function save_edit_data_transaksi(){

      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $paket = $_POST['paket'];
      $qty = $_POST['qty'];
      $no_kartu = $_POST['no_kartu'];
      $no_bon = $_POST['no_bon'];
      $total_harga = $_POST['total_harga'];
      $nominal_penjualan = $_POST['nominal_penjualan'];
      $kembalian = $_POST['kembalian'];
      $no_hp = $_POST['no_hp'];
      $wash = $_POST['wash'];
      $dry = $_POST['dry'];
      $koin_terpakai = $_POST['koin_terpakai'];
      $catatan = $_POST['catatan'];
      $status = $_POST['status'];
      $tanggal = $_POST['tanggal'];

      try {
        $stmt = $this->db->prepare("UPDATE tb_penjualan SET nama='$nama',paket='$paket',qty='$qty',
                                           no_kartu='$no_kartu',no_bon='$no_bon',total_harga='$total_harga',nominal_penjualan='$nominal_penjualan',
                                           kembalian='$kembalian',no_hp='$no_hp',wash='$wash',dry='$dry',
                                           koin_terpakai='$koin_terpakai',catatan='$catatan',status='$status',
                                           tanggal='$tanggal' WHERE id='$id'");
     
        $stmt->execute();
        return true;
      } catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function hapus_transaksi($id){
      $stmt = $this->db->prepare("DELETE FROM tb_penjualan WHERE id='$id'");
      $stmt->execute();      
    }

    public function tampilkan_data_kastamer(){
      $stmt = $this->db->prepare("SELECT * FROM tb_kastamer");
      $stmt->execute();
      if($stmt->rowCount() > 0){
         while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
            <td><?php echo $data['no']; ?></td>
            <td><?php echo $data['tanggal_dibuat']; ?></td>
            <td><?php echo $data['no_kartu']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['no_hp']; ?></td>
            <td><?php echo $data['hitung_cap']; ?></td>
            <td>action</td>
          </tr>
          <?php
        }
      }
    }


    public function tampilkan_info_penjualan(){
      $stmt = $this->db->prepare("SELECT nominal_penjualan,tanggal FROM tb_penjualan ");
      $stmt->execute();
      if($stmt->rowCount() > 0){
        $i = $stmt->rowCount();
        $y = 0;
        $total = 0;
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          $y++;
          if($i == 1){
            ?>
            <tr>
           <td><?php echo $y; ?> </td>
            <td><?php echo $data['tanggal']; ?>
            <td><?php echo $data['nominal_penjualan']; ?></td>
          </tr>
          <tr>
              <td> - </td>
              <td>TOTAL </td>
              <td> <?php echo $total; ?> </td>
          </tr>
          <?php 
          } else {
          
          ?>
          <tr>
            <td><?php echo $y; ?> </td>
            <td><?php echo $data['tanggal']; ?>
            <td><?php echo $data['nominal_penjualan']; ?></td>
          </tr>
          <?php
          $total += $data['nominal_penjualan'];
          $i--;
          }
        }
      }
    }


    
    public function tampilkan_total_pengeluaran(){
      $stmt = $this->db->prepare("SELECT kembalian,tanggal FROM tb_penjualan ");
      $stmt->execute();
      if($stmt->rowCount() > 0){
        $i = $stmt->rowCount();
        $y = 0;
        $total = 0;
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          $y++;
          if($i == 1){
            ?>
            <tr>
           <td><?php echo $y; ?> </td>
            <td><?php echo $data['tanggal']; ?>
            <td><?php echo $data['kembalian']; ?></td>
          </tr>
          <tr>
              <td> - </td>
              <td>TOTAL </td>
              <td> <?php echo $total; ?> </td>
          </tr>
          <?php 
          } else {
          
          ?>
          <tr>
            <td><?php echo $y; ?> </td>
            <td><?php echo $data['tanggal']; ?>
            <td><?php echo $data['kembalian']; ?></td>
          </tr>
          <?php
          $total += $data['kembalian'];
          $i--;
          }
        }
      }
    }

    public function tampilkan_laporan(){
      $dari_tanggal = str_replace('/','-',$_POST['dari_tanggal']); 
      $sampai_tanggal = str_replace('/','-',$_POST['sampai_tanggal']);
  
      $stmt = $this->db->prepare("SELECT * from tb_penjualan WHERE tanggal BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");

      $stmt->execute();
      if($stmt->rowCount() > 0){
         while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['no_bon']; ?></td>
            <td><?php echo $data['paket']; ?></td>
            <td><?php echo $data['total_harga']; ?></td>
          </tr>
          <?php
        }
      }
    }

    public function tampilkan_transaksi_keluar(){
      $stmt = $this->db->prepare("SELECT * FROM tb_transaksi_keluar");
      $stmt->execute();
      if($stmt->rowCount() > 0){
         while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
          ?>
          <tr>
            <td><?php echo $data['no']; ?></td>
            <td><?php echo $data['catatan']; ?></td>
            <td><?php echo $data['total_pengeluaran']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
          </tr>
          <?php
        }
      }
    }

    public function tambah_transaksi_keluar(){
      $no = "";
      $catatan = $_POST['catatan'];
      $total_pengeluaran = $_POST['total_pengeluaran'];
      $tanggal = $_POST['tanggal'];

      try {
        $stmt = $this->db->prepare("INSERT INTO tb_transaksi_keluar (no,catatan,total_pengeluaran,tanggal) VALUES (:no,:catatan,:total_pengeluaran,:tanggal)");
        $stmt->bindParam("no", $no);
        $stmt->bindParam("catatan", $catatan);
        $stmt->bindParam("total_pengeluaran", $total_pengeluaran);
        $stmt->bindParam("tanggal", $tanggal);
        $stmt->execute();
        return true;
      } catch(PDOException $e){
        echo $e->getMessage();
      }
    }


    public function login($user,$pass){

      $stmt = $this->db->prepare("SELECT * FROM users where username ='$user' AND password = '$pass'");
      $stmt->execute(); 
      if($stmt->rowCount() > 0){
          if($data = $stmt->fetch(PDO::FETCH_ASSOC)){
             $_SESSION['user'] = $data['username'];
             header("Location: index.php");
          }  
       
          
        }
      }
    
    public function cek_login(){
        if(!isset($_SESSION['user'])){
          echo "<script>window.location.replace('login.php');</script>"; 
        } 
    }

    
// end class
}
include "koneksi.php";
?>
