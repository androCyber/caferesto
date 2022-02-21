<?php
$db= new mysqli('localhost','cafeRestoUsr','oJ6Edv9YUD(gy!L/','siparis') or die("Bağlantı Başarısız");
$db->set_charset("utf8");

class sistem {

   function masaCek($dv){


                    $masalar="Select * From Masalar";
                    $masaS=$dv->prepare($masalar);
                    $masaS->execute();
                    $masaRSLT=$masaS->get_result();
                    $result=$masaRSLT->fetch_assoc();

                    while($result=$masaRSLT->fetch_assoc()) :

                    echo '<div class="col-md-1 border border-dark  bg-danger mx-auto p-2 text-center text-white" id="masa">'.$result['ad'].'</div>';

                    endwhile;

    }



}
?>