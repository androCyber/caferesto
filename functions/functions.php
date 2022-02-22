<?php
$db= new mysqli('localhost','cafeRestoUsr','oJ6Edv9YUD(gy!L/','siparis') or die("Bağlantı Başarısız");
$db->set_charset("utf8");

class sistem {

   function masaCek($dv){


                    $masalar="Select * From masalar";
                    $masaS=$dv->prepare($masalar);
                    $masaS->execute();
                    $masaRSLT=$masaS->get_result();
                   
                    while($result=$masaRSLT->fetch_assoc()) :

                    echo ' <div class="col-md-2 col-sm-6 mr-2 mx-auto p-2 text-center text-white" >
                    <div class="bg-danger" id="masa">'.$result['ad'].'</div>  
                    
                    </div>';
                  
                  
                  
                 
                  
                   
                
                endwhile;

    }



}
?>