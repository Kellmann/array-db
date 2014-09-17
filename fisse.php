<?php

try
{
    
    if((!isset($_GET['filter'])) OR (empty($_GET['filter'])))
    {
        throw new Exception("No fisse");
    }
    
    switch (strtolower($_GET['filter']))
    {
        
        case "fisse":
            //$sql til at hente efter højste fisse  \\
            break;
        
        default:
            $sql = "SELECT * FROM `tabel` ORDER BY `id` DESC;";
            break;
        
    }
    
    $query  = $DB->prepare($sql);
    $query->execute();
    
    $result = $query->fetchAll();  // Eller bruge en while til enkeltvis udskrivning \\
    
}
catch (Exception $e)
{
    echo "No fisse: " . $e->getMessage();
}



//select 'user' type, id, username as content
//from `table` `alias`
//where username like '%:searchquery%'
//union all
//select 'title' type, gi_id id, title as content
//from `table` `alias`
//where title like '%:searchquery%'
//union all
//select 'tags' type, gi_id id, tags as content
//from `table` `alias`
//where tags like '%:searchquery%'


//<form action="" method="post">
//
//<input type="text" name="searchquery" placeholder="søg" />
//<input type="submit" name="submit" value="Søg" />
//
//</form>

?>