<?php
/**
 * redigere "item"
 * http://php.net/manual/en/language.exceptions.php
 */


// Alle "item" skal skiftes ud med navnet på classen.
// alle "name" er pre fix. skal skiftes til det pre fix der er blevet valgt
// name-edit.php fra andre sider skal fixes fordi jeg har lavet mappe structuren lidt om!


/**
 * require init.php
 */
require_once ("../core/init.php");

/**
 * Du skal være logget ind for at kunne se denne side
 */
loggedinorreturn();

headers();


try{
    
    if ((!isset($_GET['id'])) OR (empty($_GET['id']))){
        
        throw new Exception("Mangler id");
    
    }
    
    
    $id = $_GET['id'];
    
    $_com = new _Com();

    $_com->load($id);
    
    if (isset($_POST['submit'])){
        
		$date = new DateTime();
		
        if ((!isset($_POST['comment'])) OR (empty($_POST['comment']))){
            
            throw new Exception("Indsæt kommentar");

        }
           
   

       
        
        
        $date = $_POST['date'];
        $comment = $_POST['comment'];

		
        $_com->setDate($date->format("Y-m-d H:i:s"));       
        $_com->setComment($comment);


        
        $guru_com->save();

        
    }
    
    
?>   

            <form class="" role="form" enctype="multipart/form-data" action="" method="post">
                <input type="hidden" name="id" value="<?=$id;?>" />
                    <div class="form-group">
                        <label class="control-label" for="comment">Kommentar</label>
                        <input type="text" class="form-control" id="comment" name="comment" value="<?=$_com->getComment();?>" required />
                    </div>

                <button type="submit" class="" name="submit">Updater</button>
            </form>

<?php

footer();

}catch (Exception $e){
    
    echo "Kunne ikke updater kommentar";
    
    echo "<br />";
    
    echo $e;
    
}

?>