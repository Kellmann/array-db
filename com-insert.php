<?php
/**
 * http://php.net/manual/en/language.exceptions.php
 */


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
    
    $_com = new _Com();    
    

    
    if (isset($_POST['submit'])){
        
		$date =  new DateTime();
		

           
        if ((!isset($_POST['comment'])) OR (empty($_POST['comment']))){
            
            throw new Exception("Indsæt kommentar");

        }

        
       	$date =  new DateTime();
			
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        
        $_com->setDate($date->format("Y-m-d H:i:s"));        
        $_com->setComment($comment);
		$_com->set_user_id($_user_id);
		$_com->set_image_id($_image_id);


        
        $_com->save();
        

        


    }
    
 
?> 

    <form class="form-style" role="form" action="" method="post">
        <input type="hidden" name="id" value="<?=$id;?>" />
            <div class="form-group">
                <label class="control-label" for="comment">Kommentar</label>
                <input type="text" class="form-control" id="comment" name="comment" required />
            </div>
        <button type="submit" class="" name="submit">Indsæt</button>
    </form>

<?php
  

footer();

}catch (Exception $e){
    
    echo "Kunne ikke indsætte kommentar";
    
    echo "<br />";
    
    echo $e;
    
}

?>