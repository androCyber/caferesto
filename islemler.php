<?php session_start();
$db= new mysqli('localhost','cafeRestoUsr','oJ6Edv9YUD(gy!L/','siparis') or die("Bağlantı Başarısız");
$db->set_charset("utf8");

function processQuery($db,$query,$option)
            {
                    $queryPrep=$db->prepare($query);
                    $queryPrep->execute();
                    if($option==1):
                   return $queryResult= $queryPrep->get_result();
                   
                    endif;
                
            }





$islem=$_GET['islem'];

switch ($islem):

  case "goster":

$id=$_GET['id'];

    $query="Select * From anliksiparis where masaid=$id";
    $queryResult=processQuery($db,$query,1);


        if ($queryResult->num_rows==0):
          echo "<div class='alert alert-danger mt-4 text-white text-center'>

          Henüz sipariş yok.</div>";

        else:

          echo '<table class="table text-center">
                <thead>
                <tr>
                <th scope="col"> Ürün adı</th>
                <th scope="col"> Miktarı</th>
                <th scope="col"> Tutar</th>
                </tr>
                </thead>
                <tbody>
          
          ';
                $sum=0;
                  while( $instantOL=$queryResult->fetch_assoc()):
                    $tutar=$instantOL['miktar']*$instantOL['urunfiyat'];
                   echo '<tr>
                      <td class="text-left">'.$instantOL['urunad'].'</td>
                      <td>'.$instantOL['miktar'].'</td>
                      <td>'.$tutar.'</td>
                      
                   </tr>';
                   $sum+=$tutar;
                  endwhile;
                  echo '<tr class="table-danger font-weight-bold">
                  <td>TOPLAM</td>
                  <td></td>
                  <td >'.$sum.'</td>
                  

               </tr>';

                echo  '</tbody></table>';
        endif;

    break;
  
  case "ekle":
        if($_POST):
    

    @$masaId=htmlspecialchars($_POST['masaId']);
    @$urunId=htmlspecialchars($_POST['urunId']);
    @$miktar=htmlspecialchars($_POST['miktar']);
                    /*Ürün bilgileri eksik mi değil mi */

                if($masaId==""||$urunId==""||$miktar==""):

                  echo "<div class='alert alert-danger mt-4 text-white text-center'>

                  Seçtiğiniz ürün bilgilerini kontrol ediniz...</div>";

                else:


                  $query="Select * From urunler where id=$urunId";
                  $queryResult=processQuery($db,$query,1);
                  $product=$queryResult->fetch_assoc();

                  $productName=$product['ad'];
                  $productPrice=$product['fiyat'];

                  $siparisEkle="Insert into anliksiparis (masaid,urunid,urunad,urunfiyat,miktar) Values ($masaId,$urunId,'$productName',$productPrice,$miktar)";
                  $siparisEkleRSLT=$db->prepare($siparisEkle);
                  $siparisEkleRSLT->execute();
                  echo "Ekleme Yapıldı";

                endif;

              
        else:
               
         echo "Yetkisiz bir işlem gerçekleştirdiniz......";
        
        endif;
    
    break;
case "urun":/*Masa detay sayfasında seçilen kategoriye göre ürünler listeleniyor...*/ 

    $catid=htmlspecialchars($_GET['catid']);
    $query="Select * From urunler where katid=$catid";
    $queryResult=processQuery($db,$query,1);

  

    while( $productResult=$queryResult->fetch_assoc()):

      echo '<label class="btn btn-dark m-2"><input name="urunId" type="radio" value="'.$productResult["id"].'"/>'.$productResult["ad"].'</label>';

     

      
     endwhile;





  break;



  endswitch;    
?>
