<?php

require_once ("core/init.php");

$rows = "SELECT count(`id`) AS rows FROM random";

if($rows >= 60){
    // 3 sider
}elseif($rows >= 30){
    // 2 sider
}else{
    // 1 eller ingen sider
}

headers();

global $DB;

        switch ($page) {
    // page 3
    case 3:
        $offset = 60;
        break;
    // page 2
    case 2: 
        $offset = 30;
        break;
    //uguldigt
    default:
        $offset = 0;
        break;
}
    

        $string = "SELECT id, name, number, email
                   FROM random 
                   LIMIT 30
                   OFFSET $offset";
                
        $query = $DB->prepare($string);
        
        $query->execute();

        
        if(!$query){
            
            throw new Exception("Kunne ikke finde resultater");
            
        }

        if($query->rowCount() < 1){
            throw new Exception("Ingen resultater");
        }
        
        
    
        ?>

        <?php
        while ($random = $query->fetch()){
//            echo "<pre>";
//            print_r($random);
//            var_dump($random);
//            echo "</pre>";
        ?>
<br />
<div style="height: 100px; width: 550px; background-color: #E58000;margin: 0 auto;">
    <?=$random->name;?>
    <?=$random->number;?>
    <?=$random->email;?>
</div>
        <?php
        
        }
//$a = array();
//
//$a[] = "NULL";
//unset($a[0]);
//$a[] = "dyr";
//$a[] = "natur";
//$a[] = "vandfald";
//$a[] = "nude";
//$a[] = "beauty";
//$a[] = "bygninger";
//$a[] = "solnedgang";
//$a[] = "action";
//$a[] = "portrat";
//$a[] = "mænd med chokolade";

?>



<?php


//echo "<pre>";
//print_r($a);
//echo "</pre>";
//
//echo "brugernavn: ".$CURUSER['brugernavn'];

footer();

?>