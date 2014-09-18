<?php

require_once ("core/init.php");

headers();

if(isset($_GET['id'])){
    
        $id = $_GET['id'];

    

    /*
     * @param $id default value NULL
     */

        
        $string = "DELETE FROM `table` 
                   WHERE `id` = :id";
        
        $query = $DB->prepare($string);
        
        $query->bindParam(':id',$id);
        
        $query->execute();
        
        if(!$query){
            
            throw new Exception("Kunne ikke slette");
            
        }else{
            
            echo "Du har nu slettet fissen";
            
        }
        


}     
?>

        <?php
        $query = $DB->prepare("SELECT * FROM `table`");
        $query->execute();
        while ($var = $query->fetch()){
        ?>
                  <a href="?id=<?=$sam_huse->id;?>">slet</a>
                  <h2><?=$sam_huse->navn;?></h2>
                  <?php 
                  $text = $sam_huse->beskrivelse; 
                  $shorttext = substr($text, 0, 100); 
                  
        }

footer();

?>