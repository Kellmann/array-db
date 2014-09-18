<?php

require_once ("core/init.php");

headers();

if(isset($_POST['submit'])){
    
        $var = $_POST['columns1'];
        $var = $_POST['columns2'];

    
$string ="INSERT INTO table(columns1, columns2)
          VALUES (:columns1, :columns2)";

$query = $DB->prepare($string);

        $query->execute(array(
            ':columns1' => $columns1, 
            ':columns2' => $columns2
                ));
        
        
if(!$query){
            
    throw new Exception("Kunne ikke indsætte");
            
}

        
        
//        $var->setColumns1($columns1);
//        $var->setColumns1($columns2);

     
//        $var->save();
        
}     
?>

<form class="" role="form" enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="id" value="<?=$id;?>" />
        <label for="columns1">
            <span>title</span>
            <input type="text" id="columns1" name="columns1" required />
        </label>
        <label for="columns2">
            <span>title</span>
            <input type="text" id="columns2" name="columns2" required />
        </label>
    <input type="submit" name="submit" value="indsæt" />
</form>

<?php   

footer();

?>