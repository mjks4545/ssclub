<?php

    $weapon=$_POST['weapon'];
    
    if(strchr($weapon,'to')){
        list($first,$second)=explode('to', $weapon);
        $first = str_replace(' ', '', $first);
        $second = str_replace(' ', '', $second);
        if(ctype_digit ( $first )){
            $third =  $second - $first;
            echo $third;
        }else{
            
            $secondvar= $second;
            $firstvar = $first;
            if(!is_int ( $first )){
                preg_match_all('/([0-9]+|[a-zA-Z]+)/',$first,$matches);
                $firstvar = end(end($matches));
            }
            if(!is_int ($second)){
                preg_match_all('/([0-9]+|[a-zA-Z]+)/',$second,$matches1);                                                
                $secondvar =  end(end($matches1));                                      
            }
            $third =  $secondvar - $firstvar;
            echo $third;
        }
     
    }
?>