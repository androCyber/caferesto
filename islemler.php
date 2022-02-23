<?php
$db= new mysqli('localhost','cafeRestoUsr','oJ6Edv9YUD(gy!L/','siparis') or die("Bağlantı Başarısız");
$db->set_charset("utf8");

$islem=$_GET['islem'];
switch ($islem):
  case "goster":
$id=$_GET['id'];
    $query="Select * From anliksiparis where masaid=$id";
    $queryPrep=$db->prepare($query);
    $queryPrep->execute();
    $queryResult= $queryPrep->get_result();

        if ($queryResult->num_rows==0):
          echo "Henüz sipariş yok.";

        else:

                  while( $detaySonuc=$queryResult->fetch_assoc()):
                   echo '<div class="col-md-12 border border-bottom border-info" >'.$detaySonuc["id"].'</div>';
                  endwhile;
          
        endif;

    break;
  
  case "ekle":
    $masaId=$_POST['masaId'];
    $urunId=$_POST['urunId'];
    $adet=$_POST['adet'];

              $siparisEkle="Insert into anliksiaparis(masaid,urunid,urunad,urunfiyat,adet) Values ($masaId,$urunId,'Fıstıklı Baklava',120, $adet)";
              $siparisEkleRSLT=$db->prepare($siparisEkle);
              $siparisEkleRSLT->execute();
              echo "Ekleme Yapıldı";
    
    
    break;
  endswitch;    
?>
