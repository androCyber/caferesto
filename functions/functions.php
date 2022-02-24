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

                        $orders='Select * From anliksiparis where masaid='.$result['id'];

                    //ternary if Masa dolu mu boş mu
                        $this->myQuery($dv,$orders,1)->num_rows==0 ? $tColor="danger":   $tColor="success";

                    echo ' <div id="mas" class="col-md-2 col-sm-6 mr-2 mx-auto p-2 text-center text-white" >
                    <a href="masa_detay.php?masaId='.$result['id'].'">
                    <div class="bg-'.$tColor.'" id="masa">'.$result['ad'].'</div>  </a>
                    
                    </div>';
                  
                  
                  
                 
                  
                   
                
                endwhile;

    }
            //Masa sayısını veren fonksiyon
            function masaToplam($dv){

                
                echo $this->myQuery($dv,"Select * From masalar",1)->num_rows;

                

            }

            //Masa Detayını gösteren fonksiyon

            function getTDetail($dv,$id){

                $detaySorgu="Select * From masalar where id=$id";
                return $this->myQuery($dv,$detaySorgu,1);

            }

            //Ürün Gruplarının Listelenmesi

            function productGroup($db){

                $catQuery="Select * From kategori";
                $catQueryRspns=$this->myQuery($db,$catQuery,1);

                    while($result=$catQueryRspns->fetch_assoc()):

                       echo  '<a class="btn btn-dark mt-2 text-white" sectionId="'.$result['id'].'">'.$result['ad'].'</a></br>';

                    endwhile;




            }




}
?>