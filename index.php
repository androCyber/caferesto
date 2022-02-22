<?php
require_once ("functions/functions.php");
$sistem = new sistem;

?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootsrap.css">
    <title>CafeResto Projesi</title>
    <style>

  #rows {              
  height: 32px;
  }

  #masa {
          height: 80px;
          margin: 12px;
          font-size: 35px;
          border-radius: 10px;
        }
    </style>
    
  </head>
  <body>
          <div class="container-fluid "> <!-- Ana div başlangıç-->
              <div class="row table-dark" id="rows"> <!-- Üst Bilgi Bannerı başlangıç-->
               <div class="col-md-3 border-right">Toplam Sipariş: <a class="text-warning" >10</a> </div>
               <div class="col-md-3 border-right">Doluluk Oranı: <a class="text-warning" >10</a> </div>
               <div class="col-md-3 border-right">Toplam Masa: <a class="text-warning" ><?php $sistem-> masaToplam($db);?></a> </div>
               <div class="col-md-3 border-right">Tarih: <a class="text-warning" >10</a> </div>
              </div> <!-- Üst Bilgi Bannerı bitiş-->

                        <div class="row"><!-- Masa alanı başlangıç-->
                        <?php 
                        
                        $sistem->masaCek($db);
                        
                        ?>


                       
                        </div> <!-- Masa alanı bitiş -->

          </div><!-- Ana div bitiş-->


	<script src="assets/js/jquery.js"></script>
  </body>
</html>