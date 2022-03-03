<?php
include_once "functions.php";
try {
  $con = new PDO('mysql:host=localhost;dbname=db_klinwash', 'root','0210sura',array(PDO::ATTR_PERSISTENT => true));
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
}



$app = new klinwash($con);

?>
