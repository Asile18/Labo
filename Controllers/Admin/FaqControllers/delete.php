<?php
if(isset($_POST["delete"]))
{
    
    try 
    {
    
    // var_dump($_POST["id"]);
    $deletedFaq= $faq->deleteFaq($_POST["id"]);
                   
    }
    catch(PDOException $e)
	{
	    echo $e->getMessage();
	}
 }
 else
{
//    echo'Impossible to delete';
}
      

?>