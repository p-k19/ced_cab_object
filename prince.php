<?php

 class cedcab{
       
    function f1($pick,$drop,$cab){    //function f1 to be called by obejct 'obj'
 $this->pick1=$pick;
 $this->drop1=$drop;
 $this->cab1=$cab;
 ;
 
    echo"\n<strong>PickUp:</strong>".$pick."<br>"; 
    echo"\n<strong>Drop:</strong>".$drop."<br>"; 
    echo"\n<strong>Cab:</strong>".$cab."<br>"; 



if ($cab=="CedMicro") {
        //return;
} 
else {
        $kg=$_REQUEST['kg'];
}
     $cost=0;//cost to caluculate money
     global $fixed;
     global $distance;
    $arr=array(
        'Charbagh'=>'0',
        'Indira Nagar'=>'10',
        'BBD'=>'30',
        'Barabanki'=> '60',
        'Faizabad'=> '100',
        'Basti'=>'150',
        'Gorakhpur'=>'210'
    );
    global $pd;                                           
    global $dd;                                                
                                            
    
    foreach ($arr as $keys=>$values) {                             
        if ($keys==$pick) {
            $pd=(int)$values;
        }
       
    }
    //to push drop distance to dd
    foreach ($arr as $key=>$value) {
        if ($key==$drop) {
            $dd=(int)$value;
            
        }
    }
 $distance =abs((int)$dd-(int)$pd);    
 echo "\n<strong>Distance:</strong>".$distance."Km"."<br>";              //to get absolute distance between location 



    switch ($cab) {
        case 'CedMicro':

             $obj6=new cedcab();
                 $obj6->micro($distance);
            
            
            break;
        case 'CedMini':
            $obj1=new cedcab();
                $obj1->mini($distance, $kg);
             
    
            break;
        case 'CedRoyal':
            $obj7=new cedcab();
               $obj7->royal($distance, $kg);
            break;
        case 'CedSuv':
                   $obj8=new cedcab();
                         $obj8->suv($distance, $kg);
            break;         
        }
    }   //function f1() ending here




          //Fare calculation for micro
         function micro($distance)
        {
            $cost=0;
            $fixed=50;//booking amount of th micro
            if ($distance>0 && $distance<=10) {
                 $fixed+=($distance*13.50);
            } elseif ($distance>10 && $distance<=50) {
                $fixed+=(10*13.50);
                $distance-=10;        //This will deduct the first 10km and rest fare  will be calculated on rest km 
                $fixed+=($distance*12.00);
            } elseif ($distance>50 && $distance<=150) {
                $fixed+=(10*13.50);
                $distance-=10;        //This will deduct the first 10km and rest fare  will be calculated on rest km 
                $fixed+=(50*12.00);
                $distance-=50;       //This will deduct the first 10km and 50km and rest fare  will be calculated on rest km 
                $fixed+=($distance*10.20);
    
            } elseif ($distance>150) {
                $fixed+=(10*13.50);
                $distance-=10;
                $fixed+=(50*12.00);
                $distance-=50;
                $fixed+=(100*10.20);
                $distance-=100;
                $fixed+=($distance*8.50);
                
            }
            $obj5=new cedcab();
            $obj5->display($fixed, $cost,$kg='0');
        }

    

       //Fare Calculation for Royal
      function royal($distance,$kg)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg<=10 ) {
            $cost=50;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=100;
        } elseif ($kg>20) {
            $cost=200;
        }
        $fixed=200;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*15.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=($distance*14.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=(50*14.00);
            $distance-=50;
            $fixed+=($distance*12.20);

        } elseif ($distance>150) {
            $fixed+=(10*15.50);
            $distance-=10;
            $fixed+=(50*14.00);
            $distance-=50;
            $fixed+=(100*12.20);
            $distance-=100;
            $fixed+=($distance*10.50);
            
        }
        $obj4=new cedcab();
        $obj4->display($fixed, $cost,$kg);
    }


//Fare Calculation for MINI
    function mini($distance,$kg)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg<=10 ) {
            $cost=50;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=100;
        } elseif ($kg>20) {
            $cost=200;
        }
        $fixed=150;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*14.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=($distance*13.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=(50*13.00);
            $distance-=50;
            $fixed+=($distance*11.20);

        } elseif ($distance>150) {
            $fixed+=(10*14.50);
            $distance-=10;
            $fixed+=(50*13.00);
            $distance-=50;
            $fixed+=(100*11.20);
            $distance-=100;
            $fixed+=($distance*9.50);
            
        }
        $obj2=new cedcab();
        $obj2->display($fixed, $cost,$kg);
    }
    

    //Fare Calculation For SUV

    function suv($distance,$kg)
    {
        if ($kg<=0) {
            $cost=0;
        } elseif ($kg>0 && $kg<=10 ) {
            $cost=100;
        } elseif ($kg>10 && $kg<=20 ) {
            $cost=200;
        } elseif ($kg>20) {
            $cost=400;
        }
        $fixed=250;
        if ($distance>0 && $distance<=10) {
             $fixed+=($distance*16.50);
        } elseif ($distance>10 && $distance<=50) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=($distance*15.00);
        } elseif ($distance>50 && $distance<=150) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=(50*15.00);
            $distance-=50;
            $fixed+=($distance*13.20);

        } elseif ($distance>150) {
            $fixed+=(10*16.50);
            $distance-=10;
            $fixed+=(50*15.00);
            $distance-=50;
            $fixed+=(100*13.20);
            $distance-=100;
            $fixed+=($distance*11.50);
            
        }
        $obj3=new cedcab();
        $obj3->display($fixed, $cost,$kg);
    }

    
    
    function display($fixed,$cost,$kg)  //Calling function for displaying cost and distance
    {
         $cost=(int)$cost+(int)$fixed;

        echo "\n<strong>Luggage:</strong>".$kg."KG <br>";     
        echo "\n<strong>Total Fare:</strong>"."Rs".$cost;
    }
    
  // echo "Total Fare:"."".$cost;
 }
         $pick=$_REQUEST['pick'];                                    
         $drop=$_REQUEST['drop'];               
         $cab=$_REQUEST['cab']; 
        
      $obj=new cedcab();
    $obj->f1($pick,$drop,$cab);
    
?>
