<?php
$db= new mysqli('localhost','cafeRestoUsr','oJ6Edv9YUD(gy!L/','siparis') or die("Bağlantı Başarısız");
$db->set_charset("utf8");

class sistem {

            private function myQuery($db,$query,$option)
            {
                    $queryPrep=$db->prepare($query);
                    $queryPrep->execute();
                    if($option==1):
                   return $queryResult= $queryPrep->get_result();
                   
                    endif;
                
            }






   function masaCek($dv){


                    $masalar="Select * From masalar";
                    $masaRSLT=$this->myQuery($dv,$masalar,1);
                    while($result=$masaRSLT->fetch_assoc()) :

                    echo ' <div class="col-md-2 col-sm-6 mr-2 mx-auto p-2 text-center text-white" >
                    <div class="bg-danger" id="masa">'.$result['ad'].'</div>  
                    
                    </div>';
                  
                  
                  
                 
                  
                   
                
                endwhile;

    }

            function masaToplam($dv){

                
                echo $this->myQuery($dv,"Select * From masalar",1)->num_rows;

                

            }

}
?>