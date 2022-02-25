<?php
require_once ("functions/functions.php");
$masaDetay = new sistem;
@$masaId=htmlspecialchars($_GET['masaId']);

?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootsrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
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

           <div class="row" id="mainRow">
                          <div class="col-md-2" id="instantOC">
                                <div class="row">
                                    <div class="col-md-12 border border-bottom border-success bg-success mx-auto p-4 text-center text-white" id="tableInfo" ><?php echo $tInfo['ad']?></div>
                                  <!-- Anlık Sipariş Alanı Başlangıç -->
                                    <div id="veri">
                                    </div>
                                   <!-- Anlık Sipariş Alanı Bitiş -->
                                   <div id="cevap">
                                    </div>

                                </div>



                          </div>

                          <div class="col-md-8" style="background-color: #F9F9F9;">
                              
                                                <div class="row"><form id="dataForm">
                                                            <div class="col-md-12" id="urunler" style="min-height:600px;">



                                                            </div>

                                                </div>
                                                <div class="row" id="orderBottom">
                                                            <div class="col-md-12">
                                                                  <div class="row">
                                                                        <div class="col-md-6" >


                                                                              <input type="hidden" name="masaId" value="<?php echo $tInfo['id']; ?>" />
                                                                               <input type="button" id="btn" value="EKLE" class="btn btn-success btn-block mt-4"/>
                                                            
                                                                           </div>

                                                                          <div class="col-md-6">
                                                                            <?php for ($i=1;$i<=13;$i++):
                                                                              
                                                                              echo '<label class="btn btn-success m-2"><input name="miktar" type="radio" value="'.$i.'"/>'.$i.'</label>';
                                                                            endfor;
                                                                            ?>

                                                                        

                                                                        

                                                                          </div>

                                                                  </div>

                                                            </div>

                                                </div>





                          </div>
                          <!-- KATEGORİLER Başlangıç-->
                          <div class="col-md-2" id="categories">

                          <?php $masaDetay->productGroup($db);?>
                              
                          </div>
                        <!-- KATEGORİLER Bitiş-->
           </div>

<?php 
else:
  echo "Hatalı yol";

endif;

?>


          </div><!-- Ana div bitiş-->


	
  </body>
  <script src="assets/js/jquery.js"></script>
  <script>
$(document).ready(function(){

let id=<?php echo $masaId; ?>

$("#veri").load("islemler.php?islem=goster&id="+id);
$("#btn").click(function(){

          $.ajax({
                    type:"POST",
                    url:'islemler.php?islem=ekle',
                    data: $('#dataForm').serialize(),
                    success: function(responseData)
                    {
                      $("#veri").load("islemler.php?islem=goster&id="+id);
                      $("#cevap").html(responseData);
                      $("#dataForm").trigger("reset");
                    }
 });



  });


}) ;

$("#categories a").click(function(){
let sectionId=$(this).attr('sectionId');
$("#urunler").load("islemler.php?islem=urun&catid="+ sectionId).fadeIn();





})


  </script>
</html>
