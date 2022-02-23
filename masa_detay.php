<?php
require_once ("functions/functions.php");
$masaDetay = new sistem;
@$masaId=$_GET['masaId'];

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
      
    </style>
    
  </head>
  <body>
          <div class="container-fluid "> <!-- Ana div başlangıç-->

<?php 

if ($masaId !=""):
$result= $masaDetay->getTDetail($db,$masaId);
$tInfo=$result->fetch_assoc();

?>

           <div class="row border border-dark" style="min-height:700px;">
                          <div class="col-md-2 border-right border-dark">
                                <div class="row">
                                    <div class="col-md-12 border border-bottom border-info bg-info" style="min-height:100px"><?php echo $tInfo['ad']?></div>

                                    <div id="veri">


                                    </div>
                                   
                                </div>



                          </div>
                          <div class="col-md-10">
                              <form id="dataForm">

                                      <input type="text" name="urunId"/>
                                      <input type="text" name="adet"/>
                                      <input type="text" hidden name="masaId" value="<?php echo $masaId ;?>"/>
                                      <input type="button" id="btn" value="EKLE"/>
                              </form>

                          </div>


           </div>

<?php 
else:
  echo "Hatalı yol";

endif;

?>


          </div><!-- Ana div bitiş-->


	<script src="assets/js/jquery.js"></script>
  <script>
$(document).ready(function(){

let id=<?php echo $masaId; ?>

  $("#veri").load("islemler.php?islem=goster&id="+id);
  $("#btn").click(function(){

          $.ajax({
                    type:"POST",
                    url:'islemler.php?islem=ekle',
                    data: $("dataForm").serialize(),
                    success: function(response)
                    {
                      $("#veri").load("islemler.php?islem=goster&id="+id);
                    }







          })



  });


}) ;




  </script>
  </body>
</html>